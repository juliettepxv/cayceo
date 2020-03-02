<?php


namespace Classiq\Models;

/**
 * Trait WithTVA
 * @package Classiq\Models
 * @property float $price Prix hors taxes
 * @property float $tva_rate Taux de TVA
 * @property-read float $tva_amount Montant de la TVA
 * @property-read float $price_with_tva Prix avec taxes

 */
trait WithPrice
{
    public static $DEFAULT_TVA_RATE=0.2;

    public function applyTVA(){
        if(!$this->tva_rate){
            $this->tva_rate=self::$DEFAULT_TVA_RATE;
        }
        $this->tva_amount=round($this->price*$this->tva_rate,2);
        $this->price_with_tva=$this->price+$this->tva_amount;
    }
}