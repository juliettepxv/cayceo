<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */

?>
<label>Couleur</label>
<?= $vv->wysiwyg()->field("color")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->select(["orange","blue","sunrise"])
?>
<?=$vv->wysiwyg()->field("colorInvert")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Couleurs inversées")
?>

<label>Aligner</label>
<?= $vv->wysiwyg()->field("align")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->select(["left","center"])
?>
