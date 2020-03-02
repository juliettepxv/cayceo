<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */

?>
<label>Aligner</label>
<?= $vv->wysiwyg()->field("align")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->select(["left","center"])
?>
