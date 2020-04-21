<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv ici */

?>
<div class="title-text-link">

    <div class="wrap-button">
        <?=$vv->wysiwyg()
            ->field("titre_lang")
            ->string()->setPlaceholder("Titre")
            ->htmlTag("h2")
            ->addClass("button sz-big")
        ?>
    </div>

    <?=$vv->wysiwyg()
        ->field("texte_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setPlaceholder("Texte")
        ->htmlTag("div")
        ->addClass("text")
    ?>
    <div class="text-link">
        <a href="#" >En savoir plus</a>
    </div>
</div>
