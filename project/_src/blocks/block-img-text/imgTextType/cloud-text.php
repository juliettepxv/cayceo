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
?>


<div class="img-text">
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







