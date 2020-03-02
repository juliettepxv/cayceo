<?/**
* @var \Classiq\Models\Address $vv
 */
?>
<form data-model-address  class="">

    <input type="hidden" name="uid" value="<?=$vv->uid()?>">

    <div class="form-group">
        <label for="">Nom, prénom</label>
        <input type="text" class="form-control" name="name" placeholder="" value="<?=$vv->name?>">
    </div>
    <div class="form-group">
        <label for="">Adresse</label>
        <textarea class="form-control"
                  name="address"
                  placeholder=""><?=$vv->address?></textarea>
    </div>
    <div class="form-group">
        <label for="">Code postal</label>
        <input type="text"
               class="form-control"
               name="zipcode"
               placeholder=""
               value="<?=$vv->zipcode?>"
        >
    </div>
    <div class="form-group">
        <label for="">Ville</label>
        <input type="text"
               class="form-control"
               name="city"
               placeholder=""
               value="<?=$vv->city?>"
        >
    </div>
    <div class="form-group">
        <label for="">Pays</label>
        <input type="text" readonly
               class="form-control"
               name="country"
               placeholder=""
               value="<?=$vv->country?>"
        >
    </div>
    <hr>
    <div class="form-group">
        <label for="">Téléphone 1</label>
        <input type="text"
               class="form-control"
               name="phone1"
               placeholder=""
               value="<?=$vv->phone1?>"
        >
    </div>
    <div class="form-group">
        <label for="">Téléphone 2</label>
        <input type="text"
               class="form-control"
               name="phone2"
               placeholder=""
               value="<?=$vv->phone2?>"
        >
    </div>

    <hr>

    <div message class="fg-danger mt-medium pb-medium">
        message ici
    </div>

    <button class="mb-small animated-button green"
            type="submit">
        <?=pov()->svg->use("startup-basket-checkmark")?><?=trad("Save")?>
    </button>

</form>