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
<?=$vv->wysiwyg()->field("targetUid")
    ->file()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render()
?>

<label>Format</label>
<?=$vv->wysiwyg()->field("size")
    ->string()
    ->onSavedRefreshListItem($vv)
    ->setDefaultValue("")
    ->select([
            "petit"=>"",
            "grand"=>"big",
    ])

?>













