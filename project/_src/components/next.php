<?php
/** @var \Classiq\Models\Project $vv */
use Classiq\Models\Project;

?>

<div ajax-on-scroll="<?=$vv->next()->href()?>"
     ajax-on-scroll-delay="1500">
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

