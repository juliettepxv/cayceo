export default class NavMenu{
    constructor() {
        let me=this;
        $body.on("click","[nav-menu-click='toggle']",function(){
            me.toggle()
        });

        this.anim=lottie.loadAnimation({
            container: $("#nav-content .background").get(0), // the dom element that will contain the animation
            renderer: 'svg',
            rendererSettings: {
                preserveAspectRatio : 'none',
            },
            loop: false,
            autoplay: false,
            path: LayoutVars.fmkHttpRoot+"/project/_src/layout/transition.liquid.json" // the path to the animation json
        });
        this.logo=lottie.loadAnimation({
            container: $("#nav .logo .w").get(0), // the dom element that will contain the animation
            renderer: 'svg',
            rendererSettings: {
                //preserveAspectRatio : "xMidYMin meet"
                preserveAspectRatio : "xMidYMid meet"
            },
            loop: true,
            autoplay: true,
            path: LayoutVars.fmkHttpRoot+"/project/_src/nav/logo.lottie.json" // the path to the animation json
        });



    }

    initFromDom(){
        let $logo=$("#nav .logo");
        let $bubulles=$("#nav .bubulles");
        let $logoPlaceHolder=$(".big-logo-placeholder").not(".init");
        let onChange=function(entries, observer){
            entries.forEach(entry => {
                let active=entry.isIntersecting;
                if(active){
                    //$logo.addClass("big");
                    $bubulles.addClass("big");
                    gsap.to($logo.find(".w"),0.5,{height:$("#nav-bar").height()*4,y:100,duration:0.5})
                }else{
                   //$logo.removeClass("big");
                    gsap.to($logo.find(".w"),0.5,{height:$("#nav-bar").height(),y:0,duration:0.5})
                    $bubulles.removeClass("big");
                }
            });
        };
        if($logoPlaceHolder.length){
            $logoPlaceHolder.addClass("init");
            let observer = new IntersectionObserver(onChange, {
                root: null,
                rootMargin: '100px'
            });
            observer.observe($logoPlaceHolder[0]);
        }
    }

    open(){
        console.log("open")
        $body.addClass("nav-open");
        this.anim.setDirection(1);
        this.anim.goToAndPlay(1,true);

    }
    close(){
        console.log("close")
        $body.removeClass("nav-open");
        this.anim.setDirection(-1);
        this.anim.play();

    }
    toggle(){
        if($body.is(".nav-open")){
            this.close();
        }else{
            this.open();
        }
        //$body.toggleClass("nav-open");
    }
}
