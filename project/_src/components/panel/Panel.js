
export default class Panel{
    /**
     *
     * @param {jQuery} $main
     * @param {String} name
     * @param {PanelManager} manager
     */
    constructor($main,name,manager) {
        /**
         *
         * @type {jQuery}
         */
        this.$main=$main;
        /**
         *
         * @type {String}
         */
        this.name=name;
        /**
         *
         * @type {PanelManager}
         */
        this.manager=manager;
    }
    isOpen(){
        return this.manager.currentlyOpen===this;
    }
    open(){
        this.manager.closeAll();
        this.manager.currentlyOpen=this;
        this.$main.addClass("panel-open");
        this.$main.trigger(Panel.EVENT_PANEL_OPEN);
    }
    close(){
        this.manager.currentlyOpen=null;
        this.$main.removeClass("panel-open");
        this.$main.trigger(Panel.EVENT_PANEL_CLOSE);
    }
    toggle(){
        if(this.isOpen()){
            this.close();
        }else{
            this.open();
        }
    }

}

Panel.EVENT_PANEL_OPEN="EVENT_PANEL_OPEN";
Panel.EVENT_PANEL_CLOSE="EVENT_PANEL_CLOSE";