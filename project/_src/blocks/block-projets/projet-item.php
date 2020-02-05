<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);

?>
<?if($projet || cq()->wysiwyg()):?>
    <div <?=$vv->wysiwyg()->attr()?>  >
        <?=$view->render("records/project.card",$projet)?>
        <?if($vv->getData("decoAfter")):?>
            <?=$view->render("bubulles/normal")?>
        <?endif?>
    </div>
<?endif?>