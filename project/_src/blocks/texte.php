<?php
/**
 * Un block avec un texte paragraphe formaté
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
?>
<div <?=$vv->wysiwyg()->attr()?> scroll-active="" class="block block-texte py-medium">
    <div class="container <?=$vv->getData("align","left")?>" dss="1">
            <?=$vv->wysiwyg()
                ->field("texte_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                ->setPlaceholder("Saisissez votre texte")
                ->setMediumButtons([
                    "h1","h2",
                    "bold","italic","underline","strikethrough",
                    "orderedlist","unorderedlist",
                    "anchor","select-record",
                    "removeFormat"]
                )
                ->htmlTag("div")
                ->addClass("txt rich-text")
            ?>
    </div>
</div>

