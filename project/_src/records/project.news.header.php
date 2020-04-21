<?php
/** @var \Classiq\Models\Project $vv */

use Classiq\Models\Project;

$img = $vv->thumbnail(true);
?>

<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <div class="images my-medium">
                <? if ($img || $vv->video()): ?>
                    <div class="poster-wrap format-<?= $vv->getValue("vars.formatVideo", "16by9") ?>" zzzpllx-container>
                        <?= $vv->wysiwyg()
                            ->field("thumbnail")
                            ->image()
                            ->contextMenuSize(SIZE_SMALL)
                            ->contextMenuPosition(POSITION_CENTER)
                            ->format()
                            ->bgColor("eeeeee")
                            ->displayIfEmpty(cq()->wysiwyg())  //afficher vide que si admin
                            ->sizeMax(1800, 1800)
                            ->jpg()
                            ->htmlTag("poster", $vv->name, true)
                        ?>
                        <? if ($vv->video()): ?>
                            <video scroll-active=""
                                   src="<?= $vv->video()->httpPath() ?>"
                                   poster="<?= $vv->thumbnail()->bgColor("eeeeee")->sizeMax(1800, 1800)->jpg()->href() ?>"
                                   controls="controls"
                                   autoplay-desktop="1"
                                   onlyoneplaying preload="none"></video>

                        <? endif; ?>

                    </div>
                <? endif ?>
            </div>
        </div>
        <div class="col-xl-2 text-left ">
           <div class="text-link mb-small">
                <?=$vv->newsDate("d F Y")?>
            </div>
            <div class="social-shares mb-small">
                <?= $view->render("components/social-shares") ?>
            </div>
        </div>
        <div class="col-xl-8">
            <?= $vv->wysiwyg()
                ->field("titre_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                ->setMediumButtons(["bold", "removeFormat"])
                ->setPlaceholder("Titre ici ($vv->name)")
                //->setDefaultValue($vv->name)
                ->htmlTag("h1")
            ?>
            <?= $vv->wysiwyg()
                ->field("sstitre_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_SINGLE_LINE)
                //->setDefaultValue($vv->name)
                ->setPlaceholder("Sous titre là")
                ->htmlTag("h3")
                ->addClass("mt-medium")
            ?>
        </div>
        <div class="col-xl-2">

        </div>

    </div>

</div>

