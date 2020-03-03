<?php
/** @var Project $vv */
use Classiq\Models\Project;
$view->inside("layout/layout",$vv);
?>
<div scroll-active="" is-url="<?=$vv->href()?>"
     title="<?=utils()->string->forAttributes($vv->urlpage->getValue("meta_title_lang"))?>"
     class="pt-big project-page" >

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
</div>
<?=$view->render("components/next",$vv)?>