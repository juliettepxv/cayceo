require("./bubulles.less");

export default class BubullesHtml{
    constructor() {

    }

    fromDom(){
        $("[bubulles-html]").not("[bubulles-html-init]").each(function(){
            let $el=$(this);
            $el.attr("bubulles-html-init","1");
            let color=$el.closest("[color-theme]").attr("color-theme");
            $el.text(color);
            let svgUrl=null;
            if(color){
                svgUrl=`${LayoutVars.fmkHttpRoot}/project/_src/bubulles/svg/${color}.svg`
            }
            if(svgUrl){
                let $img=$("<img src='' alt=''/>");
                $img.attr("src",svgUrl);
                $el.empty().append($img);
            }
        });
    }
}