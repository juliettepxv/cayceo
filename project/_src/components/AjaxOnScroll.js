export default class AjaxOnScroll {
    constructor($main) {
        if(LayoutVars.wysiwyg){return;}

        let me=this;
        this.$main=$main;
        this.url=$main.attr("ajax-on-scroll");
        let yetLoaded=$(`[is-url='${this.url}']`).length;
        if(yetLoaded){
            console.warn("all loaded");
            $main.remove();
            $body.attr("show-footer","1");
            return;
        }
        this.delay=$main.attr("ajax-on-scroll-delay");
        $main.removeAttr("ajax-on-scroll");
        $main.removeAttr("ajax-on-scroll-delay");
        me.$main.attr("ajax-on-scroll-state","wait");
        //initialise le scroll
        let onChange=function(entries, observer){
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    me.load();
                }
            });
        };
        let observer = new IntersectionObserver(onChange, {});
        observer.observe($main[0]);
    }
    load(){
        let me=this;
        me.$main.attr("ajax-on-scroll-state","wait-loading");
        setTimeout(function(){
            me.$main.attr("ajax-on-scroll-state","loading");
            $.ajax({
                dataType: "json",
                url: `${me.url}?povHistory=true"`,
                data: {},
                success: function(e){
                    console.log("loaded",e);
                    me.$main.replaceWith(e.html);
                    me.$main.attr("is-url",me.url);
                    Pov.events.dispatchDom($body,Pov.events.DOM_CHANGE);
                    PovHistory.setMeta(e.json.meta);
                    history.replaceState({},e.json.meta.title,me.url);

                }
            });
        },me.delay)

    }
    static initFromDom(){
        $("[ajax-on-scroll]").each(function(){
            let $el=$(this);
            new AjaxOnScroll($el);
        });
    }
}
