<?php

use Classiq\Models\JsonModels\ListItem;

/** @var ListItem $vv */

/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);


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
}
?>
<div <?= $vv->wysiwyg()->attr() ?>
        scroll-active=""
        data-zoom-img="<?= $imgSrc ?>"
        class="photo-item">

    <img src="<?= $imgSrc ?>">
    <?= $view->render("bubulles/normal") ?>

</div>
