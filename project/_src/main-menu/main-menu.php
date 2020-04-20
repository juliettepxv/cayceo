<?php
?>

<div class="main-menu " scroll-active="">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" ss="-0.1">
                <div>
                    <?=site()->homePage()->wysiwyg()
                        ->field("vars.navMain")
                        ->listJson(["lists/item-page"])
                        ->contextMenuSize(SIZE_SMALL)
                        ->onlyRecords("page")
                        ->htmlTag("ul")
                        ->addClass("nav-main list-h1")
                    ?>

                </div>
            </div>
            <div class="col-lg-6" ss="-0.2">
                <?=site()->homePage()->wysiwyg()
                    ->field("vars.navMain-button")
                    ->listJson(["lists/item-page"])
                    ->contextMenuSize(SIZE_SMALL)
                    ->onlyRecords("page")
                    ->htmlTag("ul")
                    ->addClass("nav-main list-button my-medium")
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
    </div>

</div>

