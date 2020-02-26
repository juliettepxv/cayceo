<?php

namespace Startup;


use Pov\System\AbstractSingleton;

/**
 * Cette classe contient des méthodes et des propriétés propre au projet
 * @package Startup
 */
class Site extends AbstractSingleton
{
    /**
     * @var string clé publique à configurer pour les APIs Google ajavascript (google map par exemple)
     */
    public $googleApiKey="";
    /**
     * @var string identifiant Gogle analytics
     */
    public $googleAnalyticsId;
    /**
     * @var string[] liste des blocks possibles
     */
    public $blocksList=[
        "blocks/texte",
        "blocks/titre",
        //"blocks/img",
       // "blocks/img-text",
        "blocks/block-photos/photos",
        "blocks/block-logos/block-logos",
        "blocks/iframe",
        "blocks/video",
        "blocks/dwd",
        "blocks/block-projets/projets",
        "blocks/block-team/team",
        "blocks/form/contact"
    ];
    /**
     * @var string Nom du projet utilisé dans les envois de mail par exemple
     */
    public $projectName="Manifestory";
    /**
     * @var string Email qui reçoit les formulaires
     */
    public $formsMailTo="d.marsalone@gmail.com";
    /**
     * @var string couleur hexa du navigateur sur mobile
     */
    public $themeColor="#18237B";

    /**
     * Renvoie la home page
     * @return \Classiq\Models\Page|null
     * @throws \Pov\PovException
     */
    public function homePage(){
        return cq()->homePage();
    }


    public $COLOR_THEME_BLUE="blue";
    public $COLOR_THEME_ORANGE="orange";
    public $COLOR_THEME_SUNRISE="sunrise";

    public function COLOR_ALL(){
        return[
            $this->COLOR_THEME_BLUE,
            $this->COLOR_THEME_ORANGE,
            $this->COLOR_THEME_SUNRISE,
        ];
    }

}