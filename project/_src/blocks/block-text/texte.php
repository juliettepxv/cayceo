<?php
/**
 * Un block avec un texte paragraphe formaté
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
$textTypes = $vv->getData("textTypes", "text");
$bgColor = $vv->getData("bgColor", "");
$style = "";
if ($bgColor) {
    $style = "style='background-color:#" . $bgColor . ";'";
}
?>
<div <?= $vv->wysiwyg()->attr() ?> scroll-active="" class="block block-texte pb-medium" <?=$style?>>

    <?= $view->render("blocks/block-text/textType/$textTypes") ?>
</div>
