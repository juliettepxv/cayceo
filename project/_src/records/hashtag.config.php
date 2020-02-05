<?php
/** @var \Classiq\Models\Hashtag $vv */
?>
<div class="cq-box">

    <fieldset>
        <label>Projets</label>
        <?=$vv->wysiwyg()
            ->field("sharedProjectList")
            ->recordPicker("Project",true)
            ->onSavedRefreshRecord($vv)
            ->buttonRecord()
            ->render()
        ?>
    </fieldset>

</div>
