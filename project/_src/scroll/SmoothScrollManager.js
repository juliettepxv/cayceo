require("./SmoothScroll");

export default class SmoothScrollManager {
    constructor(enabled=true) {
        let me=this;

        this.options={
            enabled:enabled,
            parrallaxElements:true,
        };

        /**
         * liste des objets dom qui prennent du paralax
         * @type {null}
         */
        this.$ss=null;

        if(!this.options.enabled){
            return;
        }
        $body.addClass("smooth-scroll")
        this.scroller = new SmoothScroll({
            target: document.getElementById("main"), // element container to scroll
            scrollEase: 0.05,
        });


        this.scroller.emitter.on("SCROLL",function(){
            //console.log("spreed",scroller.currentScroll,scroller.speed);
            if(!me.options.parrallaxElements){
                return;
            }
            if(me.$ss){
                me.$ss.filter("[scroll-active='1'] [ss],[scroll-active='1'][ss]").each(function(){
                    let $el=$(this);
                    let ss=$el.attr("ss");
                    let y=me.scroller.speed*ss*-0.6;
                    //gsap.set($el,{y:y})
                    $el[0].style.transform = "translate3d(0px," + y + "px,0px)";
                })
            }

        });
    }

    /**
     * Recalcule le smooth scroll
     */
    refresh(){
        if(this.scroller){
            this.scroller._onResize();
            this.scroller._update();
        }
    }

    initFromDom(){
        this.$ss=$("[ss]");

        let observerOptions = {
            root: null,
            rootMargin: "-200px 0px -00px 0px",
            threshold: [0.0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0]
        };

        let $pllxContainers=$("[pllx-container='']");
        let $img=$pllxContainers.find(">img");
        $pllxContainers.each(function(){
            let $el=$(this);
            $el.attr("pllx-container","1");
            let onChange=function(entries){
                entries.forEach(function(entry) {
                    let box = entry.target;
                    console.log(entry.intersectionRatio);
                    let y=utils.math.ratio(entry.intersectionRatio,1,0,0,$pllxContainers.height()-$img.height());
                    gsap.to($img,{duration:0.1,y:y})
                });
            };
            let observer = new IntersectionObserver(onChange, observerOptions);
            observer.observe($el[0]);
        });
        this.refresh();

    }

}