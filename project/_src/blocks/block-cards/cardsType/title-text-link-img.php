<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv ici */

/** @var \Classiq\Models\Filerecord $img */
$img=$vv->getDataAsRecord("img");
if($img){
    $img=$img->image();
}else{
    $img=pov()->img("");
}
$imgTag=$img
    ->bgColor("EEEEEE")
    ->displayIfEmpty(true)
    ->sizeMax(400,400)
    ->jpg()->htmlTag();

?>
<div class="title-text-link-img">

    <div class="wrap-button">
        <?=$vv->wysiwyg()
            ->field("titre_lang")
            ->string()->setPlaceholder("Titre")
            ->htmlTag("h2")
            ->addClass("button")
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
    <div class="img">
        <?= $imgTag?>
    </div>
</div>
