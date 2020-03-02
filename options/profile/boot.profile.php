<?php
/**
 * Renvoie l'utilisateur connecté si il existe
 * @return \Classiq\Models\Profil|null
 */
function me(){
    return \Classiq\Models\Profil::current();
}
the()->htmlLayout()->layoutVars->isLogged=me()?true:false;
