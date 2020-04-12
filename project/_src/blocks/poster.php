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
            <div <?= $vv->wysiwyg()->attr() ?> scroll-active="">

                <div class="nuage" lottie-loader
                     lottie-url="<?= the()->fileSystem->filesystemToHttp("project/_src/lottie/nuage.json") ?>"
                     lottie-loop="true" lottie-autoplay="true"
                ></div>

            </div>

        </div>
    </div>

</div>






