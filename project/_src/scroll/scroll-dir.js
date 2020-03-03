//ajoute un attribut scroll-dir = "up" ou "down" à body en fonction de si on va vers le haut ou vers le bas
STAGE.on(EVENTS.SCROLL_UP,function(){
    $body.attr("scroll-dir","up");
});
STAGE.on(EVENTS.SCROLL_DOWN,function(){
    $body.attr("scroll-dir","down");
});