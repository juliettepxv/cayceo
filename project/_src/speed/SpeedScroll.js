export default class SpeedScroll{

    constructor(smoothFactor=5,magnifyFactor=50) {
        let me=this;
        this.active=false;
        this.magnifyFactor=magnifyFactor;
        this.smoothFactor=smoothFactor;
        /**
         * Position y du scroll
         * @type {number}
         */
        this.y=window.scrollY;
        this._yy=this.y;
        /**
         * Vitesse du scroll en y
         * @type {number}
         */
        this.speedY=0;
        /**
         *
         * @type {number}
         * @private
         */
        this._oldSpeedY=0;

        if(perfs.scrollWheel){
            window.addEventListener("wheel",function(e){
                let delta=e.deltaY;
                e.preventDefault();
                //delta=utils.math.range(delta,-200,200);
                window.scrollTo(0, Math.round(window.scrollY+delta));
            },{ passive: false });
        }

        addEventListener("scroll", function(e) {
            me.y=window.scrollY;
            if(perfs.domCopy){
                domCopyManager.setScroll();
            }

            //bg.app.render();
            //domCopyManager.positionne();
        });



        bg.app.ticker.add(function(){
            //domCopyManager.setScroll();
            me.update()
        },PIXI.UPDATE_PRIORITY.HIGH);


    }

    update(){
            let me=this;
            let smoothFactor=me.smoothFactor;
            let magnifyFactor=me.magnifyFactor;
            let sy=(me._yy-me.y)*magnifyFactor;
            me.speedY=(me.speedY*smoothFactor+sy)/(smoothFactor+1);
            //me.speedY=utils.math.range(me.speedY,-200,200);
            //me.speedY=utils.math.range(me.speedY,-60,60);
            if(Math.abs(me.speedY)<0.01){
                me.speedY=0;
            }
            me.active = !(me.speedY === 0 && me._oldSpeedY === 0);
            me._oldSpeedY=me.speedY;
            me._yy=me.y;
    }

}