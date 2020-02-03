<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */
$color="sunrise";

?>

<div <?= $vv->wysiwyg()->attr() ?> class="block block-team">
    <div class="container" color-theme="<?=$color?>">
        <?=$vv->wysiwyg()
            ->field("items")
            ->listJson("blocks/block-team/team-item")
            ->blockPickerEmptyMessage("ajouter")
            ->horizontal()
            ->contextMenuPosition(POSITION_TOP)
            ->contextMenuSize(SIZE_SMALL)
            ->onlyImages()
            ->htmlTag("div")
        ->addClass("list")
        ?>
    </div>
</div>