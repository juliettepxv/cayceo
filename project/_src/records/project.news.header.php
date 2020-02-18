<?php
/** @var \Classiq\Models\Project $vv */
use Classiq\Models\Project;
?>
<div class="container text-center">
    <div class="row">
        <div class="col-md-2 text-left ">
            <div class="text-link mb-small">
                <?=$vv->newsDate("d F Y")?>
            </div>
            <div class="social-shares">
                <?=$view->render("components/social-shares")?>
            </div>
        </div>
        <div class="col-md-8">
            <?=$vv->wysiwyg()
                ->field("titre_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                ->setMediumButtons(["bold","removeFormat"])
                ->setPlaceholder("Titre ici ($vv->name)")
                //->setDefaultValue($vv->name)
                ->htmlTag("h1")
            ?>
            <?=$vv->wysiwyg()
                ->field("sstitre_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_SINGLE_LINE)
                //->setDefaultValue($vv->name)
                ->setPlaceholder("Sous titre là")
                ->htmlTag("h2")
                ->addClass("mt-small text-link")
            ?>
        </div>
        <div class="col-md-2">

        </div>

    </div>

</div>

