require("./bubulles.less");

export default class BubullesHtml{
    constructor() {

        this.lottie=[
            "data",
            "bubulle-stroke",
            "bubulle-mask"
        ];

        this.blue=[
            "blue",
            "blue-2",
            "blue-3"
        ];
        this.orange=[
            "orange",
            "orange-1",
            "orange-2",
            "orange-3",
            "orange-4",
            "orange-5",
        ];
        //todo bubulles sunrise svg
        this.sunrise=[
            "orange",
            "orange-1",
            "orange-2",
            "orange-3",
            "orange-4",
            "orange-5",
        ];
    }

    fromDom(){
        let me=this;
        $("[bubulles-html]").not("[bubulles-html-init]").each(function(){
            let $el=$(this);
            $el.attr("bubulles-html-init","1");


            let anim=lottie.loadAnimation({
                container: $(this).get(0), // the dom element that will contain the animation
                renderer: 'svg',
                loop: true,
                autoplay: false,
                path: `${LayoutVars.fmkHttpRoot}/project/_src/bubulles/lottie/${utils.array.randomEntry(me.lottie)}.json` // the path to the animation json
            });



            let onChange=function(entries, observer){
                entries.forEach(entry => {
                    let active=entry.isIntersecting;
                    if(active){
                        anim.play();
                    }else{
                        anim.pause();
                    }
                });
            };
            let observer = new IntersectionObserver(onChange, {});
            observer.observe($el[0]);

            return;

            let color=$el.closest("[color-theme]").attr("color-theme");
            if(!color){
                color="orange";
            }
            $el.text(color);
            let svgUrl=null;
            let file=null;
            switch (color) {
                case "orange":
                    file=utils.array.randomEntry(me.orange);
                    break;
                case "blue":
                    file=utils.array.randomEntry(me.blue);
                    break;
                case "sunrise":
                    file=utils.array.randomEntry(me.sunrise);
                    break;
            }
            if(file){
                svgUrl=`${LayoutVars.fmkHttpRoot}/project/_src/bubulles/svg/${file}.svg`
            }
            if(svgUrl){
                let $img=$("<img src='' alt=''/>");
                $img.attr("src",svgUrl);
                $el.empty().append($img);
            }
        });
    }
}