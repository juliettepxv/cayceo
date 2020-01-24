import DomCopy from "./DomCopy";
import * as PIXI from "pixi.js";

export default class DomCopyImg extends DomCopy{
    constructor($dom){
        super($dom);
        let me=this;
        me.applyResize=false;

        this.sprite=new PIXI.Container();
        this.mask=new PIXI.Graphics();
        this.img=PIXI.Sprite.from(this.$dom.attr("src"));
        this.sprite.addChild(this.img,this.mask);
        this.mask.beginFill(0Xff0000,0.5);
        this.mask.drawRect(0,0,100,100);
        this.img.mask=this.mask;
        this.img.texture.baseTexture.scaleMode=PIXI.SCALE_MODES.LINEAR;
        this.img.texture.baseTexture.on('loaded', function(){
            me.resizeFromDom();
            me.positionFromDom();
        });
    }

    resizeFromDom() {
        let me=this;
        super.resizeFromDom();
        me.mask.width=me.w;
        me.mask.height=me.h;
        let imageRatio = me.img.texture.baseTexture.width / me.img.texture.baseTexture.height;
        let containerRatio = me.w / me.h;
        me.img.scale.set(1,1);
        if(containerRatio > imageRatio) {
            me.img.height = Math.floor(me.img.height / (me.img.width / me.w));
            me.img.width = Math.floor(me.w);
            me.img.position.x = 0;
            me.img.position.y = Math.floor((me.h - me.img.height) / 2);
        }else{
            me.img.width = Math.floor(me.img.width / (me.img.height / me.h));
            me.img.height = Math.floor(me.h);
            me.img.position.y = 0;
            me.img.position.x = Math.floor((me.w - me.img.width) / 2);
        }
    }
}