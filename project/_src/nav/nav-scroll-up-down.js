//nav qui suit le scroll
require("./nav-scroll-up-down.less");
STAGE.on(EVENTS.SCROLL_UP,function(){
    $body.attr("scroll-dir","up");
});
STAGE.on(EVENTS.SCROLL_DOWN,function(){
    $body.attr("scroll-dir","down");
});