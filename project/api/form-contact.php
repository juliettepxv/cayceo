<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $vv */

//reset messages
$vv->messages=[];
$message=$vv->testAndGetRequest(
    "message",trad(
    "Merci de renseigner votre message"
    ));
$lastname=$vv->testAndGetRequest("lastname",trad(
    "Merci de nous indiquer votre nom"
));
$phone=$vv->testAndGetRequest("phone",trad(
    "Merci de nous indiquer votre numéro de téléphone"
));
$phoneMoment=$vv->testAndGetRequest("phonemoment",trad(
    "Quand souhaitez vous être appélé?"
),false);
$email=$vv->testAndGetRequest("email",trad(
    "Merci de renseigner votre email"
));
if($vv->success){
    //$humanMessage=preg_replace('!\s+!', ' ', $humanMessage)." .-";
    if( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $vv->addError(trad("Ce mail ne semble pas correct"));
    }
}
if($vv->success){
    $success=false;
    try {
        $m="";
        $m.="<b>Nom:</b> $lastname<br>";
        $m.="<b>Email:</b> $email<br>";
        $m.="<b>Téléphone:</b> $phone<br>";
        $m.="<b>Message:</b> $message<br>";
        $m.="<b>A rappeler le:</b> $phoneMoment<br>";

        foreach (utils()->array->fromString(site()->formsMailTo) as $to){
            $success=cq()->sendMail(
                $to,
                "FORMULAIRE CONTACT ".strtoupper(site()->projectName)." [contact] [$email]",
                $m
            );
        }

    }catch (\Pov\PovException $exception){
        $vv->addError($exception->getMessage());
    }

    if(!$success){
        $vv->addError(trad("une erreur s'est produite"));
    }
}


if($vv->success){
    $vv->addMessage(trad("Merci, nous vous répondrons dans les plus brefs délais."));
}else{
    array_unique($vv->errors);
}