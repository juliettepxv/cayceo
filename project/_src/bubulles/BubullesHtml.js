require("./bubulles.less");
require("./lottie/lottieColors");

export default class BubullesHtml{
    constructor() {
        /**
         * Permet de charger les bubulles par cycles et non pas en random total
         * @private
         * @type {{orange: number, sunrise: number, blue: number}}
         */
        this.counters={
            "blue":utils.math.rand(0,lottieColors["blue"].length),
            "orange":utils.math.rand(0,lottieColors["orange"].length),
            "sunrise":utils.math.rand(0,lottieColors["sunrise"].length),
        }
    }

    /**
     * Obtenir l'identifiant couleur de l'objet dom
     * @param $el
     * @returns {Object|Undefined|*|null|string|undefined}
     * @private
     */
    _getColor($el){
        let color=$el.closest("[color-theme]").attr("color-theme");
        if(!color){
            color="orange";
        }
        return color;
    }

    /**
     * Renvoie l'url d'un fichier json aléatoire en fonction de la couleur
     * @param color
     * @returns {string}
     * @private
     */
    _getLottieColorFile(color){
        this.counters[color]++;
        if(this.counters[color]>=lottieColors[color].length){
            this.counters[color]=0;
        }
        let f=lottieColors[color][this.counters[color]];
        return `${LayoutVars.fmkHttpRoot}/project/_src/bubulles/lottie/${f}.json`;
    }

    fromDom(){
        let me=this;
        $("[bubulles-html]").not("[bubulles-html-init]").each(function(){
            let $el=$(this);
            $el.attr("bubulles-html-init","1");

            let anim=lottie.loadAnimation({
                container: $(this).get(0), // the dom element that will contain the animation
                renderer: utils.device.isEdge?"canvas":"svg",
                loop: true,
                autoplay: false,
                path: me._getLottieColorFile(me._getColor($el)) // the path to the animation json
            });
            gsap.set($el,{rotate:utils.math.rand(0,360,90)})

            let onChange=function(entries, observer){
                entries.forEach(entry => {
                    let active=entry.isIntersecting;
                    if(active){
                        //if(!utils.device.isEdge){
                            anim.play();
                        //}

                    }else{
                        anim.pause();
                    }
                });
            };
            let observer = new IntersectionObserver(onChange, {});
            observer.observe($el[0]);
        });
    }
}