<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */
/**
 * Pour configurer une liste de projets
 */
?>

<label>Type de cartes</label>
<?=$vv->wysiwyg()->field("cardsType")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->setDefaultValue(\Classiq\Models\Project::LIST_NAME_PROJETS)
    ->select(site()->cardsTypes);
?>







