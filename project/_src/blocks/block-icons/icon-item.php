<?php

use Classiq\Models\JsonModels\ListItem;

/** @var ListItem $vv */


/** @var ListItem $vv */
$imgTag = "";
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
if ($img && $img->isImage()) {
    $imgTag = $img->image()->sizeMax(300, 300)->png()->htmlTag();
} else {
    $imgTag = pov()
        ->img("")
        ->bgColor("EEEEEE")
        ->displayIfEmpty(true)
        ->sizeMax(300, 300)
        ->png()->htmlTag();
}


$invert = $vv->getData("invert") ? "invert" : "";

$url = $vv->getData("url");
$targetWindow = $vv->getData("targetWindow");
$targetWindow = $targetWindow ? "_blank" : "_self";

?>

<? if ($url): ?>
<a scroll-active class="icon-item <?= $invert ?>" <?= $vv->wysiwyg()->attr() ?> href="<?= $url ?>"
   target="<?= $targetWindow ?>">
    <? else: ?>
    <div scroll-active class="icon-item <?= $invert ?>" <?= $vv->wysiwyg()->attr() ?>>
        <? endif; ?>
        <span class="img">
        <?= $imgTag ?>
    </span>

        <?= $vv->wysiwyg()->field("text")
            ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
            ->setMediumButtons(["h3", "removeFormat"])
            ->htmlTag("span")
            ->addClass("text")
        ?>
        <? if ($url): ?>
</a>
<? else: ?>
    </div>
<? endif; ?>


