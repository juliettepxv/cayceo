require("./scroll-active.less");
/**
 * Permet de gérer les éléments actifs à l'écran ou non et ainsi améliorer les performances
 * ATTENTION ce module a un impact important sur pas mal d'autres modules
 */
export default class ScrollActive {
    constructor() {
        let me=this;
    }

    /**
     * initialise un seul element
     * @param $el
     */
    observeOne($el){
        let me=this;
        if($el.is("[scroll-active-init]")){
            return;
        }
        $el.attr("scroll-active-init","");
        let options = {
            root: null,
            rootMargin: '200px'
        };

        let onChange=function(entries, observer){
            entries.forEach(entry => {
                let active=entry.isIntersecting;
                let $el=$(entry.target);
                if(active){
                    $el.attr("scroll-active","1");
                    $el.trigger("SCROLL_ACTIVE");
                }else{
                    $el.attr("scroll-active","");
                    $el.trigger("SCROLL_INACTIVE")
                }
            });
        };
        let observer = new IntersectionObserver(onChange, options);
        observer.observe($el[0]);
    }
    /**
     * initialise tous les éléments non initialisés
     */
    observe(){
        let me=this;
        $("[scroll-active]").not("[scroll-active-init]").each(function(){
            me.observeOne($(this));
        });
    }


}