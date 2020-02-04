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
<label>Image</label>
<?=$vv->wysiwyg()->field("image")
    ->recordPicker("filerecord",false)
    ->onlyFiles()
    ->setMimeAcceptImagesOnly()
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()

?>
<label>video</label>
<?=$vv->wysiwyg()->field("video")
    ->recordPicker("filerecord",false)
    ->onlyFiles()
    ->setMimeAcceptVideoOnly()
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()

?>

<h4>Esthétique</h4>
<label>Placer des bubulle?</label>
<?=$vv->wysiwyg()->field("decoAfter")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Après")
?>






