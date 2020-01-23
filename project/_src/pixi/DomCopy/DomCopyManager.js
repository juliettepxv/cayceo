require("./dom-copy.less");

import DomCopyImg from "./DomCopyImg";
import DomCopySection from "./DomCopySection";
import DomCopyBubulle from "./DomCopyBubulle";

export default class DomCopyManager {
    constructor() {
        this.container=new PIXI.Container();
        this.bubulles=new PIXI.Container();
        this.images=new PIXI.Container();

        this.container.filters=[];
        this.bubulles.filters=[];
        this.images.filters=[];

        this.container.addChild(this.images,this.bubulles);
        /**
         *
         * @type {DomCopy[]}
         */
        this.all=[];

        this.test=new PIXI.Graphics()
        this.test.beginFill(0x00FF00);
        this.test.drawCircle(0,0,500);
        this.container.addChild(this.test);
    }

    /**
     * Génére les DOM COPY en fonction de ce qu'il y a dans le DOM
     */
    fromDom(){
        let me=this;
        $("[dom-copy]").not("[dom-copied]").each(function(){
            let $el=$(this);
            let type=$el.attr("dom-copy");
            /**
             * @type {DomCopy}
             */
            let copy=null;
            switch (type) {
                case "img":
                    copy=new DomCopyImg($el);
                    copy.container=me.images;
                    break;
                case "section":
                    copy=new DomCopySection($el);
                    break;
                case "bubulle":
                    copy=new DomCopyBubulle($el);
                    copy.container=me.bubulles;
                    break;
                default:
                    console.error(`dom-copy ${type} not managed`);
            }
            if(copy){
                $el.attr("dom-copied","1");
                //copy.container=me.container;
                //me.container.addChild(copy.sprite);
                me.all.push(copy);
            }
        });
    }

    resize(){
        for(let el of this.all){
            //if(el.active){
            el.active=true;
                el.refreshDisplay();
            //}
        }
    }
}