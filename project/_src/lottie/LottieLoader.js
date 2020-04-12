window.lottie=require("lottie-web");
/**
 * Permet de charger une animation lottie
 * lottie-loader=''
 * lottie-url='monanim.json'
 * lottie-loop='false'
 * lottie-autoplay='true'
 *
 */
export default class LottieLoader {
    constructor($main){
        this.$main=$main;
        let me=this;
        let url=$main.attr("lottie-url");
        this.autoplay=$main.attr("lottie-autoplay") === "true";
        if(utils.device.isEdge){
            this.autoplay=false;
        }
        this.loop=$main.attr("lottie-loop") === "true";
        this.preserveAspectRatio=$main.attr("lottie-preserve-aspect-ratio");
        this.img=$main.attr("lottie-img");

        //charge le json dynamiquement
        $.getJSON(url, function(json) {
            console.log(json)
           me.animationData=json;
            if(me.img){
                me.animationData.assets[0]["p"]=me.img;
                me.animationData.assets[0]["u"]=document.location.host;
                me.animationData.assets[0]["u"]="";
                console.log(me.animationData.assets[0]["u"])
                console.log("lottie img",me.img)
            }
           me.buildLottie();
        });

        //clean attributes
        $main.removeAttr("lottie-url")
            .removeAttr("lottie-autoplay")
            .removeAttr("lottie-loop")
            .removeAttr("lottie-preserve-aspect-ratio");

    }

    buildLottie(){
        let opt={
            assetsPath:"",
            container: this.$main.get(0), // the dom element that will contain the animation
            renderer: 'svg',
            loop: this.loop,
            autoplay: this.autoplay,
            //path: url // the path to the animation json
            animationData:this.animationData
        };
        if(this.preserveAspectRatio){
            opt.rendererSettings={
                preserveAspectRatio:this.preserveAspectRatio
            }
        }
        let anim=lottie.loadAnimation(opt);

        this.$main.data("lottie",anim);
    }

    static initFromDom(){
        $body.find("[lottie-loader='']").each(function () {
            $(this).attr("lottie-loader","init");
            new LottieLoader($(this));
        });
    }
}
