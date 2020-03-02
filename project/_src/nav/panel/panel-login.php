<div id="login" class="">
    <div class="container">
        <nav>
            <h4>login</h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="login">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>

        <hr>
        <?=$view->render("profil/profil-forms")?>
        <hr>

        <input type="email" placeholder="email" class="field shp-normal">
        <input type="password" placeholder="shp-normal" class="field shp-normal">
        <a class="button color-black shp-rect">login</a>
    </div>
</div>