<?php
/**
 * Un lien vers une url
 * @var Classiq\Models\JsonModels\ListItem $vv
 */
?>
<div id="wysiwyg" <?=$view->attrRefresh($vv->uid())?>>

    <fieldset>
        <label>Url de la page</label>
        <?=$vv->wysiwyg()->field("url")
            ->string()
            ->onSavedRefreshListItem($vv)
            ->input("url","http://etc...")
        ?>
    </fieldset>

    <fieldset>
        <label>Icône</label>
        <?=$vv->wysiwyg()->field("icone")
            ->string()
            ->onSavedRefreshListItem($vv)
            ->select(
                    [
                            "Facebook"=>"startup-social-facebook",
                            "Twitter"=>"startup-social-twitter",
                            "LinkedIn"=>"startup-social-linkedin",
                            "Instagram"=>"startup-social-instagram",
                            "Youtube"=>"startup-social-youtube",
                            "Vimeo"=>"startup-social-vimeo",
                            "Mail"=>"startup-mail",
                            "Téléphone"=>"startup-phone",
                            "Carte"=>"startup-pin",
                    ]
            )
        ?>
    </fieldset>

    <fieldset>
        <label>Texte du lien</label>
        <?foreach (the()->project->languages as $lang):?>
            <?=$vv->wysiwyg()->field("label_$lang")
                ->string()
                ->isTranslated($lang)
                ->onSavedRefreshListItem($vv)
                ->input("text","Texte du lien")
            ?>
        <?endforeach;?>
    </fieldset>

    <fieldset>
        <?=$vv->wysiwyg()->field("targetWindow")->bool()->checkbox("Ouvrir dans une nouvelle fenêtre")?>
    </fieldset>

</div>