export default class SpeedScroll{

    constructor(smoothFactor=5,magnifyFactor=50) {
        let me=this;
        this.active=false;
        /**
         * Position y du scroll
         * @type {number}
         */
        this.y=window.scrollY;
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

        this._yy=0;

        addEventListener("scroll", function(e) {
            me.y=window.scrollY;
        });
        setInterval(function(){
            let sy=(me._yy-me.y)*magnifyFactor;
            me.speedY=(me.speedY*smoothFactor+sy)/(smoothFactor+1);
            me.speedY=utils.math.range(me.speedY,-60,60);
            if(Math.abs(me.speedY)<0.01){
                me.speedY=0;
            }
            me.active = !(me.speedY === 0 && me._oldSpeedY === 0);
            me._oldSpeedY=me.speedY;
            me._yy=me.y;
        },10);
    }

}