<?php
/** @var Project $vv */
use Classiq\Models\Project;

/** @var \Classiq\Models\Filerecord $logo */
$logo=null;
/** @var \Classiq\Models\Filerecord $img */
$img=$vv->getValueAsRecord("imagepreview");
/** @var \Classiq\Models\Filerecord $video */
$video=$vv->getValueAsRecord("videopreview");
/** @var String $defaultText */
$defaultText="...";

if(!$img){
    $img=$vv->thumbnail(true);
}
$logo=$vv->logoClient(true);

//texte par défaut
$defaultText=$vv->name; //name
if($vv->titre_lang){
    $defaultText=$vv->titre_lang; //
}

$css=$img?"has-img":"";
$attrs=new \Pov\Html\Trace\Attributes();
if(!cq()->wysiwyg()){
    $attrs["href"]=$vv->href();
}
if($video){
    $attrs["video-thumbnail"]=true;
}
?>
<div class="project-card <?=$css?>" scroll-active="" <?=$attrs?> <?=$view->attrRefresh($vv->uid())?>>
    <?if($img):?>
        <?if($logo):?>
            <img class="logoclient" alt=""
                 src="<?=$logo->httpPath()?>"
                 width="<?=$logo->image_width?>" height="<?=$logo->image_height?>">
        <?endif?>
        <div class="thumb">
            <img alt=""
                 src="<?=$img->httpPath()?>"
                 width="<?=$img->image_width?>" height="<?=$img->image_height?>">
            <?if($video):?>
                <video class="thumb video" src="<?=$video->httpPath()?>" muted="muted" loop="loop" preload="none"></video>
            <?endif;?>
        </div>

    <?endif;?>


    <div class="texts">
        <?=$vv->wysiwyg()
            ->field("textpreview_lang")
            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
            ->setDefaultValue($defaultText)
            ->htmlTag("h2")
        ?>
        <a class="button naked sz-normal px-none" href="<?=$vv->href()?>">
            Découvrir
            <?=pov()->svg->use("startup-caret-right")?>
        </a>
    </div>




</div>