<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv ici */
/** @var ListItem $parent Le block cards*/

//retrouver le block parent (cards)
$fieldNameParent=explode(".",$vv->fieldName);
array_pop($fieldNameParent);
$fieldNameParent=implode(".",$fieldNameParent);
$parent=$vv->record->getValue($fieldNameParent);

//le type de carte qui sera chargé
$cardType=$parent->getData("cardsType",site()->cardsTypeDefault);



?>
<div class="col-md-6 card-item-col"  <?=$vv->wysiwyg()->attr()?> >

    <div class="card-item">
        <?=$view->render("blocks/block-cards/cardsType/$cardType")?>
    </div>

</div>