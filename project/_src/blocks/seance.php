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

$invert=$vv->getData("invert")?"invert":"";
$imgTextTypes=$vv->getData("imgTextTypes","image-text");
?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-seance <?=$invert?>">
    <div class="container">

        <div class="wrap-seance">
            <div class="row">
                <div class="col-lg-6" dss="1.1">
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
                </div>

                <div class="col-lg-6 wrap-text" dss="1.1">
                    <?=$vv->wysiwyg()
                        ->field("seance_lang")
                        ->string()->setPlaceholder("Seance")
                        ->htmlTag("h3")
                        ->addClass("title-seance")
                    ?>

                    <div>
                        <?=$vv->wysiwyg()
                            ->field("titre_lang")
                            ->string()->setPlaceholder("Titre")
                            ->htmlTag("h2")
                            ->addClass("title")
                        ?>
                        <div class="rich-text">
                            <?= $vv->wysiwyg()
                                ->field("texte_lang")
                                ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_MULTI_LINE)
                                ->setPlaceholder("Saisissez votre texte")
                                ->htmlTag("div")
                            ?>
                        </div>
                    </div>

                    <div class="">
                        <h2 class="button sz-small">
                            aperçu
                        </h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






