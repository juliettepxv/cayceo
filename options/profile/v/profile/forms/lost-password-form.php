<form  data-model-lost-password class="form-signin d-flex flex-column">

    <p class="text-details mb-small">
        <?=trad("lost password explications")?>
    </p>

    <input type="email"
           class="mb-tiny field shp-rect color-grey-light negative"
           name="email"
           autocomplete="username"
           placeholder="<?=trad("Email")?> *" data-is-mandatory>

    <button type="submit"
            class="mb-tiny button color-white bg-fluo-hvr fg-black-hvr">
        <?=trad("btn reset password")?>
    </button>

    <div message class="fg-danger mt-medium pb-medium">
        message ici
    </div>

    <hr>

    <div class="mt-small d-flex flex-column">

        <a href="#" panel-on="click" panel-action="open" panel-target="profileCreate"
           class="mb-tiny button color-black negative-hvr">
            <?=trad("btn inscription")?> ....
        </a>

        <a href="#" panel-on="click" panel-action="open" panel-target="profileLogin"
           class="mb-tiny button color-black negative-hvr">
            <?=trad("btn connexion")?>
        </a>
    </div>

</form>