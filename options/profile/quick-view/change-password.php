<?php
/** @var Page $vv */
use Classiq\Models\Page;
$view->inside("layout/layout", $vv);
$t=the()->request("t");
if($t){
    $p=\Classiq\Models\Profil::getByToken($t);
    if($p){
        $p->login();
    }
}
?>
<div class="page reset-password user-form">
    <div class="container mt-big text-center">
    <?if(!me()):?>
        <p class="mb-medium">
            <?=trad("lost password expired explication")?>
        </p>
        <a href="#" panel-on="click" panel-action="open" panel-target="profileLogin"
           class="button color-black negative bg-grey-hvr">
            <?=trad("btn connexion");?>
        </a>
    <?else:?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="shadow-medium pxy-medium mb-big shp-rounded mx-auto">
                <?=$view->render("profile/forms/change-password-form")?>
            </div>
        </div>
    </div>
    <?endif?>
    </div>
</div>


