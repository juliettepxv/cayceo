<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
?>


<div class="image-text">
    <div class="img-text">
        <div class="row">
            <div class="col-lg-6" dss="1.1">
                <? if ($img && $img->isImage()): ?>

                    <div class="img-wrap" data-zoom-img="<?= $img->image()->sizeMax(1200, 800)->jpg()->href() ?>">
                        <?= $img->image()
                            ->width(800)
                            ->jpg()
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
            </div>

            <div class="col-lg-6" dss="1.1">
                <div class="rich-text">
                    <?= $vv->wysiwyg()
                        ->field("texte_lang")
                        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                        ->setPlaceholder("Saisissez votre texte")
                        ->setMediumButtons(["h2", "bold", "quote", "anchor"])
                        ->htmlTag("div")
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>








