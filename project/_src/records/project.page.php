<?php
/** @var Project $vv */

use Classiq\Models\Project;

$view->inside("layout/layout", $vv);
?>
    <div scroll-active="" is-url="<?= $vv->href() ?>"
         title="<?= utils()->string->forAttributes($vv->urlpage->getValue("meta_title_lang")) ?>"
         class=" project-page">

            <?= $view->render("./project.news.header") ?>


        <?= $vv->wysiwyg()->field("blocks")
            ->listJson(site()->blocksList)
            ->htmlTag()
            ->addClass("blocks");
        ?>


        <? /*
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
    */ ?>
    </div>
<?= $view->render("components/next", $vv) ?>