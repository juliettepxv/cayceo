<?php
use Pov\System\ApiResponse;
/** @var ApiResponse $api */

//reset messages
$api->messages=[];
\Classiq\Models\Profil::logout();

