<?php
use Classiq\Classiq;
use Classiq\Models\User;
use Classiq\Wysiwyg\Wysiwyg;
use Classiq\Wysiwyg\WysiwygConfig;
use Localization\Lang;
use Pov\MVC\View;

//----------bdd-------------------
include_once __DIR__ . "/db.php";
include_once __DIR__ . "/events.php";
include_once __DIR__ . "/gump.php";

//définir la version en random pour contourner le cache
the()->version(date("Y-m-d-His"));

Classiq::install();
include_once __DIR__ . "/mail-config.php";

//loged in?
if(User::connected()){
    the()->human->isAdmin = Wysiwyg::$enabled = User::connected()->isAdmin();
}
if(the()->human->isAdmin){
    //conf backoffice
    \Classiq\Wysiwyg\WysiwygConfig::inst()->recordsWeCanBrowse=["Page","Project","Hashtag","Nav"];
    \Classiq\Wysiwyg\WysiwygConfig::inst()->recordsWeCanCreate=["Page","Project","Hashtag"];
    \Classiq\Wysiwyg\WysiwygConfig::inst()->recordsWeCanSelect=["Page","Project","Hashtag"];
}
//vues propres au profil
View::$possiblesPath[]="options";
include_once    "options/shop/boot.shop.php";
//seo
//\Classiq\Seo\C_sitemap_xml::$modelTypesToIndex=["page","modeleetc"];

/**
 * Pour avoir des textes d'interface
 * @param string $term
 * @return string
 */
function trad($term){
    return the()->project->translation($term);
}
/**
 * Accès rapide vers les classes utilitaires
 * @return \Pov\Utils\Utils
 */
function utils(){
    return pov()->utils;
}

/**
 * Accès rapide vers methodes et variables propres au site
 * @return \Startup\Site
 */
function site(){
    return \Startup\Site::inst();
}

Lang::$flagsUrlBasePath="vendor/davidmars/localization/flags/";


