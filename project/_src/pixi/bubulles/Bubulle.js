export default class Bubulle {
    constructor(color1="D73847",color2="242178") {
        let me=this;
        /**
         *
         * @type {DomCopy}
         */
        this.container=null;
        this.active=false;
        this.color1=color1;
        this.color2=color2;

        //this.color1="FF0000";
        //this.color2="00FF00";

        this.sprite=null;
        this.i=0;
        this.speedX=0;
        this.speedY=0;
        this.speedRotation=0.01;
        this.speedSkew={
            x:0,
            y:0
        };
        this.limits={
            left:0,
            top:0,
            right:200,
            bottom:200,
        };

        setTimeout(function(){
            me._resetX();
            me._resetY();
            me._resetRotation();
            me.randomXY();
        },10);

        if(perfs.bubullesMotion){
            bg.app.ticker.add(this.move,this,PIXI.UPDATE_PRIORITY.LOW);
        }

    }

    move(){
        this.i+=0.02;
        if(this.sprite._destroyed){
            console.warn("sprite destroyed");
            bg.app.ticker.remove(this.move,this);
            return;
        }
        this.sprite.x+=this.speedX+Math.cos(this.i)*0.1;
        if( this.sprite.x > this.limits.right && this.speedX > 0){
            this._resetX();
        }
        if( this.sprite.x < this.limits.left && this.speedX < 0){
            this._resetX();
        }

        this.sprite.y+=this.speedY+Math.sin(this.i)*0.1;
        if( this.sprite.y > this.limits.bottom && this.speedY > 0){
            this._resetY();
        }
        if( this.sprite.y < this.limits.top && this.speedY < 0){
            this._resetY();
        }

        //skew
        this.sprite.skew.x+=this.speedSkew.x * Math.cos(this.i);
        if(Math.abs(this.sprite.skew.x)>0.2){
            this.speedSkew.x=this.speedSkew.x *-1;
        }
        this.sprite.skew.y+=this.speedSkew.y * Math.cos(this.i);
        if(Math.abs(this.sprite.skew.y)>0.2){
            this.speedSkew.y=this.speedSkew.y *-1;
        }
        //rotation
        this.sprite.rotation+=this.speedRotation+Math.cos(this.i)*0.0001;

    }

    /**
     * Positionne aléatoirement en x et y
     */
    randomXY(){
        let me=this;
        me.sprite.x=utils.math.rand(me.limits.left,me.limits.right);
        me.sprite.y=utils.math.rand(me.limits.top,me.limits.bottom);
    }

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
        this.speedRotation=utils.math.rand(0.001,0.002,0.0001)*1;
        this.speedRotation=Math.random()>0.5?this.speedRotation:this.speedRotation*-1;
    }
    _resetSkew(){
        this.speedSkew.x=utils.math.rand(0.0001,0.0005,0.00001)*1;
        this.speedSkew.x=Math.random()>0.5?this.speedSkew.x:this.speedSkew.x*-1;
        this.speedSkew.y=utils.math.rand(0.0001,0.0005,5)*1;
        this.speedSkew.y=Math.random()>0.5?this.speedSkew.y:this.speedSkew.y*-1;
    }
    _resetX(){
        this.speedX=utils.math.rand(0.1,0.5,0.01)*1;
        this.speedX=Math.random()>0.5?this.speedX:this.speedX*-1;
        this._resetRotation();
        this._resetSkew();
    }
    _resetY(){
        this.speedY=utils.math.rand(0.1,0.5,0.001)*1;
        this.speedY=Math.random()>0.5?this.speedY:this.speedY*-1;
        this._resetRotation();
        this._resetSkew();
    }






}