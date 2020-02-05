<?php
/** @var Project $vv */
use Classiq\Models\Project;
/** @var \Classiq\Models\Hashtag[] $tags */
$tags=$vv->unbox()->with("ORDER BY order_hashtag")->sharedHashtagList;
?>
<div class="tags" <?=$view->attrRefresh($vv->uid())?>>
    <?foreach ($tags as $tag):?>
        <div><?=$tag->getValue("name_lang")?></div>
    <?endforeach;?>
</div>
