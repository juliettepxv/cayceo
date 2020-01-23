export default class PixiBackgrounds {
    constructor() {
        let me=this;
        /**
         *
         * @type {PIXI.Application}
         */
        this.bgApp = new PIXI.Application({
            width: 100,
            height: 100,
            antialias:true
        });
        window.bgApp=this.bgApp;
        me.bgApp.stage.interactive=false;
        me.bgApp.renderer.backgroundColor = 0xFF77FF;
        me.bgApp.renderer.view.style.position = "absolute";
        me.bgApp.renderer.view.style.display = "block";
        me.bgApp.renderer.autoResize = true;
        me.bgApp.renderer.resize(window.innerWidth, window.innerHeight);

        window.addEventListener("resize", function(event){
            me.bgApp.resize();
        });


    }

    /**
     * Rediemensionne canvas
     */
    resize(){
        let me=this;
        me.bgApp.renderer.resize(
            document.body.clientWidth,
            window.innerHeight
        );
    }


}