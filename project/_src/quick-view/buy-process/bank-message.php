<?php

use Classiq\Models\Order;

the()->headerOutput->contentTypeTxt();
/**
 * Cette page est appelée par le serveur de la banque en cas de transactions
 * Aucun humain n'est sensé voir cette page.
 * En cas de transaction succes doit faire passer les panniers en comandes
 */

//varaibles propres au mail
$mailTo="d.marsalone@gmail.com";
$mailSubject="UMAMIZ BANK MESSAGE";
$api=new \Pov\System\ApiResponse();
$api->addToJson("request",$_REQUEST);

//montant
$montant=$api->testAndGetRequest("montant");
if($api->success){
    $mailSubject.=" $montant";
}
$api->addToJson("montant",$montant);

//codeRetour
$codeRetour=$api->testAndGetRequest("code-retour");
$payed=null;
if($api->success){
    switch ($codeRetour){
        case "payetest":
        case "paiement":
            $mailSubject.=" Payé";
            $payed=true;
            break;
        case "Annulation"://comme en vrai
        case "annulation"://comme dans la doc :\
            $mailSubject.=" Annulé";
            $payed=false;
            break;
    }
}
$api->addToJson("payed",$payed);

//référence = order-uid + HHMM
$reference=the()->request("reference"); //order-45.1341 (order-{orderId}.{heure}{minutes}
$orderuid=null;
/** @var Order $order */
$order=null;
if($reference){
    $split=explode(".",$reference);
    if(count($split)>1){
        $orderuid=$split[0];
    }
}else{
    $api->addError("reference innutilisable");
}
if($api->success){
    $order= Order::getByUid($orderuid,true);
    if(!$order){
        $api->addError("Order introuvable $orderuid");
    }else{
        if($order->is_order){
            $api->addError("La commande $orderuid était déjà à l'état de commande");
        }
    }
}

if($api->success && $payed){
    try{
        $order->setAsOrder($reference,$montant);
    }catch (\Pov\PovException $e){
       $api->addError($e->getMessage());
    }

}
if(!$api->success){
    $mailSubject="Error ".$mailSubject;
}






cq()->sendMail(
    $mailTo,
    $mailSubject,
    "<pre>".json_encode($api,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."</pre>"
);
echo "version=2\n";
echo "cdr=1\n";