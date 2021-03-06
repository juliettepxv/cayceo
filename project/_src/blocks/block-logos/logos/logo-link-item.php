<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */
$imgTag="";
/** @var \Classiq\Models\Filerecord $img */
$img=$vv->targetUid(true);
if($img && $img->isImage()){
    $imgTag=$img->image()
        ->sizeMax(150,150)
        ->png()
        ->htmlTag("","",true);
}else{
    $imgTag=pov()
        ->img("")
        ->bgColor("EEEEEE")
        ->displayIfEmpty(true)
        ->sizeMax(150,150)
        ->png()
        ->htmlTag("","",true);
}

$href=$vv->getData("href");


/** @var \Classiq\Models\Filerecord $fichier */
/*
$fichier=$vv->getDataAsRecord("fichier");
if($fichier){
    $href=$fichier->httpPath();
}
*/

?>
<?if($href):?>
    <a dss="<?=1+rand(10,100)/100?>" class="item" <?=$vv->wysiwyg()->attr()?> href="<?=$href?>" target="_blank"> <?=$imgTag?> </a>
<?else:?>
    <span dss="<?=1+rand(10,100)/100?>" class="item" <?=$vv->wysiwyg()->attr()?>> <?=$imgTag?> </span>
<?endif?>

