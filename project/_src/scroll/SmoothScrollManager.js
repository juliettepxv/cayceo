require("./SmoothScroll");

export default class SmoothScrollManager {
    constructor() {
        let me=this;
        /**
         * liste des objets dom qui prennent du paralax
         * @type {null}
         */
        this.$ss=null;

        this.scroller = new SmoothScroll({
            target: document.getElementById("main"), // element container to scroll
            scrollEase: 0.05,
        });


        this.scroller.emitter.on("SCROLL",function(){
            //console.log("spreed",scroller.currentScroll,scroller.speed);
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

    initFromDom(){
        this.$ss=$("[ss]");
    }

}