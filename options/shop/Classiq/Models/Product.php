<?php

namespace Classiq\Models;

use Classiq\Models\JsonModels\ListItem;
use Classiq\Wysiwyg\FieldsTyped\FieldListJson;

/**
 * Class Product
 * @package Classiq\Models
 * @property string GraphicIcon
 * @property string $code
 * @property int $quantity
 *
 * @property string $shipservice Le mode de livraison possible pour ce produit (il faudrait que ce soit un tableau pour que l'utilisateur puisse faire un choix mais bon là c'est pas nécessaire)
 *
 * @property float $weight Le poids total du produit avec l'emballage en KG
 * @property @private float $weightpackaging Le poids de l'embalage en KG
 * @property float $weightproduct Le poids du produit sans l'emballage
 *
 */
class Product extends Page
{
    use WithPrice;

    static $icon="cq-cart";
    /**
     * @param bool $plural Si true retournera le nom du modèle au pluriel
     * @return string nom du type de record lisible par les humains
     */
    static function humanType($plural=false){
        return $plural?"Produits":"Produit";
    }

    public function update()
    {
        $this->applyTVA();
        $this->weight=($this->weightpackaging+$this->weightproduct)/1000;
        parent::update();
    }


}