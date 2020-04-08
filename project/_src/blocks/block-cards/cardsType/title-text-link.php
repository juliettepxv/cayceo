<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv ici */
?>
<div class="title-text-link">

    <?=$vv->wysiwyg()
        ->field("titre_lang")
        ->string()->setPlaceholder("Titre")
        ->htmlTag("h2")
    ?>
    <?=$vv->wysiwyg()
        ->field("texte_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setPlaceholder("Texte")
        ->htmlTag("div")
    ?>
    <div>
        <a href="#" class="button">todo bouton à configurer</a>
    </div>
</div>
