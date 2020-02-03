require("./pixi-background.less");
/**
 * Une app canvas PIXI qui est en fond de page
 */
export default class PixiBackgrounds {
    constructor(backgroundColor="#EEFFEE") {
        let bgColor=PIXI.utils.string2hex(backgroundColor);
        console.log(bgColor)
        let me=this;
        /**
         * Element qui contient le canvas
         * @type {jQuery|HTMLElement}
         */
        this.$dom=$("<div class='pixi-background'></div>");

        /**
         *
         * @type {PIXI.Application}
         */
        let app = this.app  = new PIXI.Application({
            width: 100,
            height: 100,
            antialias:true
        });
        app.stage.interactive=false;
        app.renderer.backgroundColor = bgColor;
        app.renderer.view.style.position = "absolute";
        app.renderer.view.style.display = "block";
        app.renderer.autoResize = true;
        app.renderer.resize(window.innerWidth, window.innerHeight);
        $body.append(me.$dom);
        this.$dom[0].appendChild(app.view);
        window.addEventListener("resize", function(event){
            me.resize();
        });
        if(debug.pixiResize){
            this.cadre=new PIXI.Graphics();
            app.stage.addChild(this.cadre);
        }
        if(debug.pixiMouse){
            this.mouse=new PIXI.Graphics();
            this.mouse.beginFill(0xEEEEEE);
            this.mouse.drawCircle(-0,-0,10);
            this.app.stage.addChild(this.mouse);

            this.mouse2=new PIXI.Graphics();
            this.mouse2.beginFill(0x000000);
            this.mouse2.drawCircle(-0,-0,5);
            this.app.stage.addChild(this.mouse2);

            this.app.ticker.add(function(){
                me.mouse.x=speedMouse.x;
                me.mouse.y=speedMouse.y;
                me.mouse2.x=speedMouse.x + speedMouse.speedX;
                me.mouse2.y=speedMouse.y + speedMouse.speedY;
            },null,PIXI.UPDATE_PRIORITY.HIGH);
        }
        me.resize();
    }

    /**
     * Redimensionne canvas
     */
    resize(){
        console.log("resize canvas");
        let me=this;
        let w=document.body.clientWidth;
        let h=window.innerHeight;
        me.app.renderer.resize(w,h);
        if(debug.pixiResize) {
            this.cadre.clear();
            this.cadre.lineStyle(1, 0x000000, 1, 0);
            this.cadre.drawRect(10, 10, w - 20, h - 20);
        }
    }


}