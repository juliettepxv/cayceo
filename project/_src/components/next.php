<?php
/** @var \Classiq\Models\Project $vv */
use Classiq\Models\Project;
?>
<div class="next-one">
    <a href="<?=$vv->next()->href()?>">
        <?=trad("projet suivant")?>
    </a>
</div>