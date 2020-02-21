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
        let loop=$main.attr("lottie-loop") === "true";

        //clean attributes
        $main.removeAttr("lottie-url")
            .removeAttr("lottie-autoplay")
            .removeAttr("lottie-loop");
        lottie.loadAnimation({
            container: $main.get(0), // the dom element that will contain the animation
            renderer: 'svg',
            loop: loop,
            autoplay: autoplay,
            path: url // the path to the animation json
        });
    }
    static initFromDom(){
        $body.find("[lottie-loader='']").each(function () {
            $(this).attr("lottie-loader","init");
            new LottieLoader($(this));
        });
    }
}