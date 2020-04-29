<?php

use Classiq\Models\JsonModels\ListItem;


$percentage = $vv->getData("percentage", "");
$percent = "";
if ($percentage) {
    $percent = number_format($percentage)/2;
}

?>


<div scroll-active class="percentage-item" <?= $vv->wysiwyg()->attr() ?>>


    <div class="circle-percentage" lottie-loader
         lottie-url="<?= the()->fileSystem->filesystemToHttp("project/_src/lottie/percentage.json") ?>"
         lottie-loop="false" lottie-autoplay="true" lottie-stop-end="<?=$percent?>"
    >
        <div class="text-percentage h1">
            <?=$percentage?>%
        </div>

    </div>


    <?= $vv->wysiwyg()->field("text")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setMediumButtons(["h3", "removeFormat"])
        ->htmlTag("span")
        ->addClass("text")
    ?>

</div>


