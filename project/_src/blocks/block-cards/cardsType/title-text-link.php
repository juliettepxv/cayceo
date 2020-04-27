<?php

use Classiq\Models\JsonModels\ListItem;

/** @var ListItem $vv ici */
/** @var \Classiq\Models\Project $projet */
$projet = $vv->getDataAsRecord("page");
?>
<div class="title-text-link" <? if ($projet && !cq()->wysiwyg()): ?>href="<?= $projet->href() ?>"
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
    <div class="text-link">
        <a href="#">En savoir plus</a>
    </div>
</div>
