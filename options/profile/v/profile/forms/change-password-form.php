<form data-model-change-password
      class="form-signin d-flex flex-column">


    <input style="display: none;"
           type="email"
           autocomplete="username" value="<?=me()->email?>">

    <input type="password" data-is-mandatory
           class="mb-tiny field shp-rect color-grey-light negative"
           name="password"
           autocomplete="new-password"
           placeholder="<?=trad("New Password")?> *" >

    <input type="password" data-is-mandatory
           class="mb-tiny field shp-rect color-grey-light negative"
           name="confirm"
           autocomplete="new-password"
           placeholder="<?=trad("Password Confirm")?> *" >

    <button class="mb-tiny button color-white bg-fluo-hvr fg-black-hvr"
            type="submit">
        <?=trad("btn save password")?>
    </button>

    <div message class="alert mt-medium pb-medium">
        message ici
    </div>

</form>