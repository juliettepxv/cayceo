<?php
//récupère les sujets et placehollers
$subjects=[];
$hellos=[];
$ciaos=[];
foreach (the()->project->translations() as $k=>$v){
    if(preg_match("/^form subject (.*) label/",$k,$m)){
        $subject=$m[1];
        $subjects[$subject]=[
                "label"=>trad("form subject $subject label"),
                "placeholder"=>trad("form subject $subject placeholder"),
        ];
    }
    if(preg_match("/^form hello (.*)/",$k,$m)){
        $subject=$m[1];
        $hellos[$subject]=[
            "label"=>trad("form hello $subject")
        ];
    }
    if(preg_match("/^form ciao (.*)/",$k,$m)){
        $subject=$m[1];
        $ciaos[$subject]=[
            "label"=>trad("form ciao $subject")
        ];
    }
}

?>
<form data-form class="form-text">
    <select m class="resizeinput" name="hello">
        <?foreach ($hellos as $k=>$v):?>
            <option value="<?=$v["label"]?>"><?=$v["label"]?></option>
        <?endforeach;?>
    </select>
    <span m>, <?=trad("form je m'appelle")?>&nbsp;</span>
    <input m class="resizeinput" type="text" placeholder="Prénom" name="firstname">
    <span m>&nbsp;</span>
    <input m class="resizeinput" type="text" placeholder="Nom" name="lastname">
    <span m>.</span>
    <span m>&nbsp;</span>

    <span m><?=trad("form je vous contacte")?></span>
    <span m>&nbsp;</span>

    <select m message-placeholder class="resizeinput" name="object">
        <?foreach ($subjects as $k=>$v):?>
            <option placeholder="<?=$v["placeholder"]?>" value="<?=$k?>"><?=$v["label"]?></option>
        <?endforeach;?>
    </select>
    <span m>&nbsp;</span>

    <textarea m rows="2" class="resizeinput" name="message" placeholder="..."></textarea>

    <hr m>
    <span m ><?=trad("form Vous pouvez m'écrire à")?></span>
    <span m>&nbsp;</span>
    <span class="oneline">
        <input m class="resizeinput" type="text" placeholder="email" name="email1">
        <span m>@</span>
        <input m class="resizeinput" type="text" placeholder="mail.com" name="email2">
        <span m>.</span>
    </span>

    <hr m>

    <select m class="resizeinput" name="ciao">
        <?foreach ($ciaos as $k=>$v):?>
            <option value="<?=$v["label"]?>"><?=$v["label"]?></option>
        <?endforeach;?>
    </select>

    <hr m>

    <button type="submit">Envoyer</button>

    <hr>
    <div class="error-message">err</div>
    <div class="success-message">success</div>
</form>