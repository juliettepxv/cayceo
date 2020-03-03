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
        let url=$main.attr("lottie-url");
        let autoplay=$main.attr("lottie-autoplay") === "true";
        if(utils.device.isEdge){
            autoplay=false;
        }
        let loop=$main.attr("lottie-loop") === "true";
        let preserveAspectRatio=$main.attr("lottie-preserve-aspect-ratio");

        //clean attributes
        $main.removeAttr("lottie-url")
            .removeAttr("lottie-autoplay")
            .removeAttr("lottie-loop")
            .removeAttr("lottie-preserve-aspect-ratio");
        let opt={
            container: $main.get(0), // the dom element that will contain the animation
            renderer: 'svg',
            loop: loop,
            autoplay: autoplay,
            path: url // the path to the animation json
        };
        if(preserveAspectRatio){
            opt.rendererSettings={
                preserveAspectRatio:preserveAspectRatio
            }
        }
        let anim=lottie.loadAnimation(opt);

        $main.data("lottie",anim);
    }
    static initFromDom(){
        $body.find("[lottie-loader='']").each(function () {
            $(this).attr("lottie-loader","init");
            new LottieLoader($(this));
        });
    }
}