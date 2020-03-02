<?php

use Classiq\Models\Profil;
use Pov\System\ApiResponse;

/** @var ApiResponse $api L'opbjet d'API */

//reset messages
$api->messages=[];

$email=$api->testAndGetRequest(
    "email",
    "merci de renseigner un email",
    true
);

$pwd=$api->testAndGetRequest(
    "pwd",
    "Merci de renseigner un mot de passe",
    true
);
$pwdConfirm=$api->testAndGetRequest(
    "pwdConfirm",
    "Merci de confirmer votre mot de passe",
    true
);

if($api->success){
    if($pwdConfirm != $pwd){
        $api->addError("Les mots de passe sont différents");
    }
}

if($api->success){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $api->addError("L'email ne semble pas correct");
    }
}
if($api->success){
    $profil=Profil::getByEmail($email);
    if($profil){
        $api->addError("Un compte avec cet email existe déjà. Essayez de vous connecter");
    }else{
        /** @var Profil $profil */
        $profil=db()->dispense("profil");
        $profil->email=$email;
        $profil->setCleanPassword($pwd);
        db()->store($profil);
        $profil->login();
        //$profil->generateTokenAndSendByMail();
        $vv->addMessage("Votre compte a été créé");
    }
}





