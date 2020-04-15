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
    ->select(["left", "center"])
?>

    <label>Type de block</label>
<?= $vv->wysiwyg()->field("textTypes")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->select([
        "une colonne" => "text",
        "deux colonnes" => "text-text"]);
?>