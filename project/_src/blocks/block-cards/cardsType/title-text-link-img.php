<?php

use Classiq\Models\JsonModels\ListItem;

/** @var ListItem $vv ici */

/** @var \Classiq\Models\Filerecord $img */
$img = $vv->getDataAsRecord("img");
if ($img) {
    $img = $img->image();
} else {
    $img = pov()->img("");
}
$imgTag = $img
    ->bgColor("EEEEEE")
    ->displayIfEmpty(true)
    ->sizeMax(800, 800)
    ->png()
    ->htmlTag()->addClass("img-responsive");

/** @var \Classiq\Models\Project $projet */
$projet = $vv->getDataAsRecord("page");


?>
<div class="title-text-link-img" <? if ($projet && !cq()->wysiwyg()): ?>href="<?= $projet->href() ?>"
    <? endif ?>>

    <div class="wrap-button">
        <?= $vv->wysiwyg()
            ->field("titre_lang")
            ->string()->setPlaceholder("Titre")
            ->htmlTag("h2")
            ->addClass("button sz-big")
        ?>
    </div>

    <?= $vv->wysiwyg()
        ->field("texte_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setPlaceholder("Texte")
        ->htmlTag("div")
        ->addClass("text")
    ?>

    <? if ($projet): ?>
        <div class="text-link">
            En savoir plus
        </div>
    <? endif ?>


    <? if ($imgTag): ?>
            <?= $imgTag ?>
    <? endif; ?>
</div>
