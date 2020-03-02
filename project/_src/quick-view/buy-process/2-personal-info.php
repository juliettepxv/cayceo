<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout", $vv);

?>
<div class="page user-home">
    <div class="container mt-big">
        <?if(!me()):?>

            <?//si pas connecté form login?>
            <?=$view->render("profil/profil-forms")?>

        <?else:?>
            <?//si connecté adresse?>
            <h1 class="mb-small">Adresse de livraison</h1>
            <?=$view->render("profil/address/address-form",me()->defaultAdress())?>
        <?endif;?>

        <hr>


        <nav class="row my-big">

            <div class="col-md-6">
                <a class="animated-button" href="<?=site()->buyBasketUrl()?>">
                    Modifier ma commande
                </a>
            </div>

            <?if(me()  //si connecté
                && me()->defaultAdress()->isValid() //si adresse valide
                && basket()->calc_price_with_tva() > 0 //si panier pas vide
            ): ?>
            <div class="col-md-6 text-right">
                <?=$view->render("shop/payment-button",basket())?>
            </div>
            <?endif?>
        </nav>

    </div>
</div>