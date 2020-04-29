<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */

//le style de composition
$styleType=$vv->getData("styleType","percentage-circle-item");
$bgColor=$vv->getData("bgColor") ? "bgColor" : "";
?>



<div <?= $vv->wysiwyg()->attr() ?> class="block block-percentage  <?=$bgColor?>">
    <div class="container" >
        <?=$vv->wysiwyg()
            ->field("items")
            ->listJson("blocks/block-percentages/percentage-item")
            ->blockPickerEmptyMessage("ajouter")
            ->horizontal()
            ->contextMenuPosition(POSITION_TOP)
            ->contextMenuSize(SIZE_SMALL)
            ->htmlTag("div")
        ->addClass("list ".$styleType)
        ?>
    </div>


</div>
