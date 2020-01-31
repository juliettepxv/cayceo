<?php
/** @var Page $vv */
use Classiq\Models\Page;
?>
<div class="container">
    <?=$vv->wysiwyg()
        ->field("titre_lang")
        ->string(\Pov\Utils\StringUtils::FORMAT_HTML)
        ->setMediumButtons(["bold","removeFormat"])
        ->setPlaceholder("Titre ici ($vv->name)")
        //->setDefaultValue($vv->name)
        ->htmlTag("h1")
    ?>
</div>

