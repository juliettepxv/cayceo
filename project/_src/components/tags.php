<?php
/** @var Project $vv */
use Classiq\Models\Project;
/** @var \Classiq\Models\Hashtag[] $tags */
$tags=$vv->unbox()->with("ORDER BY order_hashtag")->sharedHashtagList;
$ss=-count($tags)/2*0.1;
?>

<div  class="tags" <?=$view->attrRefresh($vv->uid())?>>
    <?foreach ($tags as $tag):?>
        <a class="underline-hvr" href="<?=$tag->href()?>" <?/*ss="<?=$ss+=0.1?>"*/?>>
            <?=$tag->getValue("name_lang")?>
        </a>
    <?endforeach;?>
</div>
