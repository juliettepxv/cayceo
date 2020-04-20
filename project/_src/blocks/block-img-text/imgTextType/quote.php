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


    <div class="img-text wrap-quote">
        <div class="row">
            <div class="col-lg-6" dss="1.1">
                <div>
                    <?= $vv->wysiwyg()
                        ->field("quote_lang")
                        ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_MULTI_LINE)
                        ->setPlaceholder("Saisissez votre texte")
                        ->htmlTag("div")
                        ->addClass("quote")
                    ?>
                </div>
            </div>
            <div class="col-lg-6" dss="1.1">
                <? if ($img && $img->isImage()): ?>

                    <div class="citator-wrap mt-small">
                        <?= $img->image()
                            ->width(800)
                            ->jpg()
                            ->htmlTag()
                            ->addClass("img-responsive")
                            ->setAttribute("dom-copy", 'img')
                        ?>
                        <?= $vv->wysiwyg()
                            ->field("citator_lang")
                            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                            ->setPlaceholder("Saisissez votre texte")
                            ->setMediumButtons(["h3", "anchor"])
                            ->htmlTag("div")
                            ->addClass("citator")
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
        </div>
    </div>








