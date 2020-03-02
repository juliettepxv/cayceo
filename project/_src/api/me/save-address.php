<?php

use Classiq\Models\Profil;
use Pov\System\ApiResponse;

/** @var ApiResponse $api L'opbjet d'API */

//reset messages
$api->messages=[];
/** @var \Classiq\Models\Address $address */
$address=null;

$uid=$api->testAndGetRequest("uid");
if ($uid){
    $address=\Classiq\Models\Address::getByUid($uid,true);
    if(!$address){
        $api->addError("impossible de trouver ".$uid);
    }
}

if($api->success){
    if(!$address->isEditable()){
        $api->addError("Vous n'avez pas le droit d'éditer cette adresse ");
    }
}

if($api->success){

    //empeche de modifier des champs en dehors du scope
    $possibleFields=[
      "name",
      "city",
      "country",
      "zipcode",
      "phone1",
      "phone2",
      "address"
    ];
    foreach ($_REQUEST as $k=>$v){
        switch (true){
            case in_array($k,$possibleFields) :
                $address->$k=$v;
                break;
            default:
                //$api->addError("$k not managed!");
        }
    }
    if($api->success){
        db()->store($address);
        if(!$address->isValid()){
            $api->addError("Merci de renseigner les champs obligatoires");
        }else{
            $api->addMessage("Parfait, merci...");
        }
    }



}






