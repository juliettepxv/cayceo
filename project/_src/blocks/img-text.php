<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
$invert=$vv->getData("invert")?"invert":"";
$monogramme=$vv->getData("monogramme")?"monogramme":"";
?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-img-text <?=$invert?>">
    <div class="container">
        <div class="img-text">
            <div class="row">
                <div class="col-6" dss="1.1">
                    <? if ($img && $img->isImage()): ?>
                        <div class="block-img" >
                            <div class="img-wrap" data-zoom-img="<?= $img->image()->sizeMax(1600, 1600)->jpg()->href() ?>">
                                <?= $img->image()
                                    ->width(800)
                                    ->jpg()
                                    ->htmlTag()
                                    ->addClass("img-responsive")
                                    ->setAttribute("dom-copy",'img')
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

                <div class="col-6" dss="1.1">
                    <div class="block-texte">
                        <? if ($monogramme): ?>
                            <div class="monogramme pb-medium">
                                <?=pov()->svg->use("startup-monogramme")?>
                            </div>
                        <? endif ?>
                        <?= $vv->wysiwyg()
                            ->field("texte_lang")
                            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                            ->setPlaceholder("Saisissez votre texte")
                            ->setMediumButtons(["h2","bold","quote","anchor"])
                            ->htmlTag("div")
                            ->addClass("txt")
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>






