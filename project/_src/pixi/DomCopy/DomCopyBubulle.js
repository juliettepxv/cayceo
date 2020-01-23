import DomCopy from "./DomCopy";
import * as PIXI from "pixi.js";
/*
import BubulleGFX from "../../bubulles/BubulleGFX";
import BubulleMask from "../../bubulles/BubulleMask";
import BubulleSimple from "../../bubulles/BubulleSimple";
*/
export default class DomCopyBubulle extends DomCopy{
    constructor($dom){
        super($dom);
        /**
         *
         * @type {Page}
         */
        this.page=$dom.closest(".preview").data("page");
        this.color1=this.page.colors.a;
        this.color2=this.page.colors.b;

        let me=this;
        this.sprite=new PIXI.Container();
        this.applyResize=false;


        this.zone=new PIXI.Graphics();
        this.zone.lineStyle(1,0x0000FF,1);
        this.zone.drawRect(0,0,100,100);
        //this.sprite.addChild(this.zone);

        this.bubulles=[];
        for(let i=0;i<rand(2,4);i++){
            let b=this._randomBubulle();
            b.container=this;
            this.bubulles.push(b);
            this.sprite.addChild(b.sprite);
        }
    }

    /**
     *
     * @returns {Bubulle}
     * @private
     */
    _randomBubulle(){
        /**
         *
         * @type {Bubulle}
         */
        let b=null;
        let r=rand(1,7);
        switch (r) {
            case 1:
                b=new BubulleSimple("./src/bubulles/a.png",this.color1,this.color2);
                break;

            case 2:
                b=new BubulleSimple("./src/bubulles/b.png",this.color1,this.color2);
                break;

            case 3:
                b=new BubulleSimple("./src/bubulles/contour.png",this.color1,this.color2);
                break;

            case 4:
                b=new BubulleGFX("./src/bubulles/trait.png",this.color1,this.color2);
                break;

            case 5:
                b=new BubulleGFX("./src/bubulles/cercle.png",this.color1,this.color2);
                break;

            case 6:
                b=new BubulleMask("./src/bubulles/a.png","./src/bubulles/trame-traits.png",this.color1,this.color2);
                break;

            case 7:
                b=new BubulleMask("./src/bubulles/masque1.png","./src/bubulles/trame-points.png",this.color1,this.color2);
                break;

        }
        return b;
    }

    get active() {return this._active;}
    set active(value) {
        super.active = value;
        console.log("active domcopy bubulle",value);
        for(let b of this.bubulles){
            b.active=value;
        }
    }

    refreshDisplay(){
        super.refreshDisplay();
        this.w=this.$dom.width();
        this.h=this.$dom.height();
        this.zone.clear();
        this.zone.lineStyle(1,0x0000FF,1);
        this.zone.drawRect(0,0,this.w,this.h);
        for(let b of this.bubulles){
            b.limits.right=this.w;
            b.limits.bottom=this.h;
            b.randomXY();
        }
    }


}