import DomCopy from "./DomCopy";
import * as PIXI from "pixi.js";

import BubulleGFX from "../bubulles/BubulleGFX";
import BubulleMask from "../bubulles/BubulleMask";
import BubulleSimple from "../bubulles/BubulleSimple";

export default class DomCopyBubulle extends DomCopy{



    constructor($dom){
        super($dom);
        //console.log("new bubulle");

        let src=LayoutVars.fmkHttpRoot+"/project/_src/pixi/bubulles";
        this.trames=[
            `${src}/trames/trame1.png`,
            `${src}/trames/trame2.png`
        ];
        this.pleins=[
            `${src}/plein/fill1.png`,
            `${src}/plein/fill2.png`,
            `${src}/plein/fill3.png`,
            `${src}/plein/fill4.png`,
        ];
        this.lignes=[
            `${src}/lignes/line1.png`,
            `${src}/lignes/line2.png`,
            `${src}/lignes/line3.png`,
            `${src}/lignes/line4.png`,
        ];
        this.geoms=[
            `${src}/geom/disk1.png`,
            `${src}/geom/disk2.png`,
            `${src}/geom/trait1.png`,
            `${src}/geom/circle1.png`,
            `${src}/geom/circle2.png`,
        ];


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


        this.zone=new PIXI.Graphics();
        this.sprite.addChild(this.zone);
        if(!perfs.bubullesZone){
            this.zone.visible=false;
        }


        this.bubulles=[];

        let r;
        r=utils.math.rand(0,2)
        //r=2;

        switch (r) {
            case 0:
                this.bubulles.push(this.getBubulleMask());
                this.bubulles.push(this.getBubulleGFX());
                this.bubulles.push(this.getBubulleGFX());
                break;
            case 1:
                this.bubulles.push(this.getBubulleSimple());
                this.bubulles.push(this.getBubulleGFX());
                break;
            case 2:
                this.bubulles.push(this.getBubulleSimpleLigne());
                this.bubulles.push(this.getBubulleGFX());
                this.bubulles.push(this.getBubulleGFX());
                break;

        }


        for(let b of this.bubulles){
            b.container=this;
            this.sprite.addChild(b.sprite);
        }

    }


    getBubulleSimple(){
        return new BubulleSimple(
            utils.array.randomEntry(this.pleins),
            this.color1,this.color2
        );
    }
    getBubulleSimpleLigne(){
        return new BubulleSimple(
            utils.array.randomEntry(this.lignes),
            this.color1,this.color2)
    }
    getBubulleGFX(){
        return new BubulleGFX(
            utils.array.randomEntry(this.geoms),
            this.color1,this.color2
        );
    }
    getBubulleMask(){
        return new BubulleMask(
            utils.array.randomEntry(this.pleins),
            utils.array.randomEntry(this.trames),
            this.color1,this.color2
        );
    }

    get active() {return this._active;}
    set active(value) {
        super.active = value;
        //console.log("active domcopy bubulle",value);
        for(let b of this.bubulles){
            b.active=value;
        }
    }

    _drawZone(){
        this.zone.clear();
        this.zone.lineStyle(1,0x0000FF,1);
        this.zone.drawRect(0,0,this.w,this.h);
    }

    resizeFromDom() {
        super.resizeFromDom();
        console.log("resize bubulle")
        this._drawZone();

        for(let b of this.bubulles){
            //b.randomXY();
        }
    }


    /**
     * Renvoie le jeu de couleurs à utiliser
     * @returns {{color1: string, color2: string}}
     * @private
     */
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


}