<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout", $vv);
?>
<div class="page user-home">
    <div class="container mt-big">
    <?if(!me()):?>
        <?=$view->render("profil/profil-forms")?>
    <?else:?>
        <div>
            <div class="mb-small text-right">
                <a href="#" class="animated-button" api-click="meLogOut"><?=pov()->svg->use("startup-user-exit")?>Déconnexion</a>
            </div>

            <h1 class="mb-small">Mon compte</h1>

        </div>


        <?if(me()->orders()):?>
        <div>
            <h2 class="mb-small">Mes commandes</h2>
            <?foreach (me()->orders() as $order):?>
                <?=$view->render("shop/order/order-tables",$order)?>
                <hr>
            <?endforeach;?>
        </div>
        <?endif;?>


        <div>
            <h2 class="mb-small">Mes information personnelles</h2>
            <?=$view->render("profil/address/address-form",me()->defaultAdress())?>
        </div>



    <?endif?>
    </div>
</div>

