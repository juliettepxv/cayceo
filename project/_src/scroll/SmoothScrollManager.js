require("./SmoothScroll");

export default class SmoothScrollManager {
    constructor() {
        let me=this;
        this.scroller = new SmoothScroll({
            target: document.getElementById("main"), // element container to scroll
            scrollEase: 0.05,
        });

        //return;

        let $ss=$("[ss]");

        this.scroller.emitter.on("SCROLL",function(){
            //console.log("spreed",scroller.currentScroll,scroller.speed);
            $ss.filter("[scroll-active='1'] [ss],[scroll-active='1'][ss]").each(function(){
                let $el=$(this);
                let ss=$el.attr("ss");
                let y=me.scroller.speed*ss*-0.6;
                //gsap.set($el,{y:y})
                $el[0].style.transform = "translate3d(0px," + y + "px,0px)";
            })

        })
    }
}