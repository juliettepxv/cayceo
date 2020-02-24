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
            "invert(10%) sepia(75%) saturate(3791%) hue-rotate(234deg) brightness(91%) contrast(99%)",
            "invert(20%) sepia(63%) saturate(6797%) hue-rotate(342deg) brightness(103%) contrast(98%)",
            "invert(50%) sepia(41%) saturate(5845%) hue-rotate(345deg) brightness(100%) contrast(103%)",
            "invert(68%) sepia(98%) saturate(5386%) hue-rotate(178deg) brightness(95%) contrast(101%)"
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