<?php

use Pov\MVC\View;

/**
 * Renvoie l'utilisateur connecté si il existe
 * @return \Classiq\Models\Profil|null
 */
function me(){
    return \Classiq\Models\Profil::current();
}
//vues propres au profil
View::$possiblesPath[]=__DIR__."/v";
the()->htmlLayout()->layoutVars->isLogged=me()?true:false;
