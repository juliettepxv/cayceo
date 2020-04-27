<?php

?>
<form data-form class="form-text">


    <input  class="" type="text" placeholder="Nom" name="lastname">
    <hr>
    <input m class="" type="email"  placeholder="email" name="email1">
    <hr>
    <input m class="" type="tel"  placeholder="Téléphone" name="phone">
    <hr>
    <span class="my-small"><?=trad("Demande de devis/démo/information*")?></span>
    <hr>
    <textarea  rows="10" class="resizeinput" name="message" placeholder="Décrivez nous votre besoin, nous nous chargerons d'y répondre au plus vite."></textarea>
    <hr>
    <span class="my-small"><?=trad("Souhaitez vous être rappeler ?")?></span>
    <hr>
    <input m class="" type="text"  placeholder="Par exemple : Lundi 12 Avril à 14h00" name="email1">
    <hr>
    <button class="mt-medium button sz-big" type="submit">Envoyer</button>

    <hr>
    <div class="error-message">err</div>
    <div class="success-message">success</div>
</form>