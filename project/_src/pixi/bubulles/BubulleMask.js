import BubulleSimple from "./BubulleSimple";


export default class BubulleMask extends BubulleSimple{
    constructor(mask,fill,color1,color2) {
        super(mask,color1,color2);
        let me=this;
        this.trameMaskTexture=PIXI.Texture.from(fill);
        this.trameMask=new PIXI.TilingSprite(
            this.trameMaskTexture,
            1000,
            1000,
        );

        this.cont=new PIXI.Sprite;
        this.sprite.addChild(this.cont);
        this.fill.mask=null;
        this.cont.addChild(this.fill);
        this.cont.addChild(this.trameMask);
        this.trameMask.blendMode=PIXI.BLEND_MODES.DST_IN;
        this.sprite.addChild(this.mask);
        this.sprite.pivot.set(100,100);
        this.cont.mask=this.mask;





        if(perfs.bubullesTexture){
            let loop=function(delta){
                if(me.sprite._destroyed){
                    console.warn("sprite destroyed");
                    bg.app.ticker.remove(loop,null,PIXI.UPDATE_PRIORITY.LOW);
                    return;
                }
                if(me.active){
                    me.trameMask.tilePosition.y+=0.5 * delta;
                }
            };
            bg.app.ticker.add(loop,null,PIXI.UPDATE_PRIORITY.LOW);
        }

    }




}