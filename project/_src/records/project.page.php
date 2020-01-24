<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout",$vv);
?>
<div class="py-big">

        <div class="container text-center">


            <?=$vv->wysiwyg()
                ->field("titre_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                ->setMediumButtons(["bold","removeFormat"])
                ->setPlaceholder("Titre ici")
                //->setDefaultValue($vv->name)
                ->htmlTag("h1")

            ?>

            <?=$vv->wysiwyg()
                ->field("sstitre_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_SINGLE_LINE)
                //->setDefaultValue($vv->name)
                ->setPlaceholder("Sous titre là")
                ->htmlTag("h2")
                ->addClass("mt-big text-link")
            ?>

            <div class="images mt-big">

            </div>


            <div class="row text-left">
                <div class="col-md-3 text-link">

                    <div class="tags">
                        <div>Affichage</div>
                        <div>Road show</div>
                        <div>Tournée</div>
                        <div>dispositif 360</div>
                        <div>Affichage</div>
                        <div>Affichage</div>
                    </div>

                    <div class="mt-medium">
                        <?=$view->render("components/social-shares")?>
                    </div>

                </div>

                <div class="col-md-9">
                    <?=$vv->wysiwyg()
                        ->field("texte_lang")
                        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                        //->setDefaultValue($vv->name)
                        ->setPlaceholder("Descriptif du projet")
                        ->htmlTag("div")
                    ?>
                </div>
            </div>



        </div>



        <?=$vv->wysiwyg()->field("blocks")
            ->listJson(site()->blocksList)
            ->htmlTag()
            ->addClass("blocks mt-big");
        ?>





</div>
