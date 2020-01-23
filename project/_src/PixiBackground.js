require("./pixi-background.less");
/**
 * Une app canvas PIXI qui est en fond de page
 */
export default class PixiBackgrounds {
    constructor(backgroundColor) {
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

        me.resize();

    }

    /**
     * Rediemensionne canvas
     */
    resize(){
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