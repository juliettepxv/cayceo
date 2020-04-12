<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
$invert = $vv->getData("invert") ? "invert" : "";
$monogramme = $vv->getData("monogramme") ? "monogramme" : "";
?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-poster <?= $invert ?>">

    <div class="poster">

        <div class="container">



            <div class="text-wrap">

                <div class="rich-text">
                    <? if ($monogramme): ?>
                        <div class="monogramme pb-medium">
                            <?= pov()->svg->use("startup-monogramme") ?>
                        </div>
                    <? endif ?>
                    <?= $vv->wysiwyg()
                        ->field("texte_lang")
                        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                        ->setPlaceholder("Saisissez votre texte")
                        ->setMediumButtons(["h1", "h3", "anchor"])
                        ->htmlTag("div")
                    ?>
                </div>
            </div>


            <? if ($img && $img->isImage()): ?>
                <div class="block-img">
                    <div class="img-wrap">
                        <?= $img->image()
                            ->width(1200)
                            ->jpg()
                            ->htmlTag()
                            ->addClass("img-responsive")
                            ->setAttribute("dom-copy", 'img')
                        ?>
                    </div>
                </div>
            <? elseif (\Classiq\Wysiwyg\Wysiwyg::$enabled): ?>
                <div id="cq-style">
                    <div text-center class="cq-box cq-th-danger">
                        Il faut choisir une image
                    </div>
                </div>
            <? endif ?>

        </div>
    </div>

</div>






