export default class SpeedMouse{

    constructor() {
        let me=this;
        /**
         * Position x de la souris
         * @type {number}
         */
        this.x=0;
        /**
         * Position y de la souris
         * @type {number}
         */
        this.y=0;
        /**
         * Vitesse de la souris en x
         * @type {number}
         */
        this.speedX=0;
        /**
         * Vitesse de la souris en y
         * @type {number}
         */
        this.speedY=0;

        this._xx=0;
        this._yy=0;

        addEventListener("mousemove", function(e) {
            me.x=e.clientX;
            me.y=e.clientY;
        });
        setInterval(function(){
            let sx=(me._xx-me.x)*10;
            me.speedX=(me.speedX*20+sx)/21;

            let sy=(me._yy-me.y)*10;
            me.speedY=(me.speedY*20+sy)/21;

            me._xx=me.x;
            me._yy=me.y;

        },10);
    }

}