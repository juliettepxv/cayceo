<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 */

?>


<label>Type de block</label>
<?=$vv->wysiwyg()->field("imgTextTypes")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->select([
        "image texte"=>"image-text",
        "nuage texte"=>"cloud-text",
        "citation texte"=>"quote-text",
        "citation"=>"quote",
        "equipe"=>"team",
    ]);
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




<label>Disposition</label>
<?= $vv->wysiwyg()->field("invert")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Inverser")
?>


<label>Couleur de fond</label>
<?=$vv->wysiwyg()->field("bgColor")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->input("text")
?>






