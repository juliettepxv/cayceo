<?php
/** @var Classiq\Models\JsonModels\ListItem $vv */
$cardsType=$vv->getData("cardsType",site()->cardsTypeDefault);
?>

<div <?= $vv->wysiwyg()->attr() ?> class="block block-cards <?=$cardsType?>">
    <div class="container">
        <?=$vv->wysiwyg()
            ->field("items")
            ->listJson(
                    [
                        "blocks/block-cards/card-item",
                    ]
            )
            ->horizontal()
            ->contextMenuPosition(POSITION_TOP)
            ->blockPickerEmptyMessage("Insérez des cartes")
            ->contextMenuSize(SIZE_SMALL)
            ->htmlTag("div")
            ->addClass("cards row")
        ?>
    </div>
</div>
