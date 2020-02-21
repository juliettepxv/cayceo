<nav id="nav">

    <div id="nav-bar" >

        <button nav-menu-click='toggle' class="ico-text">
            <span class="ico">
                <?=pov()->svg->use("startup-burger")?>
            </span>
            <span class="text d-none d-md-flex">
                Menu
            </span>
        </button>
        <div class="bubulles" lottie-loader
             lottie-url="<?=the()->fileSystem->filesystemToHttp("project/_src/bubulles/lottie/bubulle-sunrise-4.json")?>"
             lottie-loop="true" lottie-autoplay="true"
        ></div>
        <a class="logo" href="<?=cq()->homePage()->href()?>">
            <span class="w"></span>
        </a>

        <?=$view->render("./menu-languages")?>

    </div>

    <div id="nav-content">
        <div class="background"></div>
        <?=$view->render("main-menu/main-menu")?>
        <button nav-menu-click='toggle' class="ico-text">
            <span class="text">
                Close
            </span>
            <span class="ico">
                <?=pov()->svg->use("startup-close")?>
            </span>
        </button>

    </div>

</nav>