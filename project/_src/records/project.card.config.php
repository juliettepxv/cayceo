<?php
/**
 * Un projet
 * @var Classiq\Models\Project $vv
 */

?>

<label>Image de preview</label>
<?=$vv->wysiwyg()->field("imagepreview")
    ->recordPicker("filerecord",false)
    ->onlyFiles()
    ->setMimeAcceptImagesOnly()
    ->onSavedRefreshRecord($vv)
    ->buttonRecord()
    ->render()

?>
<label>Video de preview</label>
<?=$vv->wysiwyg()->field("videopreview")
    ->recordPicker("filerecord",false)
    ->onlyFiles()
    ->setMimeAcceptVideoOnly()
    ->onSavedRefreshRecord($vv)
    ->buttonRecord()
    ->render()
?>







