<?php
/**
 * Un titre H2
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */
$style=$vv->getData("style","h2");
$color=$vv->getData("color","orange");
?>
<div <?=$vv->wysiwyg()->attr()?>scroll-active="" class="block block-titre py-medium" color-theme="<?=$color?>">
    <div class="container" dss="1">
            <?=$vv->wysiwyg()
                ->field("texte_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                ->setPlaceholder("Saisissez votre titre")
                ->setMediumButtons(["bold","removeFormat"])
                ->htmlTag("h2")
                ->addClass("tt-sous-titre $style")
            ?>
    </div>
</div>

