<?php


namespace Classiq\Models;

use Pov\PovException;

/**
 * Class Order
 * @package Classiq\Models
 *
 * @property Profil $profil Le profil a qui est associé la commande
 *
 * @property float $total_products_ht montant HT du total des produits
 * @property float $total_shippings_ht montant HT du total des livraisons
 * @property float $total_with_tva montant total TTC produits + livraison
 *
 * @property int $is_order pannier ou commande?
 * @property string $cookie identifiant de cookie pour pouvoir récupérer un pannier via un cookie
 *
 * Uniquement pour les commandes....
 *
 * @property-read string $transaction_id
 * @property-read string $transaction_date date de la transaction
 * @property-read string $transaction_amount Montant de la transaction
 * @property-read string $frozen_address Adresse enregistrée au moment de la transaction
 *
 * @property int $status etat de la commande STATUS_etc
 *
 */
class Order extends Classiqmodel
{
    public function update()
    {
        if(!$this->id){
            $this->is_order=0;
        }

        $this->name="";
        if(!$this->is_order){
            $this->name="Panier ".$this->id;
            $this->status=self::STATUS_BASKET;
        }else{
            $this->name="Commande ".$this->id;
            if(!$this->status){
                $this->status=self::STATUS_PAYEE;
            }else{
                switch($this->status){
                    case self::STATUS_PAYEE && $this->shippingsAllSent():
                        $this->status=self::STATUS_EN_LIVRAISON;
                        break;
                    case self::STATUS_EN_LIVRAISON && !$this->shippingsAllSent():
                        $this->status=self::STATUS_PAYEE;
                        break;
                }
            }
            $this->name.=" ".$this->statusText();
        }


        $this->total_products_ht=$this->calc_products_price();
        $this->total_shippings_ht=$this->calc_shippings_price();
        $this->total_with_tva=$this->calc_price_with_tva();

        if(!$this->profil){
            $this->name.=" (tmp)";
        }
        $this->name.=" ".shopUtils()->formatPrice($this->total_products_ht);

        parent::update();
    }
    public static $icon="cq-cart";
    /**
     * @param bool $plural Si true retournera le nom du modèle au pluriel
     * @return string nom du type de record lisible par les humains
     */
    static function humanType($plural=false){
        $r=ucwords(self::modelTypeStatic());
        if($plural){
            return "Commandes";
        }
        return "Commande";
    }

    // classées par ordre d'importance (une commande payée doit être traitée, une commande livrée on s'en fiche un peu)
    const STATUS_PAYEE=         1000;
    const STATUS_PROBLEME=      900;
    const STATUS_EN_LIVRAISON=  200;
    const STATUS_LIVREE=        100;
    const STATUS_BASKET=        0;

    static $DEFAULT_ORDER_BY=" status DESC, id DESC";

    static $ALL_STATUS=[
        "Panier"=>self::STATUS_BASKET,
        "Payée"=>self::STATUS_PAYEE,
        "En cours de livraison"=>self::STATUS_EN_LIVRAISON,
        "Livrée"=>self::STATUS_LIVREE,
        "Problème"=>self::STATUS_PROBLEME,
    ];

    /**
     * Renvoie true si TOUTES les livraisons ont un numéro de colis
     * @return bool
     */
    private function shippingsAllSent(){
        foreach ($this->shippings() as $s){
            if(!$s->numerocolis){
                return false;
            }
        }
        return true;
    }

    /**
     * Renvoie le status de la commande sous forme de texte
     * @return string
     */
    public function statusText(){
        $flipped = array_flip(self::$ALL_STATUS);
        if(array_key_exists($this->status,$flipped)){
            return $flipped[$this->status];
        }
        return "";
    }
    /**
     * Renvoie la date de la transaction
     * @return bool|\DateTime
     */
    public function getDateTransaction(){
        return \DateTime::createFromFormat("Y-m-d H:i:s",$this->transaction_date);
    }

    /**
     * Transforme le pannier en commande (enregistre à ce moment là)
     * todo figer des trucs probablement, genre une sauvegarde json des données par exemple
     * @param string $transactionId identifiant de la transaction
     * @param string $transactionAmount
     * @return bool|Order
     * @throws PovException se produit si on ne peut pas transformer  le pannier en commande
     */
    public function setAsOrder($transactionId,$transactionAmount){
        if($this->is_order){
            throw new PovException("La commande était déjà une commande et non pas un panier");
            return false;
        }
        if(!$this->profil){
            throw new PovException("Le pannier n'a pas de profil, il ne peut pas être converti en commande");
            return false;
        }
        if(!$transactionId){
            throw new PovException("il faut avoir un identifiant de transaction");
            return false;
        }
        $this->frozen_address=$this->profil->defaultAdress()->text();
        $this->is_order=1;
        $this->transaction_id=$transactionId;
        $this->transaction_date=utils()->date->nowMysql();
        $this->transaction_amount=$transactionAmount;



        db()->store($this);
        return $this;
    }

    /**
     * Les lignes produits pour cette commande
     * @return Orderproduct[]
     */
    public function products(){
        return db()->find("orderproduct","order_id = '$this->id' ");
    }
    /**
     * Le nombre de produits
     * @return int
     */
    public function productsQuantity(){
        $total=0;
        foreach ($this->products() as $line){
            $total+=$line->quantity;
        }
        return $total;
    }

    /**
     * Définit les frais de port en fonction du panier
     */
    public function calculateShippings(){

        if(!$this->is_order){

            //efface les anciens
            $olds=$this->shippings();
            if($olds){
                db()->trashAll($olds);
            }
            /** @var OrderShip[] $livraisons */
            $livraisons=[];
            foreach (Shipmode::$SERVICES as $service){
                $totalWeight=0;

                foreach ($this->products() as $productLine){
                    if($productLine->shipservice===$service){
                        $totalWeight+=$productLine->weight_total;
                    }
                }
                if($totalWeight>0){

                    //trouve les shipmode approprié en fonction du service et du poids
                    $shipMode=Shipmode::getForWeight($service,$totalWeight/1000);

                    if($shipMode){
                        //ajoute le service de livraison à la commande
                        $livraison=Ordership::fromShipmode($shipMode,$this,$totalWeight);
                        db()->store($livraison);
                        $livraisons[]=$livraison;
                    }
                }
            }
        }

    }
    /**
     * Les services de livraisons nécessaires à cette commande
     * @return OrderShip[]
     */
    public function shippings(){
        return db()->find("ordership","order_id = ".$this->id);
    }

    /**
     * Calcule le total produits
     * @return float|int
     */
    public function calc_products_price(){
        $total=0;
        foreach ($this->products() as $p){
            $total+=$p->price;
        }
        return $total;
    }
    /**
     * Calcule le total produits avec TVA
     * @return float|int
     */
    public function calc_products_price_with_tva(){
        $total=0;
        foreach ($this->products() as $p){
            $total+=$p->price_with_tva;
        }
        return $total;
    }
    /**
     * Calcule le total de la tva des produits
     * @return float|int
     */
    public function calc_products_tva_amount(){
        $total=0;
        foreach ($this->products() as $p){
            $total+=$p->tva_amount;
        }
        return $total;
    }

    /**
     * Calcule le total livraisons HT
     * @return float|int
     */
    public function calc_shippings_price(){
        $total=0;
        foreach ($this->shippings() as $ship){
            $total+=$ship->price;
        }
        return $total;
    }
    /**
     * Calcule le total de la tva des livraisons
     * @return float|int
     */
    public function calc_shippings_tva_amount(){
        $total=0;
        foreach ($this->shippings() as $ship){
            $total+=$ship->tva_amount;
        }
        return $total;
    }
    /**
     * Calcule le total livraisons TTC
     * @return float|int
     */
    public function calc_shippings_with_tva(){
        $total=0;
        foreach ($this->shippings() as $ship){
            $total+=$ship->price_with_tva;
        }
        return $total;
    }

    /**
     * Calcule le total HT produits + livraison
     * @return float
     */
    public function calc_price(){
        return $this->calc_products_price() + $this->calc_shippings_price();
    }
    /**
     * Calcule le total TVA produits + livraison
     * @return float
     */
    public function calc_tva_amount(){
        return $this->calc_products_tva_amount() + $this->calc_shippings_tva_amount();
    }
    /**
     * Calcule le total TTC produits + livraison
     * @return float
     */
    public function calc_price_with_tva(){
        return $this->calc_price() + $this->calc_tva_amount();
    }

    /**
     * S'assure qu'on peut bien modifier une ligne de la commande
     * @return bool
     * @throws PovException
     */
    private function testModify(){
        if(!$this->id){
            throw new PovException("pas d'order id");
            return false;
        }
        if($this->is_order){
            throw new PovException("On ne peut pas ajouter un produit à une commande, seulement à un pannier");
            return false;
        }
        return true;
    }
    /**
     * Ajoute ou supprime un produit à la commande et met à jour la commande en conséquence
     * ...et les livraisons
     * @param Product $product
     * @param int $quantity
     * @return bool|Orderproduct
     * @throws PovException
     */
    public function addProduct($product,$quantity=1){
        $this->testModify();
        $line=$this->lineForProduct($product);
        $quantity=$line->quantity+$quantity;
        return $this->setProductQuantity($product,$quantity);
    }

    /**
     * Définit la quantité pour un produit donné
     * @param Product $product
     * @param int $quantity
     * @return Orderproduct
     * @throws PovException
     */
    public function setProductQuantity($product,$quantity){
        $this->testModify();
        $line=$this->lineForProduct($product);
        $line->quantity=$quantity;

        if($line->quantity > 0){
            db()->store($line);
        }else{
            if($line->id){
                db()->trash($line);
            }
        }
        $this->afterProductUpdate();
        db()->store($this->unbox());
        return $line;
    }

    /**
     * Rcalcule les shippings et les totaux HT
     */
    private function afterProductUpdate(){
        $this->calculateShippings();
        $this->total_products_ht=$this->calc_products_price();
        $this->total_shippings_ht=$this->calc_shippings_price();
    }

    /**
     * Retourne une ligne produit pour cette commande
     * @param $product
     * @return Orderproduct
     */
    private function lineForProduct($product){
        /** @var Orderproduct $line */
        $line=db()->findOne("orderproduct","order_id = $this->id AND product_id = $product->id");
        if(!$line){
            $line = db()->dispense("orderproduct");
            $line->order=$this;
            $line->quantity=0;
            $line->product=$product;
            db()->store($line);
        }
        return $line;
    }


    //-----------------------------static-------------------------------------------------------

    /**
     * @var null|Order
     */
    public static $_basket=null;

    /**
     * Renvoie le panier et le crée au besoin
     * @param bool $createIfNull quand défini sur false ne crée pas de panier automatiquement
     * @return Order
     */
    public static function basket($createIfNull=true){
        if(self::$_basket===null){
            if(me()){
                self::$_basket = me()->basket();
            }else{
                /** @var Order $o */
                self::$_basket=self::getBasketByCookie($createIfNull);
            }
        }
        return self::$_basket;
    }

    /**
     * Renvoie/crée un panier par via cookie.
     * Les paniers de cookie sont des paniers attribués quand les utilisateurs ne sont pas connectés à leur profil.
     * Quand les utilisateurs se connectent le panier en cookie est fusionné avec le panier en profil
     * @param bool $createIfNull quand défini sur false ne crée pas de panier automatiquement
     * @return Order|null
     */
    public static function getBasketByCookie($createIfNull=true){

        $cookName="umamizBasket";
        $cookieDuration=time()+86400*30; //30 jours

        if(isset($_COOKIE["$cookName"])){
            $cookieId=$_COOKIE["$cookName"];
            /** @var  Order $basket */
            $basket=db()->findOne("order","cookie='$cookieId'");
            if($basket //existe :)
                && !$basket->is_order //n'est pas une commande
                && !$basket->profil //n'a pas de profil
            ){
                return $basket;
            }
        }
        //il n'y avait pas de cookie de panier ou que le panier trouvé ne convennait pas
        if($createIfNull){
            $basket=db()->dispense("order");
            $basket->is_order=0;
            $basket->cookie=utils()->string->random(20)."-".utils()->date->timestamp();
            db()->store($basket);
            setcookie("$cookName",$basket->cookie,$cookieDuration,"/");
            return $basket;
        }
        return null;



    }

    /**
     * Revoie tous les paniers (pas les commandes)
     * @return Order[]
     */
    public static function baskets(){
        return db()->find("order","is_order != 1");
    }

    /**
     * Met à jour les prix et les livraisons de tous les paniers
     * à n'utiliser que quand un produit ou des frais de port sont mis à jour
     */
    public static function danger_updateAllBaskets(){
        //die("danger_updateAllBaskets");
        foreach (self::baskets() as $b){
            $b->danger_updateBasket();
        }
    }

    /**
     * Met à jour le panier en redéfinissant toutes les associations,
     * à n'utiliser que quand un produit ou des frais de port sont mis à jour
     */
    public function danger_updateBasket(){
        //die("danger_updateBasket");
        $products=[];
        foreach ($this->products() as $productLine){
            if($productLine->product){
                $products[]=[
                    "product"=>$productLine->product,
                    "qte"=>$productLine->quantity,
                ];
            }
            //efface la ligne
            db()->trash($productLine);
        }
        foreach ($products as $lp){
            $line=$this->lineForProduct($lp["product"]);
            $line->quantity=$lp["qte"];
            if($line->quantity > 0){
                db()->store($line);
            }
            $this->afterProductUpdate();
            db()->store($this->unbox());
        }
    }




}