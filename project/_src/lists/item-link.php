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
    <a class="hvr" href="<?=$url?>" target="<?=$targetWindow?>">
        <span class="ico">
            <?if($icone):?>
            <?=pov()->svg->use($icone)->setAttribute("ss","0.1")?>
            <?endif?>
        </span>
        <span class="text underline-hvr"><?=$label?></span>
    </a>
</li>
<? endif?>