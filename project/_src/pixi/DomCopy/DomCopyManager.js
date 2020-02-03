require("./dom-copy.less");

import DomCopyImg from "./DomCopyImg";
import DomCopySection from "./DomCopySection";
import DomCopyBubulle from "./DomCopyBubulle";

export default class DomCopyManager {
    constructor() {
        let me=this;
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
        window.addEventListener("resize", function(event){
            me.resize();
        });

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
        this.garbage();
    }

    /**
     * Supprime les DOM copy qui ne sont plus dans le DOM
     */
    garbage(){
        let me=this;
        let newAll=[];
        for(let el of me.all){
            if(!document.body.contains(el.$dom[0])){
                el.sprite.destroy({
                    children:true,
                    //texture:true,
                    //baseTexture:true
                });
                console.log("delete dom copy");
            }else{
                newAll.push(el);
            }
        }
        me.all=newAll.concat([]);
    }


    resize(){
        //console.log("resize");
        for(let el of this.all){
            if(el.active){
                el.positionFromDom();
                el.resizeFromDom();
            }
        }
    }

    setScroll(){
        this.container.y=-speedScroll.y;

    }


    positionne(){
        //console.log("positionne");
        for(let el of this.all){
            if(el.active){
                el.positionFromDom();
            }
        }
    }
}