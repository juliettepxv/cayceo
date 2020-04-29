<?php
/**
 * Une image avec différents formats
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 *
 */

?>



<label>Pourcentage</label>
<?=$vv->wysiwyg()->field("percentage")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->input("text")
?>






