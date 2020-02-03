<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);
$img=null;
if($projet){
    $img=$projet->thumbnail(true);
}
$css=$img?"has-img":"";

?>
<?if($projet || cq()->wysiwyg()):?>

    <div class="projet-item <?=$css?>"
        scroll-active=""
        dss="<?=rand(50,100)/100?>"
        <?=$vv->wysiwyg()->attr()?>>

        <?if($img):?>
            <img src="<?=$img->httpPath()?>" width="<?=$img->image_width?>" height="<?=$img->image_height?>">
        <?endif;?>

        <?if($projet):?>
        <div class="texts">
            <h2><?=$projet->name?></h2>
            <a class="button naked sz-normal px-none" href="<?=$projet->href()?>">
                Découvrir
                <?=pov()->svg->use("startup-caret-right")?>
            </a>
        </div>
        <?endif;?>

        <?if($vv->getData("decoAfter")):?>
        <div class="deco" dom-copy="bubulle">bubulles ici</div>
        <?endif?>

    </div>

<?endif?>
