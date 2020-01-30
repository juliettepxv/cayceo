<?php
/**
 * Une image avec différents formats
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 *
 */

?>

<label>Projet ou news</label>
<?=$vv->wysiwyg()->field("targetUid")
    ->recordPicker("project",false)
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()
?>
<label>Placer des décorations?</label>
<?=$vv->wysiwyg()->field("decoAfter")
    ->bool()
    ->onSavedRefreshListItem($vv)
    ->checkbox("Après")
?>






