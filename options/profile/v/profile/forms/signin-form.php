<form data-model-sign-in
      class="form-signin d-flex flex-column">

    <input type="text" data-is-mandatory
           class="mb-tiny field shp-rect color-grey-light negative"
           name="email"
           autocomplete="username"
           placeholder="<?=trad("Email")?> *" >

    <input type="password" data-is-mandatory
           class="mb-tiny field shp-rect color-grey-light negative"
           name="pwd"
           autocomplete="new-password"
           placeholder="<?=trad("Password")?> *" >

    <input type="password" data-is-mandatory
           class="mb-tiny field shp-rect color-grey-light negative"
           name="pwd-confirm"
           autocomplete="new-password"
           placeholder="<?=trad("Password Confirm")?> *" >

    <button type="submit"
       class="mb-tiny button color-white bg-fluo-hvr fg-black-hvr">
        <?=trad("btn inscription")?>
    </button>

    <div message class="alert mt-medium pb-medium">
        message ici
    </div>

    <hr>

    <div class="mt-small d-flex flex-column">

        <a href="#" panel-on="click" panel-action="open" panel-target="profileLogin"
           class="mb-tiny button color-black negative-hvr">
            <?=trad("btn connexion")?>
        </a>

        <a href="#" panel-on="click" panel-action="open" panel-target="profileLostpassword"
           class="mb-tiny button color-black negative-hvr">
            <?=trad("btn lost password")?>
        </a>
    </div>

</form>