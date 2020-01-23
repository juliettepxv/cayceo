/**
 * Permet de gérer les éléments actifs à l'écran ou non et ainsi améliorer les performances
 */
export default class ScrollObserve {
    constructor() {
        let me=this;
    }

    observe(selector){
        let me=this;
        let options = {
            root: null,
            rootMargin: '0px'
        };
        $(selector).each(function(){
            let observer = new IntersectionObserver(me.onChange, options);
            observer.observe($(this)[0]);
        });

    }

    onChange(entries, observer){
        entries.forEach(entry => {
            let active=entry.isIntersecting;
            let $el=$(entry.target);
            if(active){
                $el.addClass("is-active");
            }else{
                $el.removeClass("is-active");
            }
            /**
             *
             * @type {DomCopy}
             */
            let domCopy=$el.data("domCopy");
            //console.log("active dom",$el);
            if(domCopy){
                domCopy.active=active;
            }
            //console.log("obj",entry.isIntersecting,entry.target);
            // chaque élément de entries correspond à une variation
            // d'intersection pour un des éléments cible:
            //   entry.boundingClientRect
            //   entry.intersectionRatio
            //   entry.intersectionRect
            //   entry.isIntersecting
            //   entry.rootBounds
            //   entry.target
            //   entry.time
        });
    }
}