import DomCopy from "./DomCopy";
import * as PIXI from "pixi.js";

export default class DomCopyImg extends DomCopy{
    constructor($dom){
        super($dom);
        let me=this;
        this.sprite=PIXI.Sprite.from(this.$dom.attr("src"));
        this.sprite.texture.baseTexture.on('loaded', function(){
            me.refreshDisplay();
            console.log("dom-copy img loaded")
        });

    }
}