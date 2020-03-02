<?php


namespace Shop;


use Pov\System\AbstractSingleton;


/**
 * Quelques methodes utiles propres à un e shop
 *
 *  * @method static ShopUtils inst()
 *
 * @package Startup
 */
class ShopUtils extends AbstractSingleton
{
    /**
     * Formate un prix
     * @param float $price
     * @param string $suffix € par défaut
     * @return string
     */
    public function formatPrice($price,$suffix="€"){
        return number_format($price,2,",", " ").$suffix;
    }
    /**
     * Formate un poids en kg
     * @param float $kg
     * @return string
     */
    public function formatWeight($kg){
        return number_format($kg,2,",", " ")."kg";
    }
}