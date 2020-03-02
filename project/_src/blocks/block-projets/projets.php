<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */

$lisName=$vv->getData("listName",\Classiq\Models\Project::LIST_NAME_PROJETS);
$liste=\Classiq\Models\Project::getList($lisName);
?>

<div <?= $vv->wysiwyg()->attr() ?> class="block block-projets">
    <div class="container">
        <?=$liste->wysiwyg()
            ->field("items")
            ->listJson(
                    [
                        "blocks/block-projets/projet-item",
                        //"blocks/deco"
                    ]
            )
            ->onlyRecords("Project")
            ->horizontal()
            ->contextMenuPosition(POSITION_TOP)
            ->blockPickerEmptyMessage("Insérez des projets")
            ->contextMenuSize(SIZE_SMALL)
            ->htmlTag("div")
            ->setAttribute("bricks",true)
        ?>
    </div>
</div>
