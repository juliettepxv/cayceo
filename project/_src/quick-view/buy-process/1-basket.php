<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout", $vv);

?>
<div class="page basket">
    <div class="container mt-big">

        <h1>Mon pannier</h1>
        <?=$view->render("shop/basket/basket-tables")?>

        <nav class="row my-big">
            <div class="col-md-6">
                <a class="animated-button" href="<?=site()->pageShop()->href()?>">Continuer mes achats</a>
            </div>
            <div class="col-md-6 text-right">
                <a class="animated-button green" href="<?=site()->buyPersonalInfoUrl()?>"><?=pov()->svg->use("startup-basket-checkmark")?>Valider la commande</a>
            </div>
        </nav>

    </div>
</div>


