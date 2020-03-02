<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];
//pas loggé
$api->addToJson("isLogged",false);

if(me()){
    //loggé
    $api->addToJson("isLogged",true);

}

