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
