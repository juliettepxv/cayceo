<?if(!me()):?>
<div panel="login" class="right">
    <div class="panel-body bg-white px-small" px-medium="lg">

        <nav>
            <h4><?=trad("btn mon compte")?></h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <main>
            <p class="text-details">
                <?=trad("explications mon compte")?>
            </p>

            <div class="mt-small d-flex flex-column">
                <a href="#" panel-on="click" panel-action="open" panel-target="profileCreate"
                   class="mb-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn inscription")?>
                </a>

                <a href="#" panel-on="click" panel-action="open" panel-target="profileLogin"
                   class="button color-black negative bg-grey-hvr">
                    <?=trad("btn connexion")?>
                </a>
            </div>
        </main>

    </div>
</div>
<div panel="profileCreate" class="right">
    <div class="panel-body bg-white px-small" px-medium="lg">
        <nav>
            <h4><?=trad("btn inscription")?></h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <?=$view->render("profil/forms/signin-form")?>
    </div>
</div>
<div panel="profileLogin" class="right">
    <div class="panel-body bg-white px-small" px-medium="lg">
        <nav>
            <h4><?=trad("btn connexion")?></h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <?=$view->render("profil/forms/login-form")?>
    </div>
</div>
<div panel="profileLostpassword" class="right">
    <div class="panel-body bg-white px-small" px-medium="lg">
        <nav>
            <h4><?=trad("btn lost password")?></h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <?=$view->render("profil/forms/lost-password-form")?>
    </div>
</div>
<?endif?>