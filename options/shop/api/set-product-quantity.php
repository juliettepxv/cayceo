<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];

$productUid=$api->testAndGetRequest("productUid");
$quantity=$api->testAndGetRequest("quantity");

if($api->success){
    $product=\Classiq\Models\Product::getByUid($productUid,true);
    if(!$product){
        $api->addError("Le produit $productUid n'existe pas");
    }
}

if($api->success){
    $api->addMessage("ajouter au panier $quantity x $productUid");
    basket()->addProduct($product,$quantity);
}

