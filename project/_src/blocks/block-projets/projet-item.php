<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);

/** @var \Classiq\Models\Filerecord $logo */
$logo=null;

/** @var \Classiq\Models\Filerecord $img */
$img=$vv->getDataAsRecord("image");

/** @var \Classiq\Models\Filerecord $video */
$video=$vv->getDataAsRecord("video");

/** @var String $defaultText */
$defaultText="...";

if($projet){
    if(!$img){
        $img=$projet->thumbnail(true);
    }
    $logo=$projet->logoClient(true);
    //texte par défaut
    $defaultText=$projet->name; //name
    if($projet->titre_lang){
        $defaultText=$projet->titre_lang; //
    }
}
$css=$img?"has-img":"";
$attr=$video?"video-thumbnail":"";


?>
<?if($projet || cq()->wysiwyg()):?>
    <div <?=$vv->wysiwyg()->attr()?> scroll-active="" <?=$attr?> >
        <div class="projet-item <?=$css?>"
             dss="<?=rand(50,100)/100?>"
             <?if($projet && !cq()->wysiwyg()):?>href="<?=$projet->href()?>"<?endif;?>
        >
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
