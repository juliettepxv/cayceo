<?php
/**
 * Le footer
 */
?>
<footer id="footer">
    <div class="container">


            <?= site()->homePage()->wysiwyg()
                ->field("vars.navSocial")
                ->listJson(["lists/item-link"])
                ->contextMenuSize(SIZE_SMALL)
                ->horizontal()
                ->htmlTag("ul")
                ->addClass("social list-icons")
                ->setAttribute("ss", "0.2")
            ?>


            <?= site()->homePage()->wysiwyg()
                ->field("texte_lang")
                ->string(\Pov\Utils\StringUtils::FORMAT_NO_HTML_SINGLE_LINE)
                ->setPlaceholder("Saisissez votre texte")
                ->htmlTag("h4")
            ?>

    </div>
</footer>