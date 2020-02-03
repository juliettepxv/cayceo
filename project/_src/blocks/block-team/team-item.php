<?php
use Classiq\Models\JsonModels\ListItem;
/** @var ListItem $vv */


/** @var ListItem $vv */
$imgTag="";
/** @var \Classiq\Models\Filerecord $img */
$img=$vv->targetUid(true);
if($img && $img->isImage()){
    $imgTag=$img->image() ->sizeMax(300,300)->png()->htmlTag();
}else{
    $imgTag=pov()
        ->img("")
        ->bgColor("EEEEEE")
        ->displayIfEmpty(true)
        ->sizeMax(300,300)
        ->png()->htmlTag();
}

?>
<div class="team-item" <?=$vv->wysiwyg()->attr()?> >


    <?=$imgTag?>

    <?=$vv->wysiwyg()->field("text")
    ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
    ->setMediumButtons(["bold","removeFormat"])
    ->htmlTag("div");
    ?>

</div>


