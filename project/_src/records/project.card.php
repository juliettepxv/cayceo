<?php
/** @var Project $vv */

use Classiq\Models\Project;

/** @var \Classiq\Models\Filerecord $logo */
$logo = $vv->getValueAsRecord("logopreview");
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->getValueAsRecord("imagepreview");
/** @var \Classiq\Models\Filerecord $video */
$video = $vv->getValueAsRecord("videopreview");
/** @var String $defaultText */
$defaultText = "...";

if (!$img) {
    $img = $vv->thumbnail(true);
}
//$logo=$vv->logoClient(true);
if ($vv->isNews()) {
    $logo = null;
}

//texte par défaut
$defaultText = $vv->name; //name
if ($vv->titre_lang) {
    $defaultText = strip_tags($vv->titre_lang); //
}

$attrs = new \Pov\Html\Trace\Attributes();
if (!cq()->wysiwyg()) {
    $attrs["href"] = $vv->href();
}
if ($video) {
    $attrs["video-thumbnail"] = true;
}
$attrs["ss"] = round(rand(10, 50) / 100, 1);
?>
<div class="project-card" scroll-active="" <?= $attrs ?> <?= $view->attrRefresh($vv->uid()) ?>>


    <div class="thumb">
        <? if ($img): ?>
            <img alt=""
                 src="<?= $img->image()->sizeMax(600, 400)->jpg()->href() ?>"
                 width="<?= $img->image_width ?>" height="<?= $img->image_height ?>">
            <? if ($video): ?>
                <video src="<?= $video->httpPath() ?>" class="thumb video"
                       scroll-active="" autoplay="autoplay" muted="muted"
                       loop="loop" preload="none"
                ></video>
            <? endif; ?>

        <? endif; ?>
    </div>


    <div class="texts">
        <?= $vv->wysiwyg()
            ->field("textpreview_lang")
            ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_SINGLE_LINE)
            ->setDefaultValue($defaultText)
            ->htmlTag("h2")
        ?>
        <?=$vv->newsDate("d F Y")?>
        <a class="button sz-normal mt-small" href="<?= $vv->href() ?>">
            Découvrir
        </a>
        <? /*=$view->render("components/tags")*/ ?>
    </div>


</div>