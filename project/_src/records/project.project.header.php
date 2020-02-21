<?php
/** @var Project $vv */
use Classiq\Models\Project;
$img=$vv->thumbnail(true);
?>

<div scroll-active="" class="container text-center project-header" <?=$view->attrRefresh($vv->uid())?>>
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
        ->addClass("text-link")
    ?>

    <?//images---------------------------------------?>
    <div class="images mt-medium">
        <?if($img || cq()->isAdmin()): //logo uniquement si image aussi ou bien admin?>

            <div class="logoclient" ss="0.1">
            <?=$vv->wysiwyg()
                ->field("logoclient")
                ->image()
                ->contextMenuSize(SIZE_SMALL)
                ->contextMenuPosition(POSITION_CENTER)
                ->format()
                ->bgColor("cccccc")
                ->displayIfEmpty(cq()->wysiwyg()) //afficher vide que si admin
                ->sizeMax(400,400)
                ->png()
                ->htmlTag("", $vv->name,false )
                ?>
            </div>

        <?endif?>

        <div class="poster-wrap" zzzpllx-container>
            <?=$vv->wysiwyg()
                ->field("thumbnail")
                ->image()
                ->contextMenuSize(SIZE_SMALL)
                ->contextMenuPosition(POSITION_CENTER)
                ->format()
                ->bgColor("eeeeee")
                ->displayIfEmpty(cq()->wysiwyg())  //afficher vide que si admin
                ->sizeMax(1800,1800)
                ->jpg()
                ->htmlTag("poster", $vv->name,true )
            ?>
            <?if($vv->video()):?>
                <video scroll-active=""
                       src="<?=$vv->video()->httpPath()?>"
                       poster="<?=$vv->thumbnail()->bgColor("eeeeee")->sizeMax(1800,1800)->jpg()->href()?>"
                       controls="controls" autoplay="autoplay" preload="none"></video>
            <?endif;?>

        </div>



        <?if($img):?>
            <div class="bubulles-header d-none d-lg-block">
                <?=$view->render("bubulles/normal",$vv)?>
            </div>
        <?endif?>

    </div>




    <div class="row text-left mt-medium">
        <div class="col-md-3 text-link">
            <?=$view->render("components/tags")?>
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
                ->addClass("rich-text fg-grey")
            ?>
        </div>
    </div>

</div>