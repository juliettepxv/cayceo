<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */
/**
 * Pour configurer une liste de projets
 */
?>

<label>Style de composition</label>
<?=$vv->wysiwyg()->field("styleType")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->setDefaultValue("percentage-circle-item")
    ->select([
        "Cercle"=>"percentage-circle-item"
    ]);
?>

<label>Fond</label>
<?= $vv->wysiwyg()->field("bgColor")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Fond en couleur")
?>



