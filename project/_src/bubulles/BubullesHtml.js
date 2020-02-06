require("./bubulles.less");
require("./lottie/lottieColors");

export default class BubullesHtml{
    constructor() {
        
    }

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
        return `${LayoutVars.fmkHttpRoot}/project/_src/bubulles/lottie/${utils.array.randomEntry(lottieColors[color])}.json`;
    }

    fromDom(){
        let me=this;
        $("[bubulles-html]").not("[bubulles-html-init]").each(function(){
            let $el=$(this);
            $el.attr("bubulles-html-init","1");

            let anim=lottie.loadAnimation({
                container: $(this).get(0), // the dom element that will contain the animation
                renderer: 'svg',
                loop: true,
                autoplay: false,
                path: me._getLottieColorFile(me._getColor($el)) // the path to the animation json
            });
            let onChange=function(entries, observer){
                entries.forEach(entry => {
                    let active=entry.isIntersecting;
                    if(active){
                        anim.play();
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