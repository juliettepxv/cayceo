<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];

if(!me()){
    $vv->addError("Oups...");
    $vv->addError("Il faut être connecté pour modifier votre mot de passe");
}
if($api->success){
    $newPassword=$api->testAndGetRequest(
        "newPassword",
        "Merci de saisir un mot de passe");
}
if($api->success){
    $newPasswordConfirm=$api->testAndGetRequest(
        "newPasswordConfirm",
        "Merci de saisir un mot de passe");
}
if($api->success){
    if($newPassword != $newPasswordConfirm){
        $vv->addError("Les mots de passe sont différent");
    }
}
if($api->success){
    if(strlen($newPassword)<5){
        $vv->addError("S'il vous plaît choisissez un mot de passe d'au moins 5 caractères");
    }
}
if($api->success){
    me()->setCleanPassword($newPassword);
    me()->login();
    db()->store(me());
    $api->addMessage("Votre mot de passe est enregistré");
}

