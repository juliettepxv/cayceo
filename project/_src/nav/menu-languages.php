<?if(count(cq()->langActives(false))>1):?>
<div class="languages">
    <?foreach (cq()->langActives(false) as $langCode):?>
            <a class="<?=the()->project->langCode==$langCode?"active":""?>"
               data-is-lang="<?=$langCode?>" href="#"><?=$langCode?></a>
    <?endforeach;?>
</div>
<?endif;?>