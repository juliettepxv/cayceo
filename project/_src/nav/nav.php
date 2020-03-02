<nav id="nav">

    <div id="nav-bar" >

        <div class="a">
            <button nav-menu-click='toggle' class="ico">
                <span class="icon">
                    <?=pov()->svg->use("startup-burger")?>
                </span>
            </button>
        </div>

        <div class="b">
            <a class="logo" href="<?=cq()->homePage()->href()?>">
                Harmada hndplns
            </a>
        </div>

        <div class="c">
            <?=$view->render("./menu-languages")?>
            <a class="ico-text"
               panel-on="click" panel-action="toggle" panel-target="basket"
               href="#">
                <?=trad("btn panier")?> <span class="fg-grey">(4)</span>
            </a>

            <?if(me()):?>
                <a class="ico-text"
                   panel-on="click" panel-action="toggle" panel-target="profile"
                   href="#">
                    <?=trad("btn mon compte")?>
                </a>
            <?else:?>
                <a class="ico-text"
                   panel-on="click" panel-action="toggle" panel-target="login"
                   href="#">
                    <?=trad("btn connexion")?>
                </a>
            <?endif?>

        </div>


    </div>

    <div panel="main-nav" class="full" id="nav-content">
        <div class="background"></div>
        <?=$view->render("main-menu/main-menu")?>
        <button nav-menu-click='toggle' class="ico">
            <span class="icon">
                <?=pov()->svg->use("startup-close")?>
            </span>
        </button>
    </div>



    <?=$view->render("nav/panels")?>



</nav>