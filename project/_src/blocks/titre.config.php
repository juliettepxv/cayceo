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
    ->select(["orange","blue","sunrise"])
?>
