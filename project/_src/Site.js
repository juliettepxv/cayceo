import NavMenu from "./nav/NavMenu";
import ScrollActive from "./scroll/ScrollActive";
import Utils from "./utils/Utils";
import DataSocialShareClick from "data-social-share-click" ;
import BricksManager from "./bricks/BricksManager";
import BubullesHtml from "./bubulles/BubullesHtml";
import SmoothScrollManager from "./scroll/SmoothScrollManager";
import PageTransition from "./page-transition/PageTranstion";
import LottieLoader from "./lottie/LottieLoader";
import AjaxOnScroll from "./components/AjaxOnScroll";
import Form from "./blocks/form/Form";
window.lottie=require("lottie-web");
window.utils=new Utils();
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

        window.smoothScrollManager=new SmoothScrollManager(!utils.device.isEdge);
        window.scrollActive=new ScrollActive();
        window.bubullesHtml=new BubullesHtml();
        window.navMenu=new NavMenu();
        window.pageTransition=new PageTransition();
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

        //gestion de ce qui se passe quand un element est visible ou non
        $body.on("SCROLL_INACTIVE SCROLL_ACTIVE",function(e){
            if($(e.target).is("video")){
                let $vdo=$(e.target);
                let vdo=$vdo[0];
                if(e.type==="SCROLL_INACTIVE"){
                    vdo.pause();
                }else{
                    let playPromise = vdo.play();
                    if (playPromise !== undefined) {
                        playPromise.then(_ => {
                            vdo.play();
                        })
                        .catch(error => {
                            if(!$vdo.attr("muted")){
                                vdo.muted=true;
                            }
                            vdo.play();
                        });
                    }
                }
            }
        });




        //require("./blocks/FormContact");
        //FormContact.initFromDom();

        //quand on change d'url.............
        $body.on(EVENTS.HISTORY_CHANGE_URL,function(){
            pageTransition.cover();
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
            me.onDomChange();

            //scroll top
            $(window).scrollTop(0);

            //google analytics
            if(typeof gtag !== 'undefined' && LayoutVars.googleAnalyticsId){
                //hit google analytics
                gtag('config', LayoutVars.googleAnalyticsId, {'page_path': location.pathname});
            }
            //transition
            setTimeout(function(){
                //timeout pour éviter les perfs
                pageTransition.uncover();
            },1000*0.5);

        });

        $body.on(Pov.events.DOM_CHANGE,function(){
            me.onDomChange();
        });



    }

    /**
     * Initialisations d'objets dom
     */
    onDomChange(){
        $body.attr("page-type",PovHistory.currentPageInfo.recordType);
        if(PovHistory.currentPageInfo.recordType==="project"){
            $body.attr("show-footer","0");
        }
        LottieLoader.initFromDom();
        bubullesHtml.fromDom();
        scrollActive.observe();
        smoothScrollManager.initFromDom();
        navMenu.initFromDom();
        Form.fromDom();
        AjaxOnScroll.initFromDom();

    }
}