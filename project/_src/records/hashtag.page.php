<?php
/** @var Hashtag $vv */
use Classiq\Models\Hashtag;
$view->inside("layout/layout",$vv);
?>
<div class="pt-big project-page" color-theme="sunrise">

    <div class="container text-center">
        <?//titre---------------------------------------?>
        <?=$vv->wysiwyg()
            ->field("name_lang")
            ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_SINGLE_LINE)
            ->setDefaultValue($vv->name)
            ->setPlaceholder("Nom du tag traduit ($vv->name)")
            //->setDefaultValue($vv->name)
            ->htmlTag("h1")
        ?>
        <div class="my-big" bricks>
            <?foreach($vv->unbox()->with("ORDER BY order_project")->sharedProjectList as $project):?>
            <div>
                <?=$view->render("records/project.card",$project)?>
                <?=$view->render("bubulles/normal")?>
            </div>
            <?endforeach?>
        </div>
        <div class="row justify-content-center my-big">
            <div class="col-lg-4">
                <?=$view->render("bubulles/normal")?>
            </div>
        </div>


    </div>

</div>
