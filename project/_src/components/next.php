<?php
/** @var \Classiq\Models\Project $vv */
use Classiq\Models\Project;

?>

<div scroll-active="" ajax-on-scroll="<?=$vv->next()->href()?>?povHistory=true">
    <div class="next-one">
        <a href="<?=$vv->next()->href()?>">
            <?if($vv->isNews()):?>
                <?=trad("news suivante")?>
            <?else:?>
                <?=trad("projet suivant")?>
            <?endif;?>
        </a>
    </div>
</div>