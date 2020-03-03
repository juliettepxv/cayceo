<?php
/**
 * Contient tous les panels
 */
?>

<div panel="profile" class="right">
    <div class="panel-body bg-white px-small" px-medium="lg">

        <nav>
            <h4><?=trad("btn mon compte")?></h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>

        <main>
            <div class="mt-small d-flex flex-column justify-content-between">

                <a href="#"
                   class="mb-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn mes commandes")?>
                </a>
                <a href="#"
                   class="mb-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn mes informations")?>
                </a>

            </div>
        </main>

        <footer class="d-flex flex-column">
            <a href="#" api-click="meLogOut"
               class="mb-tiny button color-black negative bg-grey-hvr">
                <?=trad("btn déconnexion")?>
            </a>
        </footer>

    </div>
</div>

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


<div panel="basket" class="right">
    <div class="panel-body bg-black fg-white px-small" px-medium="lg">

        <nav class="text-right">
            <h4><?=trad("btn panier")?></h4>
            <button class="button sz-normal color-white naked color-grey-light-hvr square"
                    panel-on="click" panel-action="close" panel-target="basket">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <main>
            <?for($i=0;$i<rand(3,300);$i++):?>
            <div class="py-small">
                Article <?=$i?>
            </div>
            <?endfor;?>
        </main>
        <footer>
            <div class="d-flex justify-content-between">
                <h4>Total</h4>
                <h4>XXX,XX€</h4>
            </div>

            <div class="d-flex flex-column mb-tiny">
                <a href="#"
                   class="mt-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn passer au paiement")?>
                </a>
            </div>

        </footer>

    </div>
</div>
