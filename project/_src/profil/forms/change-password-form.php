<form data-model-change-password class="form-signin shadow-medium-rounded">
    <h2 class="form-signin-heading"><?=trad("Changer de mot de passe")?></h2>
    <input style="display: none;" type="email" autocomplete="username" value="<?=me()->email?>">
    <input type="password" data-is-mandatory
           class="group-first form-control"
           name="password"
           autocomplete="new-password"
           placeholder="<?=trad("New Password")?> *" >
    <input type="password" data-is-mandatory
           class="group-last mb-small form-control"
           name="confirm"
           autocomplete="new-password"
           placeholder="<?=trad("Password Confirm")?> *" >


    <div message class="fg-danger mt-medium pb-medium">
        message ici
    </div>

    <button class="mb-small animated-button green"
            type="submit">
        <?=trad("Save")?>
    </button>

</form>