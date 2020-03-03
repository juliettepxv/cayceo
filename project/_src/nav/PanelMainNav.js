import Panel from "../components/panel/Panel";
export default class PanelMainNav{
    constructor() {
        let me=this;
        this.$main=$("[panel='main-nav']");
        me.$main.on(Panel.EVENT_PANEL_OPEN,function(){
            $body.addClass("nav-open");
            me.anim().setDirection(1);
            me.anim().goToAndPlay(1,true);
        });
        me.$main.on(Panel.EVENT_PANEL_CLOSE,function(){
            $body.removeClass("nav-open");
            me.anim().setDirection(-1);
            me.anim().play();
        });
    }

    /**
     *
     * @returns {lottie}
     */
    anim(){
        return this.$main.find(".background").data("lottie");
    }

    /**
     *
     * @returns {Panel}
     */
    panel(){
        return panels.getPanels("main-nav")[0];
    }

    open(){
        this.panel().open();
    }
    close(){
        this.panel().close();
    }
    toggle(){
        this.panel().toggle();
    }
}
