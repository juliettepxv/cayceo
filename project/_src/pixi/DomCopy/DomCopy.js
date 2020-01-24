

export default class DomCopy {

    constructor($dom){
        /**
         *
         * @type {PIXI.Container}
         */
        this.container=null;
        /**
         *
         */
        this.$dom=$dom;
        this.$dom.data("domCopy",this);
        this._active=false;
        /**
         *
         * @type {PIXI.Sprite}
         */
        this.sprite=null;
        this.$dom.attr("dom-copied","");
        this.isFixed=false;
        this.applyResize=true;
        this.w=0;
        this.h=0;
    }

    /**
     * Donne une taille en fonction du l'objet DOM
     */
    resizeFromDom(){
        // w / h
        this.w=this.$dom.width();
        this.h=this.$dom.height();
    }

    /**
     * Positionne l'objet en fonction du DOM
     */
    positionFromDom(){
        // x / y
        let rect=this.$dom[0].getBoundingClientRect();
        this.sprite.x=rect.left;
        this.sprite.y=rect.top;
        if(!this.isFixed){
            this.sprite.x+=window.scrollX;
            this.sprite.y+=window.scrollY;
        }else{

        }
    }

    get active() {return this._active;}
    set active(value) {
        //console.log("active domcopy",value);
        if(value && value !== this._active){
            //vient d'être activé
            this.resizeFromDom();
            this.positionFromDom();
        }
        this._active = value;

        if(this._active){
            this.container.addChild(this.sprite);
        }else{
            this.container.removeChild(this.sprite);
        }
        //this.sprite.visible=value;
    }

    checkDomActive(){
        this.active=this.$dom.is(".is-active");
    }

}