<?php
/**
 * Un block avec un texte paragraphe formaté
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
$textTypes=$vv->getData("textTypes","text");
?>
<div <?= $vv->wysiwyg()->attr() ?> scroll-active="" class="block block-texte pb-medium">

        <?=$view->render("blocks/block-text/textType/$textTypes")?>
</div>
