<?php
/** @var array $vv */
$view->inside("emails/mail-layout");
?>
<div style="color: #5C4675;font-weight: bold; font-size: 16px;text-align: center; padding-bottom: 20px;">
    <?=$vv["title"]?>
</div>
<div style="color: #594F65;font-weight: normal; font-size: 14px;text-align: left;line-height: 1.7">
    <?=$vv["text"]?>
</div>
