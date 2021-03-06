<div class="container my-big">
    <h3>Boutons</h3>
    <hr>
    <div class="row mt-big">
        <div class="col-md-3">
            <label>default</label>
        </div>
        <div class="col-md-9">
            <button class="button">default</button>
            <a class="button color-primary">primary</a>
            <button class="button color-primary-2">primary 2</button>
        </div>
    </div>

    <div class="row mt-big">
        <div class="col-md-3">
            <label>negative</label>
        </div>
        <div class="col-md-9">
            <button class="button negative">default</button>
            <button class="button negative color-primary"><span>primary</span></button>
            <a      class="button negative color-primary-2"><span>primary 2</span></a>
        </div>
    </div>

    <div class="row mt-big">
        <div class="col-md-3">
            <label>transparent</label>
        </div>
        <div class="col-md-9">
            <button class="button transparent">default</button>
            <button class="button transparent color-primary">primary</button>
            <a      class="button transparent color-primary-2">primary 2</a>
        </div>
    </div>

    <div class="row mt-big">
        <div class="col-md-3">
            <label>naked</label>
        </div>
        <div class="col-md-9">
            <button class="button naked">default</button>
            <button class="button naked color-primary">primary</button>
            <a      class="button naked color-primary-2">primary 2</a>
        </div>
    </div>



    <div class="row mt-big">
        <div class="col-md-3">
            <label>shapes</label>
        </div>
        <div class="col-md-9">
            <button class="button">default</button>
            <button class="button color-primary shp-rounded">shape rounded</button>
            <a      class="button color-primary-2 shp-rect">shape squared</a>
        </div>
    </div>

    <div class="row mt-big">
        <div class="col-md-3">
            <label>icônes</label>
        </div>
        <div class="col-md-9">
            <a class="button">
                <?=pov()->svg->use("startup-close")?>
                <span>icône avant</span>
            </a>
            <a class="button color-primary shp-rounded">
                <span>icône après</span>
                <?=pov()->svg->use("startup-close")?>
            </a>
            <a  class="button color-primary-2 shp-rect square">
                <?=pov()->svg->use("startup-close")?>
            </a>
            <a  class="button color-primary-2 negative square shadow-medium">
                <?=pov()->svg->use("startup-close")?>
            </a>
            <a  class="button color-primary transparent shp-rounded square">
                <?=pov()->svg->use("startup-close")?>
            </a>
        </div>
    </div>

    <div class="row mt-big">
        <div class="col-md-3">
            <label>Tailles & variations</label>
        </div>
        <div class="col-md-9">
            <?foreach (["small","normal","big","huge"] as $size):?>
                <div class="mb-medium row text-center">
                    <div class="col-sm-4 mb-medium ">
                        <button class="button sz-<?=$size?> bdr-primary-hvr" ><?=$size?></button>
                    </div>
                    <div class="col-sm-4 mb-medium">
                        <button class="button sz-<?=$size?> color-primary color-primary-2-hvr negative-hvr">
                            <?=pov()->svg->use("startup-close")?>
                            <span><?=$size?></span>
                        </button>
                    </div>
                    <div class="col-sm-4 mb-medium">
                        <button class="button sz-<?=$size?> color-primary negative shp-rounded positive-hvr fg-primary-2-hvr">
                            <span><?=$size?></span>
                            <?=pov()->svg->use("startup-close")?>
                        </button>
                    </div>
                    <div class="col-sm-4 mb-medium">
                        <a class="button sz-<?=$size?> color-primary-2 naked negative-hvr square">
                            <?=pov()->svg->use("startup-close")?>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-medium">
                        <button class="button sz-<?=$size?> color-primary-2 negative square shp-rect-hvr shadow-medium">
                            <?=pov()->svg->use("startup-close")?>
                        </button>
                    </div>
                    <div class="col-sm-4 mb-medium">
                        <a class="button sz-<?=$size?> color-primary color-primary-2-hvr transparent shp-rounded square">
                            <?=pov()->svg->use("startup-close")?>
                        </a>
                    </div>
                </div>
            <?endforeach;?>

        </div>
    </div>

    <div class="row mt-big">
        <div class="col-md-3">
            <label>Social</label>
        </div>
        <div class="col-md-9">
            <?foreach (["facebook","twitter","instagram","linkedin","youtube","vimeo"] as $sn):?>
                <a  class="button color-<?=$sn?> naked square sz-small">
                    <?=pov()->svg->use("startup-social-$sn")?>
                </a>
                <a  class="button color-<?=$sn?>-hvr naked square sz-small">
                    <?=pov()->svg->use("startup-social-$sn")?>
                </a>
                <a  class="button color-<?=$sn?>-hvr negative-hvr naked square sz-small">
                    <?=pov()->svg->use("startup-social-$sn")?>
                </a>
                <a  class="button color-<?=$sn?>-hvr transparent-hvr shp-rect-hvr square naked sz-small">
                    <?=pov()->svg->use("startup-social-$sn")?>
                </a>
                <a  class="button color-<?=$sn?> negative square sz-big">
                    <?=pov()->svg->use("startup-social-$sn")?>
                </a>
                <a  class="button color-<?=$sn?> square shp-rect sz-big">
                    <?=pov()->svg->use("startup-social-$sn")?>
                </a>
                <a  class="button color-<?=$sn?> negative sz-big">
                    <span><?=$sn?></span>
                </a>
                <hr>
            <?endforeach;?>
        </div>
    </div>


</div>