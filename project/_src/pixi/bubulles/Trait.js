import Bubulle from "./Bubulle";


export default class Trait extends Bubulle{
    constructor() {
        super();
        let me=this;
        //this.sprite=PIXI.Sprite.from("./src/bubulles/1x/a.png");
        this.sprite=PIXI.Sprite.from("./src/bubulles/trait.png");
        this.sprite.anchor.set(0.5);
        this.sprite.tint=this.color1;
    }

    _resetSkew() {
        this.speedSkew.x=this.speedSkew.y=0;
    }


}