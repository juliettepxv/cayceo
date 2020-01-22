<nav id="nav">

    <div id="nav-bar" >

        <button data-nav-menu-toggle class="ico-text">
            <span class="ico">
                <?=pov()->svg->use("startup-burger")?>
            </span>
            <span class="text">
                Menu
            </span>
        </button>

        <a class="logo" href="<?=cq()->homePage()->href()?>">logo</a>

        <?=$view->render("./menu-languages")?>

    </div>

    <div id="nav-content">
        <?=$view->render("main-menu/main-menu")?>
        <button data-nav-menu-toggle class="ico-text">
            <span class="text">
                Close
            </span>
            <span class="ico">
                <?=pov()->svg->use("startup-close")?>
            </span>
        </button>

    </div>

</nav>