import NavMenu from "./nav/NavMenu";
import PixiBackground from "./PixiBackground";
import SpeedMouse from "./speed/SpeedMouse";
import SpeedScroll from "./speed/SpeedScroll";
import DomSpeedScroll from "./speed/DomSpeedScroll";
import Utils from "./utils/Utils";

require("./pixi.boot");
require("./gsap.boot");

window.debug={
    pixiResize:false,
    pixiMouse:true,
    pixiScroll:true
};


export default class Site{
    constructor() {
        /**
         *
         * @type {Site}
         */
        let me = this;
        me._initListeners();
        //---------------------go------------------------------------------
        me.onDomChange();
        Site.navActive();
        window.utils=new Utils();
        window.navMenu=new NavMenu();
        window.speedMouse=new SpeedMouse();
        window.speedScroll=new SpeedScroll(50);
        window.bg=new PixiBackground("#FFFFFF");
        //dom speed scroll
        window.dss=new DomSpeedScroll();
        window.bg.app.ticker.add(function(){
            dss.updade();
        },null,PIXI.UPDATE_PRIORITY.HIGH);

    }

    /**
     *
     * @private
     */
    _initListeners() {

        let me=this;
        require("./components/data-zoom-img");
        require("./components/data-is-lang");
        require("./organisms/data-cards-container.js");

        //require("./blocks/FormContact");
        //FormContact.initFromDom();

        //quand on change d'url.............
        $body.on(EVENTS.HISTORY_CHANGE_URL,function(){
            $body.attr("data-page-transition-state","start");
            //stope en attendant que la transition soit finie
            PovHistory.readyToinject=false;
            //dit qu'on est prêt à afficher la page (s'assure qu'on reste au moins une seconde sur l'écran de transition)
            setTimeout(function(){
                PovHistory.readyToinject=true;
            },500);
            navMenu.close();
        });

        //changement d'url et HTML injecté
        $body.on(EVENTS.HISTORY_CHANGE_URL_LOADED_INJECTED,function(){
            $body.attr("data-page-transition-state","end");
            me.onDomChange();
            //scroll top
            $(window).scrollTop(0);
            Site.navActive();

            if(typeof gtag !== 'undefined' && LayoutVars.googleAnalyticsId){
                //hit google analytics
                gtag('config', LayoutVars.googleAnalyticsId, {'page_path': location.pathname});
            }

        });


        $body.on(Pov.events.DOM_CHANGE,function(){
            me.onDomChange();
        });





    }

    /**
     * Selectionne / déselectionne l'item de nav de la page en cours
     */
    static navActive(){
        $("[data-href-uid]").removeClass("active");
        $("[data-href-uid='"+PovHistory.currentPageInfo.uid+"']").addClass("active");
    }

    /**
     * Initialisations d'objets dom
     */
    onDomChange(){
        //ou pas :)
    }
}