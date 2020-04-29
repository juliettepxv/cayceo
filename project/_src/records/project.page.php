<?php
/** @var Project $vv */

use Classiq\Models\Project;

$view->inside("layout/layout", $vv);

$urlExterne = $vv->getValue("urlexterne");


?>
    <div scroll-active="" is-url="<?= $vv->href() ?>"
         title="<?= utils()->string->forAttributes($vv->urlpage->getValue("meta_title_lang")) ?>"
         class=" project-page">

            <?= $view->render("./project.news.header") ?>


        <?= $vv->wysiwyg()->field("blocks")
            ->listJson(site()->blocksList)
            ->htmlTag()
            ->addClass("blocks mt-medium");
        ?>
        <div class="wrap-button">
            <? if ($urlExterne): ?>
                <a href="<?=$urlExterne?>" target="_blank" class="button sz-big">

                    <?=pov()->svg->use("startup-arrow-right")?>
                    <?=trad("Voir l'article sur le site")?>
                </a>
            <? endif; ?>
        </div>



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