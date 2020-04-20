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

<label>Choisir une seconde image</label>
<?= $vv->wysiwyg()->field("imageOver")
    ->file()
    ->setMimeAcceptImagesOnly()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render();
?>




