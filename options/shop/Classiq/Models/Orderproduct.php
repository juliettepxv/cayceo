<?php


namespace Classiq\Models;

/**
 * Class Orderproduct représente un ligne produit dans une commande
 *
 * @package Classiq\Models
 *
 * @property string $productname nom du produit au moment où il a été ajouté au panier
 * @property Product $product
 * @property int $product_id
 *
 * @property Order $order
 * @property int $order_id
 *
 * @property int $quantity le nombre de produits
 *
 * @property-read float $price_unit Le prix (HT) unitaire du produit
 * @property-read float $weight_unit Le poids (KG) unitaire
 * @property-read float $weight_total Le poids (KG) total
 * @property-read string $shipservice Le nom du service de livraison associé
 *
 */
class Orderproduct extends Classiqbean
{

    use WithPrice;

    public function update()
    {
        if($this->product){
            $this->shipservice=$this->product->shipservice;
            $this->productname=$this->product->name;
            $this->price_unit=$this->product->price;
            $this->tva_rate=$this->product->tva_rate;
            $this->weight_unit=$this->product->weight;
        }
        $this->price=$this->price_unit * $this->quantity;
        $this->weight_total=$this->weight_unit * $this->quantity;
        $this->applyTVA();
        parent::update();
    }



}