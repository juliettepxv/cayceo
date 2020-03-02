<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];
$email=$api->testAndGetRequest(
    "email",
    "Merci de saisir votre email");
if($api->success){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $api->addError("Cet email n'est pas valide, vérifiez votre saisie");
    }
}
if($api->success){
    $profil=\Classiq\Models\Profil::getByEmail($email);
    if(!$profil){
        $api->addError("Cet email n'est pas associé à un compte Umamiz");
    }
}
if($api->success){
    $profil->generateTokenAndSendByMail(true);
    $api->addMessage("Nous venons de vous envoyer un email afin de récupérer votre mot de passe ");
    $api->addMessage("À tout de suite !");
}


