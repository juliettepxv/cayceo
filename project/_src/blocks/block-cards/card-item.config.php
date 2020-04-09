<?php
/**
 * Une image avec différents formats
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 *
 */

//retrouver le block parent (cards)
$fieldNameParent=explode(".",$vv->fieldName);
array_pop($fieldNameParent);
$fieldNameParent=implode(".",$fieldNameParent);
$parent=$vv->record->getValue($fieldNameParent);

//le type de carte qui sera chargé
$cardType=$parent->getData("cardsType",site()->cardsTypeDefault);



?>


<label>Projet</label>
<?=$vv->wysiwyg()->field("page")
    ->recordPicker("page",false)
    ->onSavedRefreshListItem($vv)
    ->buttonRecord()
    ->render()
?>
<?if(in_array($cardType, ["title-text-link-img", "ico-text"])):?>
<label>Image</label>
<?=$vv->wysiwyg()->field("img")
    ->file()
    ->onSavedRefreshListItem($vv)
    ->button()
    ->render()
?>
<?endif;?>




