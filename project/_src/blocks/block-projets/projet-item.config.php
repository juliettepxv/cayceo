<?php
/**
 * Une image avec différents formats
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 *
 */
$project=$vv->targetUid(true);
?>

<label>Projet</label>
<?=$vv->wysiwyg()->field("targetUid")
    ->recordPicker("project",false)
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()
?>

<?if($project):?>
<?=$view->render("records/project.card.config",$project)?>
<?endif?>


<h4>Esthétique</h4>
<label>Placer des bubulle?</label>
<?=$vv->wysiwyg()->field("decoAfter")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Après")
?>






