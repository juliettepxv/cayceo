export default class NavMenu{
    constructor() {
        let me=this;
        $body.on("click","[nav-menu-click='toggle']",function(){
            me.toggle()
        });
    }
    open(){
        $body.addClass("nav-open");
    }
    close(){
        $body.removeClass("nav-open");
    }
    toggle(){
        $body.toggleClass("nav-open");
    }
}
