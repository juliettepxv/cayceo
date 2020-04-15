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
    ->sizeMax(1200,750)
    ->png()
    ->htmlTag()->addClass("img-responsive");

/** @var \Classiq\Models\Project $projet */
$projet=$vv->getDataAsRecord("page");


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

    <?if($projet):?>
    <div class="text-link">
        <a href="<?=$projet->href()?>">En savoir plus</a>
    </div>
    <?endif?>

    <?if($imgTag):?>
    <div class="img">
        <?= $imgTag?>
    </div>
    <?endif;?>
</div>
