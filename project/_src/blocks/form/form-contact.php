<?php

?>
<form data-form class="form-text">

    <div class="form-content">
        <input mandatory class="" type="text" placeholder="Nom*" name="lastname">
        <hr>
        <input mandatory m class="" type="email"  placeholder="email*" name="email">

        <hr>
        <span class="my-small"><?=trad("Demande de devis/démo/information*")?></span>
        <hr>
        <textarea  mandatory rows="10" class="resizeinput" name="message" placeholder="Décrivez-nous votre besoin, nous nous chargerons d'y répondre au plus vite."></textarea>
        <hr>
        <span class="my-small"><?=trad("Souhaitez-vous être rappelé ?")?></span>
        <hr>
        <input m class="" type="tel"  placeholder="Téléphone" name="phone">
        <hr>
        <input m class="" type="text"  placeholder="Par exemple : Lundi 12 Avril à 14h00" name="phonemoment">
        <hr>

        <button class="mt-medium button sz-big" type="submit">Envoyer</button>
    </div>
    <hr>
    <div class="error-message"></div>
    <div class="success-message"></div>
</form>