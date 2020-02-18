<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */
$color=$vv->getData("color","orange");
$colorInvert=$vv->getData("colorInvert");

?>



<div <?= $vv->wysiwyg()->attr() ?> class="block block-team " color-theme="<?=$color?>" color-invert="<?=$colorInvert?>">
    <div class="container" >
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
