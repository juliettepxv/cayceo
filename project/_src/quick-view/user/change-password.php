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
    <?if(!me()):?>
        <div class="container mt-big text-center">
            <p class="fg-white">
                Ce lien n'est plus valide, essayez de vous
                <b><a class="underline-hvr" href="<?=site()->profilUrl()?>">connecter</a></b>.
            </p>
        </div>
    <?else:?>
        <div class="container mt-big">
            <div class="wrapper">
                <?=$view->render("profil/forms/change-password-form")?>
            </div>
        </div>
    <?endif?>
</div>


