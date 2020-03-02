<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout", $vv);

?>
<div class="page">
    <div class="container mt-big">

        <h1>Paiement</h1>
        <?//=$view->render("shop/address/address-form")?>

        <hr>
        <nav class="row my-big">
            <div class="col-md-6">
                <a class="btn btn-lg btn-info" href="<?=site()->buyPersonalInfoUrl()?>">Livraison</a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-lg btn-warning"
                   href="#">Payer</a>
            </div>
        </nav>

    </div>
</div>