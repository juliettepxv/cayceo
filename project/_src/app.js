//on inclue classiq
import Utils from "./utils/Utils";
require("../../vendor/davidmars/classiq/dist/classiq.boot");
require("../../vendor/davidmars/classiq/Classiq/_src/cq-debug/WebpackVersion");
require("./app.less");
window.utils=new Utils();

import Site from "./Site.js";


Pov.onBodyReady(function(){
    console.log("ready (app)");
    /**
     * La balise où notre histoire se passe
     * @type {JQuery}
     */
    window.$root=$("#root");
    /**
     * Le menu principal
     * @type {JQuery}
     */
    window.$nav=$("#nav");

    /**
     * La balise où sont chargées les pages (elle a aussi l'attribut [history-receiver])
     * @type {JQuery}
     */
    window.$main=$("#main");
    window.$body.addClass(utils.device.isTouchDevice()?"is-touch":"is-not-touch");
    if(utils.device.isTouchDevice()){
        //add a css class when virtual keyboard is open
        let selector="input[type='text'],input[type='number'],input[type='url'],input[type='email'],textarea"
        $(document)
            .on('focus',selector, function(e) {
                window.$body.addClass("virtual-keyboard-open");
            })
            .on('blur', selector, function(e) {
                window.$body.removeClass("virtual-keyboard-open");
        });
    }
    if(utils.device.isIos){
        window.$body.addClass("is-ios");
    }
    if(utils.device.isEdge){
        window.$body.addClass("is-edge");
    }
    if(utils.device.isMsie){
        window.$body.addClass("is-ie");
    }


    /**
     * Bon ça c'est notre vrai main
     * @type {Site}
     */
    window.Site=new Site();





});
