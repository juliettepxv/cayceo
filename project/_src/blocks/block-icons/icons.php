<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */

//le style de composition
$styleType=$vv->getData("styleType","icon-circle-item");
$bgColor=$vv->getData("bgColor") ? "bgColor" : "";
?>



<div <?= $vv->wysiwyg()->attr() ?> class="block block-icon  <?=$bgColor?>">
    <div class="container" >
        <?=$vv->wysiwyg()
            ->field("items")
            ->listJson("blocks/block-icons/icon-item")
            ->blockPickerEmptyMessage("ajouter")
            ->horizontal()
            ->contextMenuPosition(POSITION_TOP)
            ->contextMenuSize(SIZE_SMALL)
            ->onlyImages()
            ->htmlTag("div")
        ->addClass("list ".$styleType)
        ?>
    </div>
</div>
