<?php
/** @var Project $vv */
use Classiq\Models\Project;
$view->inside("layout/layout",$vv);
?>
<div class="pt-big project-page" color-theme="<?=$vv->colorTheme()?>">

        <?if($vv->isNews()):?>
            <?=$view->render("./project.news.header")?>
        <?else:;?>
            <?=$view->render("./project.project.header")?>
        <?endif;?>



        <?=$vv->wysiwyg()->field("blocks")
            ->listJson(site()->blocksList)
            ->htmlTag()
            ->addClass("blocks mt-big");
        ?>

        <div class="bubulles-end">
            <?=$view->render("bubulles/normal",$vv)?>
        </div>


        <?=$view->render("components/next",$vv)?>





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
