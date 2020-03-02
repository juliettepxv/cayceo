<?php

use Classiq\Seo\C_sitemap_xml;
use Classiq\Wysiwyg\WysiwygConfig;

include_once    "options/profile/boot.profile.php";

if(the()->human->isAdmin){
    //conf backoffice

    WysiwygConfig::inst()->recordsWeCanBrowse[]="Product";
    WysiwygConfig::inst()->recordsWeCanBrowse[]="Shipmode";

    WysiwygConfig::inst()->recordsWeCanCreate[]="Product";

    WysiwygConfig::inst()->recordsWeCanSelect[]="Product";
}
//seo
C_sitemap_xml::$modelTypesToIndex[]="product";


/**
 * Renvoie le panier en cours
 * @param bool $createIfNull quand défini sur false ne crée pas de panier automatiquement
 * @return \Classiq\Models\Order|null
 */
function basket($createIfNull=true){
    return \Classiq\Models\Order::basket($createIfNull);
}
/**
 * Methodes pratiques pour un eShop
 * @return \Shop\ShopUtils
 */
function shopUtils(){
    return \Shop\ShopUtils::inst();
}

/**
 * Methode rapide pour formater un prix en mode joli
 * @param $price
 * @return string
 */
function price($price){
    return shopUtils()->formatPrice($price);
}
/**
 * Methode rapide pour formater un poids en mode joli
 * @param $price
 * @return string
 */
function weight($price){
    return shopUtils()->formatWeight($price);
}