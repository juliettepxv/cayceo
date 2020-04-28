<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */

$img = $vv->targetUid(true);
if ($img) {
    $image = $img->image()->sizeMax(1200, 800)->jpg()->href();
} else {
    $image = pov()->img("")->sizeMax(1200, 800)->jpg()->href();
}

/** @var \Classiq\Models\Filerecord $poster */
$img2 =$vv->getDataAsRecord("imageOver");


$imgTextTypes = $vv->getData("imgTextTypes", "image-text");

?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> class="block block-regie">
    <div class="container">

        <div class="row regie">
            <div class="col-md-12 col-lg-4 wrap-text"   dss="1.1">
                <div class="info info1" scroll-active="">
                    <div class="rich-text">
                        <?= $vv->wysiwyg()
                            ->field("texte_lang")
                            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                            ->setPlaceholder("Saisissez votre texte")
                            ->setMediumButtons(["h3"])
                            ->htmlTag("div")
                        ?>
                    </div>
                    <div class="button-line">
                    </div>
                </div>

                <div class="info info2" scroll-active="">
                    <div class="rich-text">
                        <?= $vv->wysiwyg()
                            ->field("texte2_lang")
                            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                            ->setPlaceholder("Saisissez votre texte")
                            ->setMediumButtons(["h3"])
                            ->htmlTag("div")
                        ?>
                    </div>
                    <div class="button-line">
                    </div>
                </div>
                <div class="info info3" scroll-active="">
                    <div class="rich-text">
                        <?= $vv->wysiwyg()
                            ->field("texte3_lang")
                            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                            ->setPlaceholder("Saisissez votre texte")
                            ->setMediumButtons(["h3"])
                            ->htmlTag("div")
                        ?>
                    </div>
                    <div class="button-line">
                    </div>
                </div>
                <div class="info info4" scroll-active="">
                    <div class="rich-text">
                        <?= $vv->wysiwyg()
                            ->field("texte4_lang")
                            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                            ->setPlaceholder("Saisissez votre texte")
                            ->setMediumButtons(["h3"])
                            ->htmlTag("div")
                        ?>
                    </div>
                    <div class="button-line">
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-8" dss="1.1">
                <div class="wrap-img">
                    <? if ($img && $img->isImage()): ?>

                        <div class="nuage" lottie-loader
                             lottie-url="<?= the()->fileSystem->filesystemToHttp("project/_src/lottie/nuage.json") ?>"
                             lottie-img="<?= $image ?>"
                             lottie-loop="true" lottie-autoplay="true"
                        ></div>

                    <? elseif (\Classiq\Wysiwyg\Wysiwyg::$enabled): ?>
                        <div id="cq-style">
                            <div text-center class="cq-box cq-th-danger">
                                Il faut choisir une image
                            </div>
                        </div>
                    <? endif ?>

                    <div class="regie">
                        <?if($img2):?>
                            <?= $img2->image()
                                ->width(800)
                                ->png()
                                ->htmlTag()
                            ?>
                        <?endif?>
                    </div>


                </div>

            </div>
        </div>

    </div>
</div>






