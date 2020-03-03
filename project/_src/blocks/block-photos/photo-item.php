<?php

use Classiq\Models\JsonModels\ListItem;

/** @var ListItem $vv */

/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);

$w=1200;
$h=1200;
$imgSrc = pov()
    ->img("")
    ->bgColor("EEEEEE")
    ->displayIfEmpty(true)
    ->sizeMax(1200, 1200)
    ->png()->href();

if ($img && $img->isImage()) {
    $imgSrc = $img->image()
        ->sizeMax(1200, 1200)
        ->jpg()
        ->href();
    $w=$img->image_width;
    $h=$img->image_height;
}
?>
<div <?= $vv->wysiwyg()->attr() ?>
        scroll-active=""
       <?/*data-zoom-img="<?= $imgSrc ?>"*/?>
        class="photo-item">

    <img ss="<?=round(rand(10,50)/100,1)?>"
         src="<?= $imgSrc ?>" width="<?=$w?>px" height="<?=$h?>px">

</div>
