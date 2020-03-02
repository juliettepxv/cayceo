<?php

use Classiq\Models\Profil;
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];

$email=$api->testAndGetRequest(
    "email",
    "Merci de saisir ton email",
    true
);
$pwd=$api->testAndGetRequest(
    "pwd",
    "Merci de saisir ton mot de passe",
    true
);

if($api->success){
    $profil=Profil::getByEmail($email);
    if(!$profil){
        $api->addError("Oups, je ne trouve pas de compte avec ce mail");
    }

}
if($api->success){
    if(!$profil->isCleanPwdValid($pwd)){
        $api->addError("Mauvais mot de passe");
    }else{
        $profil->login();
        $api->addMessage("Salut $profil->name");

    }
}

