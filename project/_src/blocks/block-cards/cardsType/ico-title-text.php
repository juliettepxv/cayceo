<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv ici */
?>
<div class="ico-title-text">
    <div>
        <?=pov()->svg->use("startup-social-twitter")?>
        <div>TODO dynamiser icone</div>
    </div>

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
</div>
