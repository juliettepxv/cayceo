//ajout un attribut scroll-is-top= true ou false à body en fonction de si on est en haut de page ou non
STAGE.on(EVENTS.SCROLL,function(){
    $body.attr("scroll-is-top",STAGE.scrollY===0?"true":"false");
});