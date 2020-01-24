import DomCopy from "./DomCopy";
import * as PIXI from "pixi.js";

export default class DomCopySection extends DomCopy{
    constructor($dom){
        super($dom);
        let me=this;
        this.sprite=new PIXI.Container();
        this.applyResize=false;

        this.zone=new PIXI.Graphics();
        this.zone.lineStyle(1,0x00FF00,1);
        this.zone.drawRect(0,0,100,100);

        this.sprite.addChild(this.zone);
    }

    resizeFromDom() {
        super.resizeFromDom();
        this.zone.clear();
        this.zone.lineStyle(1,0x00FF00,1);
        this.zone.drawRect(0,0,this.w,this.h);
    }


}