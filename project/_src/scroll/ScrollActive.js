require("./scroll-active.less");
/**
 * Permet de gérer les éléments actifs à l'écran ou non et ainsi améliorer les performances
 * ATTENTION ce module a un impact important sur pas mal d'autres modules
 */
export default class ScrollActive {
    constructor() {
        let me=this;
    }

    observe(){
        let me=this;
        let options = {
            root: null,
            rootMargin: '200px'
        };
        $("[scroll-active]").not("[scroll-active-init]").each(function(){
            let $el=$(this);
            $el.attr("scroll-active-init","");
            let observer = new IntersectionObserver(me.onChange, options);
            observer.observe($el[0]);
        });

    }

    onChange(entries, observer){
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
    }
}