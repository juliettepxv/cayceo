<?php
/**
 * contient les formulaires login / sign in / lost password:
 * - inscription
 * - identification
 * - mot de passe oublié
*/
?>

<div class="user-form" >
    <div class="wrapper">
        <?=$view->render("profil/forms/login-form")?>
        <?=$view->render("profil/forms/signin-form")?>
        <?=$view->render("profil/forms/lost-password-form")?>
    </div>
</div>
