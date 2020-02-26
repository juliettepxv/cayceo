<?php
/** @var Project $vv */
use Classiq\Models\Project;
$view->inside("layout/layout",$vv);
?>
<div scroll-active="" is-url="<?=$vv->href()?>"
     title="<?=$vv->urlpage->getValue("meta_title_lang")?>"
     class="pt-big project-page"  color-theme="<?=$vv->colorTheme()?>">

        <?if($vv->isNews()):?>
            <?=$view->render("./project.news.header")?>
        <?else:;?>
            <?=$view->render("./project.project.header")?>
        <?endif;?>

        <?=$vv->wysiwyg()->field("blocks")
            ->listJson(site()->blocksList)
            ->htmlTag()
            ->addClass("blocks");
        ?>

        <?/*
        <div class="bubulles-end" scroll-active="">
            <?=$view->render("bubulles/normal",$vv)?>
        </div>*/?>



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
<?=$view->render("components/next",$vv)?>