export default class Bubulle {

    constructor(color1="D73847",color2="242178") {
        let me=this;
        /**
         *
         * @type {DomCopy}
         */
        this.container=null;
        this._active=false;
        this.color1=color1;
        this.color2=color2;

        //this.color1="FF0000";
        //this.color2="00FF00";

        this.sprite=null;
        this.i=0;
        this.speedX=0;
        this.speedY=0;
        this.speedRotation=0.01;
        setTimeout(function(){
            me._resetX();
            me._resetY();
            me._resetRotation();
            me.randomXY();
        },10);

        this.zone=new PIXI.Graphics();
        if(!perfs.bubullesZone){
            this.zone.visible=false;
        }

        this._startLoop();
    }

    _drawZone(){
        let color=0x00FF00;
        let out=this._isOut();
        switch (out) {
            case "left":
                color=0xFF0000;
                break;
            case "right":
                color=0xFF8800;
                break;
            case "top":
                color=0xFF00FF;
                break;
            case "bottom":
                color=0x00FFFF;
                break;
        }
        this.sprite.addChild(this.zone);
        this.zone.clear();
        this.zone.lineStyle(1,color);
        let b=this.sprite.getLocalBounds ();
        this.zone.drawRect(0,0,b.width,b.height);
        this.zone.beginFill(color);
        this.zone.drawRect(0,0,10,10)

    }
    _stopLoop(){
        //console.log("stop loop")
        bg.app.ticker.remove(this.move,this);
    }
    _startLoop(){
        if(perfs.bubullesMotion) {
            this._stopLoop();
            //console.log("start loop")
            bg.app.ticker.add(this.move, this, PIXI.UPDATE_PRIORITY.LOW);
        }
    }
    _isOut(){
        let contBounds=this.container.zone.getBounds();
        let bounds=this.sprite.getBounds();
        let r={
            t:0,
            l:0,
            b:0,
            r:0
        };
        if(!contBounds.contains(bounds.left,bounds.top)){
            r.l++;
            r.t++;
        }
        if(!contBounds.contains(bounds.left,bounds.bottom)){
            r.l++;
            r.b++;
        }
        if(!contBounds.contains(bounds.right,bounds.top)){
            r.t++;
            r.r++;
        }
        if(!contBounds.contains(bounds.right,bounds.bottom)){
            r.b++;
            r.r++;
        }
        if(r.t===2){
            return "top";
        }
        if(r.r===2){
            return "right";
        }
        if(r.b===2){
            return "bottom";
        }
        if(r.l===2){
            return "left";
        }


        return false;
    }
    move(){
        this.i+=0.02;
        if(this.sprite._destroyed){
            console.warn("sprite destroyed");
            this._stopLoop();
            return;
        }
        this._drawZone();
        this.sprite.x+=this.speedX;
        this.sprite.y+=this.speedY;
        //rotation
        this.sprite.rotation+=this.speedRotation+Math.cos(this.i)*0.0001;
        let out=this._isOut();
        switch (out) {
            case "left":
                this._resetX(true);
                break;
            case "right":
                this._resetX(false);
                break;
            case "top":
                this._resetY(true);
                break;
            case "bottom":
                this._resetY(false);
                break;
        }
        return;


        let contBounds=this.container.zone.getBounds();
        let bounds=this.sprite.getBounds();
        //bouge en x

        //+Math.cos(this.i)*0.1;
        if(bounds.right>contBounds.right && this.speedX > 0){
            this._resetX();
        }
        if(bounds.left<contBounds.left && this.speedX < 0){
            this._resetX();
        }
        //bouge en y

        //+Math.sin(this.i)*0.1
        if(bounds.bottom>contBounds.bottom && this.speedY > 0){
            this._resetY();
        }
        if(bounds.top<contBounds.top && this.speedY < 0){
            this._resetY();
        }


    }

    /**
     * Positionne aléatoirement en x et y
     */
    randomXY(){
        let me=this;
        me.sprite.rotation=0;
        me.sprite.x=utils.math.rand(0,this.container.zone.width - this.sprite.getLocalBounds().width);
        me.sprite.y=utils.math.rand(0,this.container.zone.height - this.sprite.getLocalBounds().height);
    }

    /**
     * Renvoie un cavas dégradé
     * @param from
     * @param to
     * @returns {HTMLCanvasElement}
     */
    gradient(from, to) {
        const c = document.createElement("canvas");
        c.width=1000;
        c.height=1000;
        let x1=utils.math.rand(-100,1000+100);
        let x2=utils.math.rand(-100,1000+100);
        const ctx = c.getContext("2d");
        const grd = ctx.createLinearGradient(x1,0,x2,1000);
        grd.addColorStop(0.0, from);
        grd.addColorStop(1.0, to);
        ctx.fillStyle = grd;
        ctx.fillRect(0,0,1000,1000);
        return c;
    }

    _resetRotation(){
        this.speedRotation=utils.math.rand(0.0005,0.0009,0.0001);
        this.speedRotation=Math.random()>0.5?this.speedRotation:this.speedRotation*-1;
    }
    _resetX(positive=true){
        this.speedX=utils.math.rand(0.05,0.09,0.001);
        if(!positive){
            this.speedX=this.speedX*-1
        }
        this._resetRotation();
    }
    _resetY(positive=true){
        this.speedY=utils.math.rand(0.05,0.09,0.001);
        if(!positive){
            this.speedY=this.speedY*-1
        }
        this._resetRotation();
    }

    get active() {
        return this._active;
    }
    set active(value) {
        this._active = value;
        if(this._active){
            this.randomXY();
            this._startLoop();
        }else{
            this._stopLoop();
        }

    }






}