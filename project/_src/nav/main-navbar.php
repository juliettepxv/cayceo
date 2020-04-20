<div id="main-navbar">
<div class="navbar container">

    <div class="a">
        <button panel-on='click' panel-action="open" panel-target="main-nav" class="ico">
            <span class="icon">
                <?=pov()->svg->use("startup-burger")?>
            </span>
        </button>

        <a class="logo" href="<?=cq()->homePage()->href()?>">
        </a>
    </div>

    <div class="b">
        <?=site()->homePage()->wysiwyg()
            ->field("vars.navMain")
            ->listJson(["lists/item-page"])
            ->contextMenuSize(SIZE_SMALL)
            ->onlyRecords("page")
            ->htmlTag("ul")
            ->addClass("nav-main list-h1")
        ?>

    </div>




    <div class="c">
        <?/*
        <?//langues ?>
        <?if(count(cq()->langActives(false))>1):?>
            <a class="text-link" href="#" panel-on="click" panel-action="open" panel-target="languages">
                <?=the()->project->langCode?>
            </a>
        <?else:?>
        <?endif?>*/ ?>
        <?=site()->homePage()->wysiwyg()
            ->field("vars.navMain-button")
            ->listJson(["lists/item-page"])
            ->contextMenuSize(SIZE_SMALL)
            ->onlyRecords("page")
            ->htmlTag("ul")
            ->addClass("nav-main list-button")
        ?>
    </div>

</div>
</div>