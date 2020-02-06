<?php
/** @var Project $vv */
use Classiq\Models\Project;
/** @var \Classiq\Models\Hashtag[] $tags */
$tags=$vv->unbox()->with("ORDER BY order_hashtag")->sharedHashtagList;
$ss=0;
?>
<div  class="tags" <?=$view->attrRefresh($vv->uid())?>>
    <?foreach ($tags as $tag):?>
        <div ss="<?=$ss+=0.1?>"><?=$tag->getValue("name_lang")?></div>
    <?endforeach;?>
</div>
