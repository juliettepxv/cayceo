<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */
/**
 * Pour configurer une liste de projets
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







