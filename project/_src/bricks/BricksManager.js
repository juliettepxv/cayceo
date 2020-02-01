import Bricks from "bricks.js";
require("./bricks.less");

export default class BricksManager {
    constructor() {
        let me=this;
        me.build();
        $body.on(Pov.events.DOM_CHANGE,function(){
            console.log("change");
            me.resize();
            me.build();
        });
    }
    resize(){
        let $containers=$("[bricks='init']");
        $containers.each(function(){
            let $cont=$(this);
            $cont.data("bricks").pack();
        });

    }
    build(){
        let sizes = [
            { columns: 1, gutter: 15 },                   // assumed to be mobile, because of the missing mq property
            { mq: '576px', columns: 1, gutter: 15 },
            { mq: '768px', columns: 2, gutter: 20 },
            { mq: '992px', columns: 3, gutter: 30 },
            { mq: '1200px', columns: 3, gutter: 30 },
        ];

        let $containers=$("[bricks='']");

        $containers.each(function(){
            let $cont=$(this);
            console.log("bricks container")

            let instance = Bricks({
                container: $(this)[0],
                packed:    'packed',        // if not prefixed with 'data-', it will be added
                sizes:     sizes
            });
            $cont.attr("bricks","init");
            $cont.data("bricks",instance);

            instance
                .on('pack',   () => console.log('ALL grid items packed.'))
                .on('update', () => console.log('NEW grid items packed.'))
                .on('resize', size => console.log('The grid has be re-packed to accommodate a new BREAKPOINT.'))

            instance
                .resize(true)     // bind resize handler
                .pack()           // pack initial items
        });



    }

}