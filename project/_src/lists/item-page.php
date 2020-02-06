<?php
/**
 * @var \Classiq\Models\JsonModels\ListItem $vv
 */
$vv->wysiwyg()->openConfigOnCreate();
/** @var \Classiq\Models\Page $page */
$page=$vv->targetUid(true);
$label=$vv->getData("label_lang",$page->name_lang);
?>
<?if($page):?>
    <li <?=$vv->wysiwyg()->attr()?>>
        <a  class="underline-hvr" data-href-uid="<?=$page->uid()?>"  href="<?=$page->href()?>"><?=$label?></a>
    </li>
<?endif?>