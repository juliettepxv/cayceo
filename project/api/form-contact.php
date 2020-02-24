<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];
$message=$vv->testAndGetRequest("message");
$firstname=$vv->testAndGetRequest("firstname");
$lastname=$vv->testAndGetRequest("lastname");
$object=$vv->testAndGetRequest("object");
$mail1=$vv->testAndGetRequest("mail1");
$mail2=$vv->testAndGetRequest("mail2");