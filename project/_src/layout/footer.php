<?php

?>
<footer id="footer">

    <div scroll-active="" class="block block-logos py-small">
        <div class="container">
            <?=site()->homePage()->wysiwyg()->field("vars.logos")
                ->listJson("blocks/block-logos/logos/logo-link-item")
                ->horizontal()
                ->contextMenuPosition(POSITION_BOTTOM)
                ->blockPickerEmptyMessage("Insérez des logos dans cette liste")
                ->contextMenuSize(SIZE_SMALL)
                ->onlyImages()
                ->htmlTag("div")
                ->addClass("wrap")
            ?>
        </div>
    </div>

    <?=$view->render("main-menu/main-menu")?>
</footer>