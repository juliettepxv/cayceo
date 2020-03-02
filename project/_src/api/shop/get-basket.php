<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];

$basket=basket(false);
if($basket){
    $api->addToJson("productsQuantity",$basket->productsQuantity());
    $api->addToJson("productsTotalHT",shopUtils()->formatPrice($basket->calc_products_price()));
    $api->addToJson("productsTotalTTC",shopUtils()->formatPrice($basket->calc_products_price_with_tva()));
    $api->addToJson("basketTableHtml",\Pov\MVC\View::get("shop/basket/basket-tables")->render());
}else{
    $api->addToJson("productsQuantity",0);
}

