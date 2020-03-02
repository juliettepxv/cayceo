<?php


namespace Classiq\Models;

/**
 * Class Ordership représente une ligne de livraison dans une commande
 *
 * @package Classiq\Models
 *
 * @property Order $order
 * @property int $order_id
 * @property-read float $realweight Le poids réel (KG) des produits
 * @property-read string $numerocolis identifiant du colis transmis par le transporteur et qui permettra d'assurer le suivi.
 *
 */
class Ordership extends Shipmode
{
    /**
     * Renvoie un Ordership à partir d'un Shipmode et d'une commande
     * @param Shipmode $shipmode
     * @param Order $order
     * @param $totalWeight
     * @return Ordership
     */
    public static function fromShipmode($shipmode,$order,$realweight){
        /** @var Ordership $s */
        $s=db()->dispense("ordership");
        $s->maxweight=$shipmode->maxweight;
        $s->tva_rate=$shipmode->tva_rate;
        $s->service=$shipmode->service;
        $s->price=$shipmode->price;
        $s->order=$order;
        $s->realweight=$realweight;
        return $s;
    }

    public function update()
    {
        parent::update();
    }
    public function after_update()
    {
        if($this->order){
            db()->store($this->order);
        }
        parent::after_update();
    }

    /**
     * Renvie l'url du suivi de colis (ou rien si c'est pas possible)
     * @return string
     */
    public function shippingTrackUrl(){
        if($this->numerocolis){
            //à tester en réel, je ne suis pas certain que ça marche pareil pour colissimo, chronofresh etc...
            return "https://www.laposte.fr/outils/suivre-vos-envois?code=".trim($this->numerocolis);
        }
        return "";
    }



}