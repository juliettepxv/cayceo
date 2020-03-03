<div id="main-navbar" >
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

        <?//langues ?>
        <?if(count(cq()->langActives(false))>1):?>
        <a class="text-link" href="#" panel-on="click" panel-action="open" panel-target="languages">
            <?=the()->project->langCode?>
        </a>
        <?endif?>
        <?//=$view->render("nav/menu-languages") menu de langue classique?>

        <a class="text-link"
           panel-on="click" panel-action="toggle" panel-target="basket"
           href="#">
                <?=pov()->svg->use("startup-cart")?>
                <span class="fg-grey">(4)</span>
        </a>
        <?if(me()):?>
            <a class="text-link"
               panel-on="click" panel-action="toggle" panel-target="profile"
               href="#">
                <?=pov()->svg->use("startup-user")?>
                <span class="d-none d-flex-lg"><?=trad("btn mon compte")?></span>

            </a>
        <?else:?>
            <a class="text-link"
               panel-on="click" panel-action="toggle" panel-target="login"
               href="#">
                <?=pov()->svg->use("startup-user")?>
                <span class="d-none d-lg-flex"><?=trad("btn connexion")?></span>
            </a>
        <?endif?>
    </div>

</div>
</div>