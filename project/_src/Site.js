import NavMenu from "./nav/NavMenu";
import PixiBackground from "./PixiBackground";
import SpeedMouse from "./speed/SpeedMouse";
import SpeedScroll from "./speed/SpeedScroll";
import DomSpeedScroll from "./speed/DomSpeedScroll";
import ScrollActive from "./scroll/ScrollActive";
import Utils from "./utils/Utils";
import DomCopyManager from "./pixi/DomCopy/DomCopyManager";
import {RGBSplitFilter} from '@pixi/filter-rgb-split';
import DataSocialShareClick from "data-social-share-click" ;
import BricksManager from "./bricks/BricksManager";

require("./pixi.boot");
require("./gsap.boot");

window.debug={
    pixiResize:false,
    pixiMouse:false,
    pixiScroll:false
};

window.perfs={
    /**
     * Active ou pas le smooth scroll sur les éléments dom
     * @type {boolean}
     */
    domScroll:true,
    /**
     * Active ou pas la copie d'léléments DOM vers le canvas
     * @type {boolean}
     */
    domCopy:true,
    /**
     * Active ou pas le distort d'images canvas au mouvement de la souris
     */
    mouseTrailerDistortImages:true,
    /**
     * Active ou pas l'effet RGB au scroll
     */
    scrollRGB:true,
    /**
     * Active ou pas l'effet distorsion au scroll
     */
    scrollDistort:true,
};

if(PIXI.utils.isMobile.phone){
    perfs.domScroll=false;
    perfs.mouseTrailerDistortImages=false;
}

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

        window.utils=new Utils();
        window.scrollActive=new ScrollActive();

        me._initListeners();
        //---------------------go------------------------------------------
        me.onDomChange();
        Site.navActive();

        window.navMenu=new NavMenu();
        window.bricksManager=new BricksManager();
        window.speedMouse=new SpeedMouse();
        window.speedScroll=new SpeedScroll(50);
        window.bg=new PixiBackground("#FFFFFF");

        window.bg.app.ticker.minFPS=50;
        window.bg.app.ticker.maxFPS=50;

        //dom speed scroll
        if(perfs.domScroll){
            window.dss=new DomSpeedScroll();
            window.bg.app.ticker.add(function(d){
                dss.updade(d);
            },null,PIXI.UPDATE_PRIORITY.HIGH);
        }

        //copie des objets DOM dans le canvas
        if(perfs.domCopy){
            window.domCopyManager=new DomCopyManager();
            bg.app.stage.addChild(domCopyManager.container);
            domCopyManager.fromDom();
            window.bg.app.ticker.add(function(){
                domCopyManager.container.y=-speedScroll.y;
                domCopyManager.resize();
            },null,PIXI.UPDATE_PRIORITY.NORMAL);
            window.domCopyManager.resize();
        }


        //----------filtres------------------

        if(perfs.mouseTrailerDistortImages){
            //distort mouse move sur les images
            let mouseTrailer=PIXI.Sprite.from(`${LayoutVars.fmkHttpRoot}/project/_src/pixi/filters/radial-500.png`);
            mouseTrailer.pivot.set(250,250);
            bg.app.stage.addChild(mouseTrailer);
            let distortMouse = new PIXI.filters.DisplacementFilter(mouseTrailer);
            distortMouse.scale.x=0;
            distortMouse.scale.y=0;
            distortMouse.padding=200;
            domCopyManager.images.filters.push(distortMouse);
            window.bg.app.ticker.add(function(){
                mouseTrailer.x=speedMouse.x;
                mouseTrailer.y=speedMouse.y;
                distortMouse.scale.x=-speedMouse.speedX * 0.2;
                distortMouse.scale.y=-speedMouse.speedY * 0.2;
            },null,PIXI.UPDATE_PRIORITY.NORMAL);
        }

        if(perfs.scrollRGB){
            let rgbFilter=new RGBSplitFilter();
            domCopyManager.images.filters.push(rgbFilter);
            bg.app.ticker.add(delta =>
                {
                    rgbFilter.red=      [-speedScroll.speedY*0.1,  -speedScroll.speedY*0.2     ];
                    rgbFilter.green=    [speedScroll.speedY*0.1,   speedScroll.speedY*0.3     ];
                    rgbFilter.blue=     [speedScroll.speedY*0.1,   -speedScroll.speedY*0.1    ];
                }
                , null,
                PIXI.UPDATE_PRIORITY.NORMAL
            );
        }

        if(perfs.scrollDistort){
            //distort mouse move sur les images
            let scrollDistortImage=PIXI.TilingSprite.from(`${LayoutVars.fmkHttpRoot}/project/_src/pixi/filters/displacement_map_repeat.jpg`);
            bg.app.stage.addChild(scrollDistortImage);

            let distortScroll = new PIXI.filters.DisplacementFilter(scrollDistortImage);
            distortScroll.scale.x=0;
            distortScroll.scale.y=0;
            distortScroll.padding=200;
            domCopyManager.container.filters.push(distortScroll);
            window.bg.app.ticker.add(function(){
                distortScroll.scale.x=-speedScroll.speedY * 2;
                distortScroll.scale.Y=-speedScroll.speedY * 4;
                scrollDistortImage.width=bg.app.stage.width;
                scrollDistortImage.height=bg.app.stage.height;
            },null,PIXI.UPDATE_PRIORITY.NORMAL);
        }





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
            Site.navActive();
            if(typeof gtag !== 'undefined' && LayoutVars.googleAnalyticsId){
                //hit google analytics
                gtag('config', LayoutVars.googleAnalyticsId, {'page_path': location.pathname});
            }

        });


        $body.on(Pov.events.DOM_CHANGE,function(){
            me.onDomChange();
            if(perfs.domCopy){
                domCopyManager.fromDom();
            }

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
        scrollActive.observe();
    }
}