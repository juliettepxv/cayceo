<?if(count(cq()->langActives(false))>1):?>
<?foreach (cq()->langActives(false) as $langCode):?>
        <a class="text <?=the()->project->langCode==$langCode?"active":""?>"
           data-is-lang="<?=$langCode?>" href="#"><?=$langCode?></a>
<?endforeach;?>
<?endif;?>