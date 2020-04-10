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

<label>Choisir un logo</label>
<?= $vv->wysiwyg()->field("logo")
    ->file()
    ->setMimeAcceptImagesOnly()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render();
?>

<label>Disposition</label>
<?= $vv->wysiwyg()->field("invert")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Image à droite")
?>

<label>Monogramme</label>
<?= $vv->wysiwyg()->field("monogramme")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Monogramme")
?>
