<?php
/** @var array $vv */
$view->inside("emails/mail-layout");
?>
<div style="font-weight: bold; font-size: 16px;text-align: center; padding-bottom: 20px;">
    <?=$vv["title"]?>
</div>
<div style="font-weight: normal; font-size: 14px;text-align: left;line-height: 1.7">
    <?=$vv["text"]?>
</div>
