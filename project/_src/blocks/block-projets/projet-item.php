<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);
$img=null;
$video=null;
/** @var \Classiq\Models\Filerecord $media */
$media=$vv->getDataAsRecord("media");
if($media){
    if($media->isVideo()){
        $video=$media;
    }
    if($media->isImage()){
        $img=$media;
    }
}

$defaultText="...";
if($projet){
    if(!$img && $video){
        $img=$projet->thumbnail(true);
    }

    $logo=$projet->logoClient(true);
    $defaultText=$projet->name;
    if($projet->titre_lang){
        $defaultText=$projet->titre_lang;
    }
}
$css=$img?"has-img":"";


?>
<?if($projet || cq()->wysiwyg()):?>
    <div <?=$vv->wysiwyg()->attr()?>>
        <div class="projet-item <?=$css?>"
             scroll-active=""
             dss="<?=rand(50,100)/100?>"
             <?if($projet && !cq()->wysiwyg()):?>href="<?=$projet->href()?>"<?endif;?>
        >
            <?if($img || $video):?>
                <?if($logo):?>
                    <img class="logoclient" alt=""
                         src="<?=$logo->httpPath()?>"
                         width="<?=$logo->image_width?>" height="<?=$logo->image_height?>">
                <?endif?>

                <?if($img):?>
                    <img class="thumb" alt=""
                         src="<?=$img->httpPath()?>"
                         width="<?=$img->image_width?>" height="<?=$img->image_height?>">
                <?endif;?>
                <?if($video):?>
                    <video class="thumb video" src="<?=$video->httpPath()?>" muted="muted"></video>
                <?endif;?>

            <?endif;?>

            <?if($projet):?>
                <div class="texts">
                    <?=$vv->wysiwyg()
                        ->field("text_lang")
                        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                        ->setDefaultValue($defaultText)
                        ->htmlTag("h2")
                    ?>
                    <a class="button naked sz-normal px-none" href="<?=$projet->href()?>">
                        Découvrir
                        <?=pov()->svg->use("startup-caret-right")?>
                    </a>
                </div>
            <?endif;?>



        </div>
        <?if($vv->getData("decoAfter")):?>
            <?=$view->render("bubulles/normal")?>
        <?endif?>
    </div>


<?endif?>
