import Bubulle from "./Bubulle";


export default class BubulleSimple extends Bubulle{
    constructor(mask,color1,color2) {
        super(color1,color2);
        let me=this;
        this.sprite=new PIXI.Sprite;
        this.sprite.anchor.set(0.5);
        this.mask=PIXI.Sprite.from(mask);
        const degrade = this.gradient("#"+this.color1,"#"+this.color2);
        this.fill=PIXI.Sprite.from(degrade);
        this.sprite.addChild(this.fill,this.mask);
        this.fill.mask=this.mask;

        this.mask.texture.baseTexture.on('loaded', function(){
            me.fill.width=me.mask.width;
            me.fill.height=me.mask.height;
            //centre l'image
            me.sprite.pivot.set(me.mask.width/2,me.mask.height/2);
            //me.sprite.cacheAsBitmap=true;
        });

    }




}