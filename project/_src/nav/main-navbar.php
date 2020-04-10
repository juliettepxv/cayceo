<div id="main-navbar">
<div class="navbar container">

    <div class="a">
        <button panel-on='click' panel-action="open" panel-target="main-nav" class="ico">
            <span class="icon">
                <?=pov()->svg->use("startup-burger")?>
            </span>
        </button>
    </div>

    <div class="b">
        <a class="logo" href="<?=cq()->homePage()->href()?>">
            <?=site()->projectName?>
        </a>
    </div>

    <div class="c">

        <?//langues ?>
        <?if(count(cq()->langActives(false))>1):?>
            <a class="text-link" href="#" panel-on="click" panel-action="open" panel-target="languages">
                <?=the()->project->langCode?>
            </a>
        <?else:?>
        ...
        <?endif?>

    </div>

</div>
</div>