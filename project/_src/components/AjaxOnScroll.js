export default class AjaxOnScroll {
    constructor($main) {
        let me=this;
        this.$main=$main;
        this.url=$main.attr("ajax-on-scroll");
        $main.removeAttr("ajax-on-scroll");
        $main.on("SCROLL_ACTIVE",function(){
            console.log("charge",me.url);
            me.load();
        })


        //PovApi.getView(url,$main)
    }
    load(){
        let me=this;
        $.ajax({
            dataType: "json",
            url: me.url,
            data: {},
            success: function(e){
                console.log("loaded",e);
                me.$main.replaceWith(e.html)
                Pov.events.dispatchDom($body,Pov.events.DOM_CHANGE);
            }
        });
    }


    static initFromDom(){
        $("[ajax-on-scroll]").each(function(){
            new AjaxOnScroll($(this));
        });
    }
}