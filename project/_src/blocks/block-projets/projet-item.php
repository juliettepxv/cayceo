<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);
$sizeCss=$vv->getData("size","col-6 col-md-3");
$img=null;
if($projet){
    $img=$projet->thumbnail(true);

}

?>
<?if($projet):?>

    <div class="projet-item" <?=$vv->wysiwyg()->attr()?>>

        <?if($img):?>
            <img src="<?=$img->httpPath()?>" width="<?=$img->image_width?>" height="<?=$img->image_height?>">
        <?endif;?>

        <div>
            <h2><?=$projet->name?></h2>
            <a class="button naked sz-normal px-none" href="<?=$projet->href()?>">
                <?=pov()->svg->use("startup-caret-right")?>
                Découvrir
            </a>
        </div>
    </div>

<?endif?>
