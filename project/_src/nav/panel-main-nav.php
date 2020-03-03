<div panel="main-nav" class="full" id="nav-content">
    <div class="background" lottie-loader="" lottie-url="<?=the()->fileSystem->filesystemToHttp("project/_src/layout/transition.liquid.json")?>"
         lottie-loop="false" lottie-autoplay="false" lottie-preserve-aspect-ratio="none"></div>
    <?=$view->render("main-menu/main-menu")?>
    <button class="close button sz-huge naked square" panel-on="click" panel-action="close" panel-target="main-nav">
        <?=pov()->svg->use("startup-close")?>
    </button>
</div>
