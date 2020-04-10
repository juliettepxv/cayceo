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
    ->sizeMax(400, 400)
    ->jpg()->htmlTag();


?>
<div class="ico-text">

    <div class="img">
        <?= $imgTag ?>
    </div>

    <?= $vv->wysiwyg()
        ->field("texte_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setPlaceholder("Texte")
        ->setMediumButtons(["h2", "bold", "quote", "anchor"])
        ->htmlTag("div")
        ->addClass("rich-text")
    ?>
</div>
