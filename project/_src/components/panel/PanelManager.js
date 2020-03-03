import Panel from "./Panel";
require("./panel.less");

export default class PanelManager {
    get currentlyOpen() {
        return this._currentlyOpen;
    }

    set currentlyOpen(value) {
        this._currentlyOpen = value;
    }

    constructor() {
        let me=this;
        this.list={};
        /**
         *
         * @type {null|Panel}
         */
        this._currentlyOpen=null;

        $body.on("click","[panel-on='click']","click",function(e){
            e.preventDefault();
            e.stopPropagation();
            let action = $(this).attr("panel-action");
            let panelName=$(this).attr("panel-target");
            let panels=me.getPanels(panelName);
            if(!panels.length){
                console.warn(` panel target ${panelName} introuvable`);
            }

            for(let p of panels){
                switch (action) {
                    case "toggle":
                        p.toggle();
                        break;
                    case "open":
                        p.open();
                        break;
                    case "close":
                        p.close();
                        break;
                    default:
                        console.warn(` panel action ${action} non prise en charge`);
                }
            }
        });


    }
    addPanel($el,name){
        console.log("new panel")
        let p=new Panel($el,name,this);
        this.list[name]=p;
        return p;
    }

    closeAll(){
        for(let p of this.getPanels("*")){
            p.close();
        }
    }

    /**
     *
     * @param {string} name Soite le nom d'un tableau, soit * pour tous
     * @returns {[Panel]}
     */
    getPanels(name){
        if(name==="*"){
            return this.listArray();
        }
        let p=this.list[name];
        if(p){
            return [p];
        }
        return [];
    }


    /**
     * Renvoie la liste des tab sous forme de tableau (et non d'objet indexé par noms)
     * @returns {[Panel]}
     */
    listArray(){
        let r=[];
        for (let key in this.list) {
            if (this.list.hasOwnProperty(key)) {
                r.push(this.list[key]);
            }
        }
        return r;
    }


    initFromDom(){
        let me=this;
        console.log("hop1")
        $("[panel]").not("[panel-init]").each(function(){
            console.log("hop2")
            let $el=$(this);
            $el.attr("panel-init","1");
            let name=$el.attr("panel");
            let p=me.addPanel($el,name);
        });
    }
}