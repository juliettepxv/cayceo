<?php
/**
 * @var \Classiq\Models\JsonModels\ListItem $vv
 */

$label=$vv->getData("label_lang");
$url=$vv->getData("url");
$icone=$vv->getData("icone");
$targetWindow=$vv->getData("targetWindow");
$targetWindow=$targetWindow?"_blank":"_self";

if(!$label){
   $label="...";
}

?>
<? if(cq()->wysiwyg() || $url ):?>
<li class="item-link" <?=$vv->wysiwyg()->openConfigOnCreate()->attr()?>>
    <a class="" href="<?=$url?>" target="<?=$targetWindow?>">
        <span class="ico">
            <?if($icone):?>
            <?=pov()->svg->use($icone)?>
            <?endif?>
        </span>
        <span class="text"><?=$label?></span>
    </a>
</li>
<? endif?>