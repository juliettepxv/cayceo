<?php
/** @var \Classiq\Models\Page $vv */
use Classiq\Models\Page;
use Classiq\Models\Project;

$view->inside("layout/layout",$vv);
?>
<div class="pt-big hashtag-page" color-theme="orange">

    <div class="container text-center">
        <?//titre---------------------------------------?>
        <?=$vv->wysiwyg()->field("vars.titre_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->htmlTag("h1")
        ?>
        

        <div class="my-big" bricks>
            <?foreach(Project::projects() as $project):?>
            <div>
                <?=$view->render("records/project.card",$project)?>
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
