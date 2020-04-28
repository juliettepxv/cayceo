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

$bgColor = $vv->getData("bgColor", "");
$style = "";
if ($bgColor) {
    $style = "style='background-color:#" . $bgColor . ";'";
}

?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-img-text <?= $invert ?>" <?=$style?>>
    <div class="container">
        <?= $view->render("blocks/block-img-text/imgTextType/$imgTextTypes") ?>
    </div>

</div>






