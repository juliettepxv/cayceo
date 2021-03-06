<?php
/**
 * Un block avec un texte paragraphe formaté
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
?>

    <div class="container <?= $vv->getData("align", "left") ?>" dss="1">
        <?= $vv->wysiwyg()
            ->field("texte_lang")
            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
            ->setPlaceholder("Saisissez votre texte")
            ->setMediumButtons(["h2", "h3","h5", "bold", "quote", "anchor", "removeFormat"])
            ->htmlTag("div")
            ->addClass("text rich-text")
        ?>
    </div>

