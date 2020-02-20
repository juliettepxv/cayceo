import NavMenu from "./nav/NavMenu";
import PixiBackground from "./PixiBackground";
import SpeedMouse from "./speed/SpeedMouse";
import SpeedScroll from "./speed/SpeedScroll";
import DomSpeedScroll from "./speed/DomSpeedScroll";
import DomCopyManager from "./pixi/DomCopy/DomCopyManager";
import {RGBSplitFilter} from '@pixi/filter-rgb-split';
import ScrollActive from "./scroll/ScrollActive";
import Utils from "./utils/Utils";
import DataSocialShareClick from "data-social-share-click" ;
import BricksManager from "./bricks/BricksManager";
import BubullesHtml from "./bubulles/BubullesHtml";
import VideoThumbnail from "./components/VideoThumbnail";
import SmoothScrollManager from "./scroll/SmoothScrollManager";
window.lottie=require("lottie-web");

//require("./pixi.boot");
require("./gsap.boot");

window.debug={
    pixiResize:false,
    pixiMouse:false,
    pixiScroll:false
};

window.perfs={
    scrollWheel:false,
    /**
     * Active ou pas le smooth scroll sur les éléments dom
     * @type {boolean}
     */
    domScroll:false,
    /**
     * Active ou pas la copie d'léléments DOM vers le canvas
     * @type {boolean}
     */
    domCopy:false,
    /**
     * Active ou pas le distort d'images canvas au mouvement de la souris
     */
    mouseTrailerDistortImages:false,
    /**
     * Active ou pas l'effet RGB au scroll
     */
    scrollRGB:false,
    /**
     * Active ou pas l'effet distorsion au scroll
     */
    scrollDistort:false,
    /**
     * Active ou pas le mouvement des bubulles
     */
    bubullesMotion:false,
    /**
     * Active ou pas le mouvement des textures
     */
    bubullesTexture:false,
    /**
     * Affiche la zone des bubulles ou pas
     */
    bubullesZone:false,


};
/*
if(PIXI.utils.isMobile.phone){
    perfs.domScroll=false;
    perfs.mouseTrailerDistortImages=false;
}
*/

if(LayoutVars.wysiwyg===true){
    perfs.domCopy=false;
    perfs.domScroll=false;
    perfs.mouseTrailerDistortImages=false;
    perfs.scrollRGB=false;
    perfs.scrollDistort=false;
}


export default class Site{
    constructor() {
        /**
         *
         * @type {Site}
         */
        let me = this;

        window.ssm=new SmoothScrollManager();

        window.utils=new Utils();
        window.scrollActive=new ScrollActive();
        window.bubullesHtml=new BubullesHtml();
        window.videoThumbnail=new VideoThumbnail();
        window.navMenu=new NavMenu();
        me._initListeners();
        //---------------------go------------------------------------------
        me.onDomChange();
        window.bricksManager=new BricksManager();

    }

    /**
     *
     * @private
     */
    _initListeners() {

        let me=this;
        require("./components/data-zoom-img");
        require("./components/data-is-lang");
        //require("./organisms/data-cards-container.js");
        require("./nav/nav-scroll-up-down");

        let socialShares=new DataSocialShareClick();
        socialShares.listenClicks();



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
            setTimeout(function(){
                $body.removeAttr("data-page-transition-state");
            },1000)
            me.onDomChange();
            //scroll top
            $(window).scrollTop(0);
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
     * Initialisations d'objets dom
     */
    onDomChange(){
        videoThumbnail.fromDom();
        bubullesHtml.fromDom();
        scrollActive.observe();
        ssm.initFromDom();
        navMenu.initFromDom();
    }
}