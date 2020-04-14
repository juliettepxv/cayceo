<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */

?>
<label>Choisir une image</label>
<?= $vv->wysiwyg()->field("targetUid")
    ->file()
    ->setMimeAcceptImagesOnly()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render();
?>

<label>Projet</label>
<?=$vv->wysiwyg()->field("page")
    ->recordPicker("page",false)
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()
?>
