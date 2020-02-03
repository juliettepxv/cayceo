<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);
$img=null;
$text="...";
if($projet){
    $img=$projet->thumbnail(true);
    $text=$projet->name;
    if($projet->titre_lang){
        $text=$projet->titre_lang;
    }
}
$css=$img?"has-img":"";


?>
<?if($projet || cq()->wysiwyg()):?>
    <div <?=$vv->wysiwyg()->attr()?>>
        <div class="projet-item <?=$css?>"
             scroll-active=""
             dss="<?=rand(50,100)/100?>"
             <?if($projet):?>href="<?=$projet->href()?>"<?endif;?>
        >

            <?=$projet->wysiwyg()
                ->field("logoclient")
                ->image()
                ->contextMenuSize(SIZE_SMALL)
                ->contextMenuPosition(POSITION_CENTER)
                ->format()
                ->displayIfEmpty(true)
                ->sizeMax(200,200)
                ->png()
                ->htmlTag("logoclient", $projet->name,false )?>

            <?if($img):?>
                <img class="thumb" alt=""
                     src="<?=$img->httpPath()?>"
                     width="<?=$img->image_width?>" height="<?=$img->image_height?>">
            <?endif;?>

            <?if($projet):?>
                <div class="texts">
                    <h2><?=$text?></h2>
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
