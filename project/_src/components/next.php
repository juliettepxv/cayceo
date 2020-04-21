<?php
/** @var \Classiq\Models\Project $vv */
use Classiq\Models\Project;

?>

<div ajax-on-scroll="<?=$vv->next()->href()?>"
     ajax-on-scroll-delay="1500">
    <div class="next-one">
        <a href="<?=$vv->next()->href()?>">
            <?=trad("Article suivant")?>
        </a>
    </div>
</div>

