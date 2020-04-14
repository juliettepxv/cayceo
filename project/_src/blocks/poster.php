<?php
/**
 *
 * @var Classiq\Models\JsonModels\ListItem $vv
 *
 *
 */
/** @var \Classiq\Models\Filerecord $img */
$img = $vv->targetUid(true);
if($img){
    $image=$img->image()->sizeMax(1200,800)->jpg()->href();
}else{
    $image=pov()->img("")->sizeMax(1200,800)->jpg()->href();
}

?>
<div <?= $vv->wysiwyg()->openConfigOnCreate()->attr() ?> scroll-active="" class="block block-poster">

    <div class="poster">

        <div class="container">
            <div class="img-wrap">
                <div <?= $vv->wysiwyg()->attr() ?> scroll-active="">

                    <div class="nuage" lottie-loader
                         lottie-url="<?=the()->fileSystem->filesystemToHttp("project/_src/lottie/nuage.json") ?>"
                         lottie-img="<?=$image?>"
                         lottie-loop="true" lottie-autoplay="true"
                    ></div>

                </div>
            </div>

            <div class="text-wrap">
                <div class="rich-text">
                    <?= $vv->wysiwyg()
                        ->field("texte_lang")
                        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
                        ->setPlaceholder("Saisissez votre texte")
                        ->setMediumButtons(["h1", "h3", "anchor"])
                        ->htmlTag("div")
                    ?>
                </div>
            </div>


        </div>
    </div>

</div>






