<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */

/** @var \Classiq\Models\Project $projet */
$projet=$vv->targetUid(true);

?>
<?if($projet):?>
    <div <?=$vv->wysiwyg()->attr()?> class="item-card">
        <?=$view->render("records/project.card",$projet)?>
    </div>
<?endif?>