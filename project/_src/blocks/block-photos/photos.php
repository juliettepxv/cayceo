<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */

?>

<div <?= $vv->wysiwyg()->attr() ?> class="block block-photos" dss="0.9">
    <div class="container">
        <?=$vv->wysiwyg()->field("photos")
            ->listJson("blocks/block-photos/photo-item")
            ->horizontal()
            ->contextMenuPosition(POSITION_TOP)
            ->blockPickerEmptyMessage("Insérez des images")
            ->contextMenuSize(SIZE_SMALL)
            ->onlyImages()
            ->htmlTag("div")
            ->addClass("list")
        ?>
    </div>
</div>
