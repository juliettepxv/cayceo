import PanelMainNav from "./nav/PanelMainNav";
import ScrollActive from "./scroll/ScrollActive";
import Utils from "./utils/Utils";
import DataSocialShareClick from "data-social-share-click" ;
import BricksManager from "./bricks/BricksManager";
import SmoothScrollManager from "./scroll/SmoothScrollManager";
import PageTransition from "./page-transition/PageTranstion";
import LottieLoader from "./lottie/LottieLoader";
import AjaxOnScroll from "./components/AjaxOnScroll";
import Form from "./blocks/form/Form";
import PanelManager from "./components/panel/PanelManager";
import ProfilForms from "./profil/ProfilForms";
import Api from "./api/Api";
import ApiMe from "./api/ApiMe";
import ApiShop from "./api/ApiShop";
window.lottie=require("lottie-web");
window.utils=new Utils();
require("./gsap.boot");


if(LayoutVars.wysiwyg===true){

}

export default class Site{
    constructor() {
        /**
         *
         * @type {Site}
         */
        let me = this;

        //api stuff
        require("./api/api-click.js");
        window.api=new Api();
        window.api.me=new ApiMe();
        window.api.shop=new ApiShop();

        window.smoothScrollManager=new SmoothScrollManager(!utils.device.isEdge);
        window.scrollActive=new ScrollActive();
        window.navMenu=new PanelMainNav();
        window.pageTransition=new PageTransition();
        window.panels=new PanelManager();

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
        ProfilForms.initFromDom();
        $body.attr("page-type",PovHistory.currentPageInfo.recordType);
        if(PovHistory.currentPageInfo.recordType==="project"){
            $body.attr("show-footer","0");
        }
        LottieLoader.initFromDom();
        scrollActive.observe();
        smoothScrollManager.initFromDom();
        panels.initFromDom();
        Form.fromDom();
        AjaxOnScroll.initFromDom();

    }
}