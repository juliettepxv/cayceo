<?php
/**
 * Contient tous les panels
 */
?>

<div panel="languages" class="right">
    <div class="panel-body bg-black fg-white px-small" px-medium="lg">
        <nav>
            <h4>Languages...</h4>
            <button class="button sz-normal color-white naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <main>
            <div class="mt-small d-flex flex-column">
                <?foreach (cq()->langActives(false) as $langCode):?>
                    <a href="#" data-is-lang="<?=$langCode?>"
                       class="mb-tiny button  bg-grey-light-hvr <?=the()->project->langCode==$langCode?"color-grey":"color-black"?>"
                       ><?=\Localization\Lang::getByCode($langCode)->localName?></a>
                <?endforeach;?>
            </div>
        </main>
    </div>
</div>

<?=$view->render("nav/panels-shop")?>
<?=$view->render("profile/panels/panels-connected")?>
<?=$view->render("profile/panels/panels-not-connected")?>
