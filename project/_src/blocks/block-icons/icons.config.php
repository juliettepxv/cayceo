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
    ->setDefaultValue("icon-inline")
    ->select([
        "une ligne"=>"icon-inline",
        "liste"=>"icon-list"
    ]);
?>



