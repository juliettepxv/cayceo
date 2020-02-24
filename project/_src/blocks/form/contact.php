<?php
/**
 * Un block formulaire contact
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
?>
<div <?=$vv->wysiwyg()->attr()?> scroll-active="" class="block block-contact py-medium">
    <div class="container" dss="1">
            <?=$view->render("blocks/form/form-contact")?>
    </div>
</div>

