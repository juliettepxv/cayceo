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

    <?=$vv->wysiwyg()
        ->field("titre_lang")
        ->string()->setPlaceholder("Titre")
        ->htmlTag("h2")
    ?>
    <hr>
    <?=$vv->wysiwyg()
        ->field("texte_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setPlaceholder("Texte")
        ->htmlTag("div")
        ->addClass("text")
    ?>
    <hr>
    <div>
        <a href="#" class="button">todo bouton à configurer</a>
    </div>
    <hr>
    <div>
        <?= $imgTag?>
    </div>
</div>
