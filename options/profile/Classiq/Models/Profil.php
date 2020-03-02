<?php
namespace Classiq\Models;
use Classiq\C_classiq;
use Classiq\Seo\SEO;
use Pov\Image\ImgUrl;
use Pov\MVC\View;

/**
 * Class Profil
 * @package Classiq\Models
 *
 * @property string $online Si true c'est que l'utilisateur a validé son profil
 *
 * @property string $name Nom de l'utilisateur
 * @property string $email Email de l'utilisateur
 * @property string $sex sexe de l'utilisateur m,f,mf
 *
 *
 *
 * @property bool $validated true si le compte a été validé
 * @property string $token un token qui permet de redéfinir le mot de passe
 * @property string $tokentime timestamp où le token a été enregistré
 * @property string $hashedpassword Mot de passe hashé
 *
 *
 *
 */
class Profil extends Classiqmodel
{


    public static $icon="cq-user-user";

    /**
     * @param bool $plural Si true retournera le nom du modèle au pluriel
     * @return string nom du type de record lisible par les humains
     */
    static function humanType($plural=false){
        return $plural?"Clients":"Client";
    }

    /**
     * true si c'est son propre profil
     * @return bool
     */
    public function isEditable(){
        if(!me()){
            return false;
        }
        switch (true){
            case me()->isAdmin();
            case $this->uid()===me()->uid();
                return true;
            default:
                return false;
        }
    }




    public function update()
    {
        if($this->email){
            $this->email=strtolower($this->email);
        }
        if($this->email){
            $this->name=$this->email;
        }
        if($this->hashedpassword){
            $this->validated=1;
        }
        parent::update();
    }
    public function getErrors()
    {
        $err= parent::getErrors();
        if(!$this->validated){
            $err["validated"]="Profil non vérifié";
        }
        return $err;
    }
    /**
     * retourne true si il s'agit de l'humain connecté actuellement
     * @return bool
     */
    public function isMe(){
        return me() && me()->uid() === $this->uid();
    }



    /**
     * @var null|Profil
     */
    public static $_current=null;

    /**
     * Renvoie l'utilisateur actuellement connecté ou false
     * @return Profil|bool
     */
    public static function current(){
        if(self::$_current===null){
            //si ça marche pas ce sera false et on retestera pas pour cette execution php
            self::$_current=self::loginByCookie();
        }
        //renvoie le profil ou false
        return self::$_current;
    }

    //----------password-----------------------

    /**
     * Définit le mot de passe hashé (n'enregistre pas)
     * @param string $cleanPwd Le mot de passe en clair
     */
    public function setCleanPassword($cleanPwd){
        $this->hashedpassword=$this->_hashPassword($cleanPwd);
        $this->token="";
        $this->tokentime="";
    }
    /**
     * Revoie le mot de passe hashé
     * @param string $cleanPwd Le mot de passe en clair
     * @return string
     */
    private function _hashPassword($cleanPwd){
        return md5($cleanPwd);
    }
    /**
     * Teste si le mot de passe fourni est correct
     * @param string $cleanPwd Le mot de passe en clair
     * @return bool
     */
    public function isCleanPwdValid($cleanPwd){
        return $this->_hashPassword($cleanPwd)===$this->hashedpassword;
    }

    /**
     * Génére un token aléatoire, l'enregistre envoie un mail à l'utilisateur afin qu'il puisse définir un mot de passe
     */
    public function generateTokenAndSendByMail($isLostPassword=false)
    {
        $token=utils()->string->random(20);
        $this->token=$token;
        $this->tokentime=utils()->date->timestamp();
        db()->store($this);
        //mail
        $toMail=$this->email;
        $url=site()->changePasswordUrl($token);
        if($isLostPassword){
            $subject="Mot de passe oublié? Pas de stress...";
            $message="Bonjour ".ucfirst($this->name)." !<br>";
            $message.="Pour vous connecter et définir un nouveau mot de passe cliquez sur ce lien <a href='$url'>$url</a><br>";

        }else{
            $subject="Confirmez votre inscription";
            $message="Bonjour ".ucfirst($this->name)." !<br>";
            $message.="Pour confirmer vote inscription cliquez sur ce lien <a href='$url'>$url</a><br>";
        }
        $message.="À tout de suite !<br>";

        //cq()->sendMail($toMail,$subject,$message);
        $vv=[];
        $vv["title"]=$subject;
        $vv["text"]=$message;
        site()->sendMail($toMail,$subject,"emails/text",$vv);
    }

    /**
     * Va fusionner le panier en cookie avec le panier utilisateur loggé
     * @throws \Pov\PovException
     */
    private function mergeBaskets(){
        $basketCookie=Order::getBasketByCookie(false);
        $basketUser=$this->basket();
        if($basketCookie && $basketCookie->uid() !== $basketUser->uid()){
            foreach ($basketCookie->products() as $productLine){
                $productLine->order=$basketUser;
                $basketUser->addProduct($productLine->product,$productLine->quantity);
                db()->trash($productLine);
            }
            db()->store($basketUser);
            db()->trash($basketCookie);
        }
    }

    /**
     * Définit ce profil comme utilisateur courrant
     */
    public function login(){
        //va fusionner le panier en cookie avec le panier utilisateur
        $this->mergeBaskets();
        $cookieDuration=time()+86400*30; //30 jours
        $wayToken=md5($this->hashedpassword.$this->email);
        setcookie("wayt",$wayToken,$cookieDuration,"/");
        setcookie("wayp",$this->id,$cookieDuration,"/");
        self::$_current=$this;

        //$this->basket();

    }

    /**
     * Déloggue l'utilisateur
     * Efface les cookies
     */
    public static function logout(){
        if(isset($_COOKIE["wayt"])){
            unset($_COOKIE["wayt"]);
            unset($_COOKIE["wayp"]);
            setcookie("wayt", '', time() - 3600,"/");
            setcookie("wayp", '', time() - 3600,"/");
        }
        self::$_current=false;//pas null pour eviter de se reconnecter
    }

    /**
     * Renvoie les commandes (pas le pannier)
     * @return Order[]
     */
    public function orders(){
        if($this->uid()){
            return db()->find("order",
                "profil_id = '$this->id' AND is_order = '1' ORDER BY".Order::$DEFAULT_ORDER_BY
            );
        }
        return [];
    }
    /**
     * Renvoie le pannier de cet utilisateur (et le crée au passage si nécessaire)
     * @return Order
     */
    public function basket(){
        /** @var Order $o */
        $o=db()->findOne("order",
            "profil_id = '$this->id' AND is_order = '0'"
        );
        if(!$o){
            $o=db()->dispense("order");
            $o->profil=$this;
            $o->is_order='0';
            db()->store($o);
        }
        return $o;
    }

    //-------------------static------------------------------------

    /**
     * Retourne un Profil par email
     * @param string $email
     * @return Profil|null
     */
    public static function getByEmail($email){
        $type=self::modelTypeStatic();
        $bean=db()->findOne($type,"email='$email' COLLATE NOCASE");
        if(!$bean){
            return null;
        }
        return $bean->box();
    }
    /**
     * Retourne un Profil par token (utilisé pour le process lost password)
     * @param string $token
     * @return Profil|null
     */
    public static function getByToken($token){
        $type=self::modelTypeStatic();
        $bean=db()->findOne($type,"token='$token'");
        if(!$bean){
            return null;
        }
        return $bean->box();
    }
    /**
     * Loggue l'utilisateur à partir de ses cookies
     * @return bool|Profil
     */
    public static function loginByCookie(){
        if(isset($_COOKIE["wayt"]) && isset($_COOKIE["wayp"])){
            $wayToken=$_COOKIE["wayt"];
            $wayProlifId=$_COOKIE["wayp"];
            /** @var  Profil $profil */
            $profil=db()->findOne("profil","id='$wayProlifId'");
            if($profil){
                $wayToken_correct=md5($profil->hashedpassword.$profil->email);
                if($wayToken_correct===$wayToken){
                    $profil->login();
                    return $profil;
                }
            }
        }
        return false;
    }


    //-----------------------adresse-------------------------

    /**
     * Renvoie (et crée au besoin) l'adresse par défaut
     * On a un modèle dissocié pour éventuellement par la suite pouvoir gérer plusieurs adresses par profil
     * @return Address
     */
    function defaultAdress(){
        /** @var Address $a */
        $a=db()->findOne("address","profil_id = '$this->id' ORDER BY id desc");
        if(!$a){
            $a=db()->dispense("address");
            $a->profil=$this;
            db()->store($a);
        }
        return $a;
    }

}