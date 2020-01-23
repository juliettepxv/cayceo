export default class SpeedScroll{

    constructor(smoothFactor=20,magnifyFactor=10) {
        let me=this;
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

        this._yy=0;

        addEventListener("scroll", function(e) {
            me.y=window.scrollY;
        });
        setInterval(function(){
            let sy=(me._yy-me.y)*magnifyFactor;
            me.speedY=(me.speedY*smoothFactor+sy)/(smoothFactor+1);
            me._yy=me.y;
        },10);
    }

}