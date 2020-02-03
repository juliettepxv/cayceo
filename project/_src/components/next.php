<?php
/** @var \Classiq\Models\Project $vv */
use Classiq\Models\Project;

?>
<div class="next-one">
    <a href="<?=$vv->next()->href()?>">
        <?if($vv->isNews()):?>
            <?=trad("news suivante")?>
        <?else:?>
            <?=trad("projet suivant")?>
        <?endif;?>
    </a>
</div>