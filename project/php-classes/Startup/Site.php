<?php

namespace Startup;


use Classiq\C_classiq;
use Pov\MVC\View;
use Pov\System\AbstractSingleton;

/**
 * Cette classe contient des méthodes et des propriétés propre au projet
 * @package Startup
 */
class Site extends AbstractSingleton
{
    /**
     * @var string clé publique à configurer pour les APIs Google ajavascript (google map par exemple)
     */
    public $googleApiKey="";
    /**
     * @var string identifiant Gogle analytics
     */
    public $googleAnalyticsId;
    /**
     * @var string[] liste des blocks possibles
     */
    public $blocksList=[
        "blocks/texte",
        "blocks/titre",
        "blocks/img",
        "blocks/img-text",
        "blocks/poster",
        "blocks/block-photos/photos",
        "blocks/block-logos/block-logos",
        "blocks/iframe",
        //"blocks/video",
        "blocks/block-cards/cards",
        "blocks/dwd",
        "blocks/block-projets/projets",
        "blocks/block-icons/icons",
        "blocks/form/contact",

    ];

    public $cardsTypes=[
        "icône texte"=>"ico-text",
        "titre texte lien"=>"title-text-link",
        "titre texte lien image"=>"title-text-link-img",
    ];
    public $cardsTypeDefault="ico-text";

    /**
     * @var string Nom du projet utilisé dans les envois de mail par exemple
     */
    public $projectName="Mon super projet";
    /**
     * @var string Email qui reçoit les formulaires
     */
    public $formsMailTo="d.marsalone@gmail.com";
    /**
     * @var string couleur hexa du navigateur sur mobile
     */
    public $themeColor="#ED7203";
    public $themeColorNegative="#FFFFFF";

    /**
     * Renvoie la home page
     * @return \Classiq\Models\Page|null
     * @throws \Pov\PovException
     */
    public function homePage(){
        return cq()->homePage();
    }


    //todo remove les couleurs

    public $COLOR_THEME_BLUE="blue";
    public $COLOR_THEME_ORANGE="orange";
    public $COLOR_THEME_SUNRISE="sunrise";

    public function COLOR_ALL(){
        return[
            $this->COLOR_THEME_BLUE,
            $this->COLOR_THEME_ORANGE,
            $this->COLOR_THEME_SUNRISE,
        ];
    }

    //todo déplacer...ou pas ?

    /**
     * @var bool|string Quand false envoie les mails normalement sinon le envoies à l'adresse spécifiée
     */
    public $debugMail="d.marsalone@gmail.com";

    /**
     * Envoie un joli mail formaté
     * @param $emailTo
     * @param $subject
     * @param $view
     * @param $viewVariables
     * @return bool
     * @throws \Pov\PovException
     */
    public function sendMail($emailTo,$subject,$view,$viewVariables){
        if($this->debugMail){
            $subject="[debug][$emailTo] $subject";
            $emailTo=$this->debugMail;
        }
        $html=View::get($view,$viewVariables)->render();
        return cq()->sendMail($emailTo,$subject,$html);
    }



    //todo déplacer dans shop package



    /**
     * L'url du profil (le compte client en fait)
     * Si l'utilisateur n'est pas loggé, lui proposera tout ce qu'il faut à cet effet
     * @return \Pov\MVC\ControllerUrl
     */
    public function profilUrl(){
        return C_classiq::quickView_url("user/home");
    }

    /**
     * L'url du panier
     * @return \Pov\MVC\ControllerUrl
     */
    public function buyBasketUrl(){
        return C_classiq::quickView_url("buy-process/1-basket");
    }
    /**
     * L'url du des infos perso lors du precess d'inscription
     * @return \Pov\MVC\ControllerUrl
     */
    public function buyPersonalInfoUrl(){
        return C_classiq::quickView_url("buy-process/2-personal-info");
    }
    /**
     * L'url du paiement
     * @return \Pov\MVC\ControllerUrl
     */
    public function buyPaymentUrl(){
        return C_classiq::quickView_url("buy-process/3-payment");
    }
    /**
     * L'url de confirmation du paiement
     * @return \Pov\MVC\ControllerUrl
     */
    public function buyPaymentConfirmUrl(){
        return C_classiq::quickView_url("buy-process/4-payment-confirm");
    }

    public function paymentUrlOK(){
        return C_classiq::quickView_url("buy-process/order-ok")->absolute();
    }
    public function paymentUrlKO(){
        return C_classiq::quickView_url("buy-process/order-not-ok")->absolute();
    }

    /**
     * @return string url qui reçoit les résultats des opérations de paiement
     */
    public function paymentBankMessageUrl(){
        return C_classiq::quickView_url("buy-process/bank-message")->absolute();
    }













}