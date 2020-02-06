<?php
?>

<div class="main-menu " scroll-active="">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" ss="-0.1">
                <div>
                    <?=site()->homePage()->wysiwyg()
                        ->field("vars.navMain")
                        ->listJson(["lists/item-page"])
                        ->contextMenuSize(SIZE_SMALL)
                        ->onlyRecords("page")
                        ->htmlTag("ul")
                        ->addClass("nav-main list-h1")
                    ?>
                    <?=site()->homePage()->wysiwyg()
                        ->field("vars.navSocial")
                        ->listJson(["lists/item-link"])
                        ->contextMenuSize(SIZE_SMALL)
                        ->horizontal()
                        ->htmlTag("ul")
                        ->addClass("social list-icons")
                    ->setAttribute("ss","0.2")
                    ?>
                </div>
            </div>
            <div class="col-lg-4" ss="-0.2">
                <?=site()->homePage()->wysiwyg()
                    ->field("vars.navPages")
                    ->listJson(["lists/item-page"])
                    ->contextMenuSize(SIZE_SMALL)
                    //->contextMenuPosition(POSITION_TOP_RIGHT)
                    ->onlyRecords("page")
                    ->htmlTag("ul")
                    ->addClass("pages list-text")
                ?>
            </div>
            <div class="col-lg-4" ss="-0.3">
                <?=site()->homePage()->wysiwyg()
                    ->field("vars.navContact")
                    ->listJson(["lists/item-link"])
                    ->contextMenuSize(SIZE_SMALL)
                    ->htmlTag("ul")
                    ->addClass("contact list-ico-text")
                ?>
            </div>
        </div>
    </div>

</div>

