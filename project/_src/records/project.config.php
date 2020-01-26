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

    <?if(!$vv->isNews()):?>
        <fieldset>
            <label><?=cq()->tradWysiwyg("Logo client")?></label>
            <?=$vv->wysiwyg()->field("logoclient")
                ->file()
                ->setMimeAcceptImagesOnly()
                //->onSavedRefresh("$(this).closest('[data-pov-v-path]')")
                ->button()->render()
            ?>
        </fieldset>
    <?else:?>

    <?endif?>

</div>