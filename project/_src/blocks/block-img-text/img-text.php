<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
$img2 = $vv->targetUid(true);
$invert = $vv->getData("invert") ? "invert" : "";
$imgTextTypes = $vv->getData("imgTextTypes", "image-text");

?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-img-text <?= $invert ?>">
    <div class="container">
        <?= $view->render("blocks/block-img-text/imgTextType/$imgTextTypes") ?>
    </div>

</div>






