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
<?= $vv->wysiwyg()->field("targetUid")
    ->file()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render()
?>
<br>

<label>Disposition</label>
<?= $vv->wysiwyg()->field("invert")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Inverser le sens")
?>
<br>


<label>Url de la page</label>
<?= $vv->wysiwyg()->field("url")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->input("url", "http://etc...")
?>


<?= $vv->wysiwyg()->field("targetWindow")->bool()->checkbox("Ouvrir dans une nouvelle fenêtre") ?>






