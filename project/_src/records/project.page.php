<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout",$vv);
?>
<div class="pt-big project-page">
        <div class="container text-center">
            <?//titres---------------------------------------?>
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
                ->addClass("mt-big text-link")
            ?>

            <?//images---------------------------------------?>
            <div class="images mt-big">
                <?=$vv->wysiwyg()
                    ->field("logoclient")
                    ->image()
                    ->contextMenuSize(SIZE_SMALL)
                    ->contextMenuPosition(POSITION_CENTER)
                    ->format()
                    ->bgColor("88ffff")
                    ->displayIfEmpty(true)
                    ->sizeMax(400,200)
                    ->png()
                    ->htmlTag("logoclient", $vv->name,false )?>
                <?=$vv->wysiwyg()
                    ->field("thumbnail")
                    ->image()
                    ->contextMenuSize(SIZE_SMALL)
                    ->contextMenuPosition(POSITION_CENTER)
                    ->format()
                    ->bgColor("eeeeee")
                    ->displayIfEmpty(true)
                    ->sizeMax(1280,600)
                    ->jpg()
                    ->htmlTag("poster", $vv->name,false )?>
            </div>


            <div class="row text-left mt-big">
                <div class="col-md-3 text-link">

                    <div class="tags">
                        <div>Affichage</div>
                        <div>Road show</div>
                        <div>Tournée</div>
                        <div>dispositif 360</div>
                        <div>Affichage</div>
                        <div>Affichage</div>
                    </div>

                    <div class="mt-medium social-shares">
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
                        ->addClass("rich-text")
                    ?>
                </div>
            </div>



        </div>



        <?=$vv->wysiwyg()->field("blocks")
            ->listJson(site()->blocksList)
            ->htmlTag()
            ->addClass("blocks mt-big");
        ?>


        <div class="next-one">
            <a href="<?=$vv->next()->href()?>">
                <?=trad("projet suivant")?>
                <?=$vv->next()->name?>
            </a>
        </div>



    <?/*
    //debug news
    <?
    $liste=\Classiq\Models\Project::getList(\Classiq\Models\Project::LIST_NAME_PROJETS);
    $records=\Classiq\Models\Project::getList(\Classiq\Models\Project::LIST_NAME_PROJETS,true);
    ?>
    <div>
      <?foreach ($records as $r):?>
      <div><?=$r->uid()?></div>
        <?endforeach;?>
    </div>
    */?>


</div>
