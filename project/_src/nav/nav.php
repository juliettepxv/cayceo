<nav id="nav">

    <div id="nav-bar" >
        <div class="navbar container">
            <div class="a">
                <button panel-on='click' panel-action="open" panel-target="main-nav" class="ico">
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
    </div>

    <div panel="main-nav" class="full" id="nav-content">
        <div class="background"></div>
        <?=$view->render("main-menu/main-menu")?>
        <button class="close button sz-huge naked square" panel-on="click" panel-action="close" panel-target="main-nav">
            <?=pov()->svg->use("startup-close")?>
        </button>
    </div>



    <?=$view->render("nav/panels")?>



</nav>