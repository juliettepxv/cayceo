<?php
/**
 * Une image avec différents formats
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 *
 */

?>

<label>Projet</label>
<?=$vv->wysiwyg()->field("targetUid")
    ->recordPicker("project",false)
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()
?>

<label>Media?</label>
<?=$vv->wysiwyg()->field("media")
    ->recordPicker("filerecord",false)
    ->onlyFiles()
    ->buttonRecord()
    ->render()

?>

<h4>Esthétique</h4>
<label>Placer des décorations?</label>
<?=$vv->wysiwyg()->field("decoAfter")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Après")
?>






