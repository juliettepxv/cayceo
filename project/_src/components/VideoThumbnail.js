require("./video-thumbnail.less");
export default class VideoThumbnail {

    constructor() {

    }

    fromDom(){
        let me=this;
        this.$all().not("[video-thumbnail='init']").each(function(){
            let $el=$(this);
            $el.attr("video-thumbnail","init");

            /*
            $el.on("mouseenter",function(){
                me.play($(this));
            });
            $el.on("mouseleave",function(){
                me.pause($(this))
            });
            */

            //if(!utils.device.isHoverCapable()){
            $el.on("SCROLL_ACTIVE",function(){
                me.play($(this))
            });
            $el.on("SCROLL_INACTIVE",function(){
                me.pause($(this))
            });
            //}

        })
    }

    play($el){
        $el.attr("playing","1");
        $el.find("video")[0].play();
    }
    pause($el){
        $el.attr("playing","");
        $el.find("video")[0].pause();
    }

    stopAll(){
        let me=this;
        this.$playing().each(function(){
            me.pause($(this));
        })
    }

    $all(){
        return $("[video-thumbnail]");
    }
    $playing(){
        return this.$all().filter("[playing='1']");
    }
}