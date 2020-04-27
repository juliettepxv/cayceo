<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $vv */

//reset messages
$vv->messages=[];
$humanMessage=$vv->testAndGetRequest("humanMessage");
$message=$vv->testAndGetRequest(
    "message",trad(
    "form errorMessage invalid message"
    ));
$lastname=$vv->testAndGetRequest("lastname",trad(
    "form errorMessage invalid lastname"
));
$phone=$vv->testAndGetRequest("phone",trad(
    "form errorMessage invalid phone"
));
$date=$vv->testAndGetRequest("date",trad(
    "form errorMessage invalid date"
));
$email=$vv->testAndGetRequest("email",trad(
    "form errorMessage invalid email"
));

$email="";
if($vv->success){
    //$humanMessage=preg_replace('!\s+!', ' ', $humanMessage)." .-";
    $email=$email1."@".$email2;
    if( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $vv->addError(trad("form errorMessage invalid email"));
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
        $m.="<b>A rappeler le:</b> $date<br>";
        $m.="<br><br>";
        $m.=$humanMessage;
        $success=cq()->sendMail(
            site()->formsMailTo,
            "FORMULAIRE CONTACT ".strtoupper(site()->projectName)." [$object] [$email]",
            $m
        );
    }catch (\Pov\PovException $exception){
        $vv->addError($exception->getMessage());
    }

    if(!$success){
        $vv->addError(trad("une erreur s'est produite"));
    }
}


if($vv->success){
    $vv->addMessage(trad("form successMessage"));
}else{
    array_unique($vv->errors);
}