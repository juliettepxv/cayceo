export default class PageTransition {
    constructor() {
        this.anim=lottie.loadAnimation({
            container: $("#page-transition").get(0), // the dom element that will contain the animation
            renderer: 'svg',
            rendererSettings: {
                preserveAspectRatio : 'none',
            },
            loop: false,
            autoplay: false,
            path: LayoutVars.fmkHttpRoot+"/project/_src/layout/transition.liquid.json" // the path to the animation json
        });

        this.randsColor=[
            "hue-rotate(100deg) brightness(1.5)",
            "hue-rotate(35deg)  brightness(1.5)",
            "hue-rotate(86deg)  brightness(1.5)",
            "hue-rotate(133deg) brightness(2.5)"
        ]

    }

    /**
     * Attribue une couleur aléatoire à l'animation
     * @private
     */
    _color(){
        gsap.set($("#page-transition"),{filter:utils.array.randomEntry(this.randsColor)});
    }

    /**
     * Fit tourner symetriquement l'animation pour qu'elle soit moins répétitive
     * @private
     */
    _rotate(){
          gsap.set($("#page-transition"),{rotation:utils.math.rand(0,360,180)});
          gsap.set($("#page-transition"),{rotateX:utils.math.rand(0,360,180)});
          gsap.set($("#page-transition"),{rotateY:utils.math.rand(0,360,180)});

    }

    /**
     * Masque la page
     */
    cover(){
        //lottie
        this._color();
        this._rotate();
        this.anim.setDirection(1);
        this.anim.goToAndPlay(1,true);
        //css
        $body.attr("data-page-transition-state","start");
    }

    /**
     * Démasque la page
     */
    uncover(){
        //lottie
        this._rotate();
        this.anim.setDirection(-1);
        this.anim.play();
        //css
        $body.attr("data-page-transition-state","end");
        setTimeout(function(){
            $body.removeAttr("data-page-transition-state");
        },1000);
    }

}