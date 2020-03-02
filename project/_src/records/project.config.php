<?php
/** @var \Classiq\Models\Project $vv */
?>
<div class="cq-box">
    <fieldset>
        <label>Type</label>
        <?=$vv->wysiwyg()->field("kind")->string()
        ->select([
            "projet",
            "news"
        ])?>
    </fieldset>
    <fieldset>
        <label>hashtags</label>
        <?=$vv->wysiwyg()
            ->field("sharedHashtagList")
            ->recordPicker("Hashtag",true)
            ->onSavedRefresh('$("[data-pov-v-path=\'components/tags\']")')
            ->buttonRecord()
            ->render()
        ?>
    </fieldset>
    <fieldset>
        <label>Titre</label>
        <?foreach (the()->project->languages as $lang):?>
            <?=$vv->wysiwyg()->field("titre_$lang")
                ->string()
                ->input("text",$lang)
                ->setAttribute("data-lang",$lang)
            ?>
        <?endforeach;?>
        <label>Sous titre</label>
        <?foreach (the()->project->languages as $lang):?>
            <?=$vv->wysiwyg()->field("sstitre_$lang")
                ->string()
                ->input("text",$lang)
                ->setAttribute("data-lang",$lang)
            ?>
        <?endforeach;?>
    </fieldset>


    <fieldset>
        <label><?=cq()->tradWysiwyg("Logo client")?></label>
        <?=$vv->wysiwyg()->field("logoclient")
            ->file()
            ->setMimeAcceptImagesOnly()
            //->onSavedRefresh("$(this).closest('[data-pov-v-path]')")
            ->button()->render()
        ?>
    </fieldset>

    <?if($vv->isNews()):?>
        <fieldset>
            <label><?=cq()->tradWysiwyg("Date de la news")?></label>
            <?=$vv->wysiwyg()->field("newsdate")
                ->string()
                ->input("date")
            ?>
        </fieldset>
    <?endif?>

    <fieldset>
        <label><?=cq()->tradWysiwyg("Video principale")?></label>
        <?=$vv->wysiwyg()->field("video")
            ->recordPicker("filerecord",false)
            ->onlyFiles()
            ->setMimeAcceptVideoOnly()
            ->onSavedRefreshRecord($vv)
            ->buttonRecord()
            ->render()
        ?>
    </fieldset>


</div>

<h4>Preview</h4>

<div class="cq-box">
    <?=$view->render("records/project.card.config")?>
</div>
