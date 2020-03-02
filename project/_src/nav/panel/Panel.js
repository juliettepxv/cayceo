
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
        this.manager.currentlyOpen=this;
        this.$main.addClass("panel-open");
        this.$main.trigger("panel-open");
    }
    close(){
        this.manager.currentlyOpen=null;
        this.$main.removeClass("panel-open");
        this.$main.trigger("panel-close");
    }
    toggle(){
        if(this.isOpen()){
            this.close();
        }else{
            this.open();
        }
    }

}