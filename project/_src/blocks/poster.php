<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
$logo = $vv->getDataAsRecord("logo");
$invert = $vv->getData("invert") ? "invert" : "";
$monogramme = $vv->getData("monogramme") ? "monogramme" : "";
?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-poster <?= $invert ?>">

    <div class="poster">

        <? if ($img && $img->isImage()): ?>
            <div class="block-img">
                <div class="img-wrap">
                    <?= $img->image()
                        ->width(1600)
                        ->jpg()
                        ->htmlTag()
                        ->addClass("")
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

        <div class="layer">
        </div>

        <div class="container">
            <div class="text-wrap">

                <? if ($logo && $logo->isImage()): ?>
                    <div class="logo">

                        <?= $logo->image()
                            ->width(760)
                            ->png(100)
                            ->htmlTag()
                            ->addClass("img-responsive")
                            ->setAttribute("dom-copy", 'img')
                        ?>
                    </div>
                <? elseif (\Classiq\Wysiwyg\Wysiwyg::$enabled): ?>
                    <div id="cq-style">
                        <div text-center class="cq-box cq-th-danger">
                            Il faut choisir une image
                        </div>
                    </div>
                <? endif ?>


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
                        ->setMediumButtons(["h1", "h2", "anchor"])
                        ->htmlTag("div")
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>






