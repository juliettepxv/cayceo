<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */
/**
 * Pour configurer une liste de projets
 */
?>

<label>Quelle liste ?</label>
<?=$vv->wysiwyg()->field("listName")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->setDefaultValue(\Classiq\Models\Project::LIST_NAME_PROJETS)
    ->select([
        \Classiq\Models\Project::LIST_NAME_PROJETS,
        \Classiq\Models\Project::LIST_NAME_NEWS,
    ]);
?>







