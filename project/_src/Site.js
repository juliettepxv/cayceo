//core
import Utils from "./utils/Utils";
window.utils=new Utils();
require("./gsap.boot");
import LottieLoader from "./lottie/LottieLoader";
window.lottie=require("lottie-web");
//ui
import Form from "./blocks/form/Form";
import PanelManager from "./components/panel/PanelManager";
import PanelMainNav from "./nav/PanelMainNav";
import BricksManager from "./bricks/BricksManager";
import ScrollActive from "./scroll/ScrollActive";
import DataSocialShareClick from "data-social-share-click" ;
import PageTransition from "./page-transition/PageTranstion";
import AjaxOnScroll from "./components/AjaxOnScroll";


export default class Site{
    constructor() {
        /**
         *
         * @type {Site}
         */
        let me = this;

        //window.smoothScrollManager=new SmoothScrollManager(perfConf.smoothScroll.active);
        window.scrollActive=new ScrollActive();
        window.navMenu=new PanelMainNav();
        window.pageTransition=new PageTransition();
        window.panels=new PanelManager();

        me._initListeners();
        //---------------------go------------------------------------------
        me.onDomChange();
        //window.bricksManager=new BricksManager();

    }

    /**
     *
     * @private
     */
    _initListeners() {

        let me=this;

        //profil
        require("../../options/profile/listen-forms");

        require("./components/data-zoom-img");
        require("./components/data-is-lang");
        //require("./organisms/data-cards-container.js");

        //ajoute scroll-dir= up ou down sur body
        require("./scroll/scroll-dir");
        //ajoute scroll-is-top=true sur body quand on est en haut de page
        require("./scroll/scroll-is-top");
        //masque la nav quand on scrolle et lé réafiche quand on remonte
        require("./nav/nav-scroll-up-down.less");

        let socialShares=new DataSocialShareClick();
        socialShares.listenClicks();

        //gestion de ce qui se passe quand un element est visible ou non
        $body.on("SCROLL_INACTIVE SCROLL_ACTIVE",function(e){
            let $target=$(e.target)
            if($target.is("video")){
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
                    if($vdo.is("[onlyoneplaying]")){
                        $("video[onlyoneplaying]").not($vdo).each(function(){
                            $(this)[0].pause();
                        })
                    }
                }
            }

            //changement d'url au scroll
            if($target.is("[is-url]")){
                if(e.type==="SCROLL_ACTIVE") {
                    document.title=$target.attr("title");
                    history.replaceState({}, $target.attr("title"), $target.attr("is-url"));
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
        scrollActive.observe();
        panels.initFromDom();
        Form.fromDom();
        AjaxOnScroll.initFromDom();

    }
}