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
<label>Aligner</label>
<?= $vv->wysiwyg()->field("align")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->select(["left","center"])
?>