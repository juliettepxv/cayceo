<?if(me()):?>
<div panel="profile" class="right">
    <div class="panel-body bg-white px-small" px-medium="lg">

        <nav>
            <h4><?=trad("btn mon compte")?></h4>
            <button class="button sz-normal color-black naked color-grey-hvr square" panel-on="click" panel-action="close" panel-target="*">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>

        <main>
            <div class="mt-small d-flex flex-column justify-content-between">

                <a href="#"
                   class="mb-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn mes commandes")?>
                </a>
                <a href="#"
                   class="mb-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn mes informations")?>
                </a>

            </div>
        </main>

        <footer class="d-flex flex-column">
            <a href="#" api-click="meLogOut"
               class="mb-tiny button color-black negative bg-grey-hvr">
                <?=trad("btn déconnexion")?>
            </a>
        </footer>

    </div>
</div>
<?endif?>