<?php
/**
 * Un titre H2
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
$style=$vv->getData("style","h2");
$align=$vv->getData("align","left");
?>
<div <?=$vv->wysiwyg()->attr()?> scroll-active=""
     class="block block-titre">

    <div class="container <?=$align?>" dss="1">
        <?=$vv->wysiwyg()
            ->field("texte_lang")
            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
            ->setPlaceholder("Saisissez votre titre")
            ->htmlTag("h2")
            ->addClass("tt-sous-titre $style")
        ?>
    </div>

</div>

