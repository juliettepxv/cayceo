<form data-form class="form-text">
    <select m class="resizeinput" name="hello">
        <option>Salut</option>
        <option selected>Bonjour</option>
        <option>Hello</option>
        <option>Hola</option>
    </select>
    <span m>, je m'appelle</span>
    <input m class="resizeinput" type="text" placeholder="Prénom" name="firstname">
    <input m class="resizeinput" type="text" placeholder="Nom" name="lastname">
    <span m>.<br></span>

    <span m>Je vous contacte</span>
    <select m message-placeholder class="resizeinput" name="object">
        <option placeholder="Voici le descriptif du projet..." selected value="projet">pour vous soumettre un projet</option>
        <option placeholder="En effet, je souhaiterai savoir..." value="infos">pour avoir des informations</option>
        <option placeholder="Je vous propose..." value="partenariat">pour vous proposer un partenariat</option>
        <option placeholder="Pourriez-vous me deviser..." value="devis">car je souhaiterai avoir un devis</option>
        <option placeholder="En 28ème année de communication, je souhaiterai bla bla bla..." value="stage">car j'aimerai faire un stage chez vous</option>
        <option placeholder="Diplômé de l'ENA, HEC et des Beaux art de Paris, je souhaite travailler bénévolement pour Manifestory etc..." value="candidature">car je souhaite rejoindre l'équipe</option>
        <option placeholder="Je vous écris donc ce poême dans l'espoir que vous le lirez..." value="divers">car je m'ennuie</option>
    </select>
    <span>.</span>

    <textarea m rows="2" class="resizeinput" name="message" placeholder="..."></textarea>

    <span m >Vous pouvez m'écrire à</span>
    <span style="white-space: nowrap">
    <input m class="resizeinput" type="text" placeholder="email" name="mail1">
    <span m>@</span>
    <input m class="resizeinput" type="text" placeholder="mail.com" name="mail2">
    <span m>.</span>
    </span>
    <br>
    <select m class="resizeinput" name="ciao">
        <option>Salut</option>
        <option>Cordialement</option>
        <option>À bientôt</option>
        <option>Adieu</option>
    </select>
    <div>

    </div>
    <button type="submit">Envoyer</button>
    <div class="error-message">err</div>
    <div class="success-message">success</div>
</form>