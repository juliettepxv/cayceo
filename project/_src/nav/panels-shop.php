<div panel="basket" class="right">
    <div class="panel-body bg-black fg-white px-small" px-medium="lg">

        <nav class="text-right">
            <h4><?=trad("btn panier")?></h4>
            <button class="button sz-normal color-white naked color-grey-light-hvr square"
                    panel-on="click" panel-action="close" panel-target="basket">
                <?=pov()->svg->use("startup-close")?>
            </button>
        </nav>
        <main>
            <?for($i=0;$i<rand(3,300);$i++):?>
                <div class="py-small">
                    Article <?=$i?>
                </div>
            <?endfor;?>
        </main>
        <footer>
            <div class="d-flex justify-content-between">
                <h4>Total</h4>
                <h4>XXX,XX€</h4>
            </div>

            <div class="d-flex flex-column mb-tiny">
                <a href="#"
                   class="mt-tiny button color-black bg-grey-light-hvr">
                    <?=trad("btn passer au paiement")?>
                </a>
            </div>

        </footer>

    </div>
</div>

