<?php
/**
 * Une image avec différents formats
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 *
 */

?>

<label>Image</label>
<?=$vv->wysiwyg()->field("targetUid")
    ->file()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render()
?>

<label>Disposition</label>
<?= $vv->wysiwyg()->field("invert")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Inverser le sens")
?>








