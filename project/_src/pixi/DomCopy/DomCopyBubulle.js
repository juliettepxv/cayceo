import DomCopy from "./DomCopy";
import * as PIXI from "pixi.js";

import BubulleGFX from "../bubulles/BubulleGFX";
import BubulleMask from "../bubulles/BubulleMask";
import BubulleSimple from "../bubulles/BubulleSimple";

export default class DomCopyBubulle extends DomCopy{


    _getColor(){
        let r={
            color1:"FF0000",
            color2:"0000FF",
        };
        let color=this.$dom.closest("[color-theme]").attr("color-theme");
        switch (color) {
            case "blue":
                r.color1="558CDF";
                r.color2="252F84";
                break;
            case "orange":

                r.color1="DF6331";
                r.color2="DC3A45";
                break;
            case "sunrise":
                r.color1="AF3050";
                r.color2="2C2172";
                break;
        }

        return r;
    }

    constructor($dom){
        super($dom);
        console.log("new bubulle");
        /**
         *
         * @type {Page}
         */
        this.page=$dom.closest(".preview").data("page");

        this.color1=this._getColor().color1;
        this.color2=this._getColor().color2;

        let me=this;
        this.sprite=new PIXI.Container();
        this.applyResize=false;

        if(perfs.bubullesZone){
            this.zone=new PIXI.Graphics();
            this.zone.lineStyle(1,0x0000FF,1);
            this.zone.drawRect(0,0,100,100);
            this.sprite.addChild(this.zone);
        }


        this.bubulles=[];
        for(let i=0;i<utils.math.rand(2,3);i++){
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

        let src=LayoutVars.fmkHttpRoot+"/project/_src/pixi/bubulles";
        let trames=[
            `${src}/trames/trame1.png`,
            `${src}/trames/trame2.png`
        ];
        let pleins=[
            `${src}/plein/fill1.png`,
            `${src}/plein/fill2.png`,
            `${src}/plein/fill3.png`,
            `${src}/plein/fill4.png`,
        ];
        let lignes=[
            `${src}/lignes/line1.png`,
            `${src}/lignes/line2.png`,
            `${src}/lignes/line3.png`,
            `${src}/lignes/line4.png`,
        ];
        let geoms=[
            `${src}/geom/disk1.png`,
            `${src}/geom/disk2.png`,
            `${src}/geom/trait1.png`,
            `${src}/geom/circle1.png`,
            `${src}/geom/circle2.png`,
        ];


        /**
         *
         * @type {Bubulle}
         */
        let b=null;
        let r=utils.math.rand(1,9);
        switch (r) {

            case 1:
            case 2:
            case 3:
            case 4:
                b=new BubulleSimple(
                    utils.array.randomEntry(pleins),
                    this.color1,this.color2
                );
                break;

            case 5:
                b=new BubulleSimple(
                    utils.array.randomEntry(lignes),
                    this.color1,this.color2
                );
                break;

            case 6:
            case 7:
                b=new BubulleGFX(
                    utils.array.randomEntry(geoms),
                    this.color1,this.color2
                );
                break;

            case 8:
            case 9:
                b=new BubulleMask(
                    utils.array.randomEntry(pleins),
                    utils.array.randomEntry(trames),
                    this.color1,this.color2
                );
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
    resizeFromDom() {
        super.resizeFromDom();
        console.log("resize bubulle")
        if(perfs.bubullesZone){
            this.zone.clear();
            this.zone.lineStyle(1,0x0000FF,1);
            this.zone.drawRect(0,0,this.w,this.h);
        }

        for(let b of this.bubulles){
            b.limits.right=this.w;
            b.limits.bottom=this.h;
            b.randomXY();
        }
    }


}