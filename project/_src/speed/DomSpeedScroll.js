/**
 * Permet de ralentir le déplacement d'éléments DOM en fonction de la vitesse du scroll
 */
export default class DomSpeedScroll {

    constructor(){

    }
    updade(){
        let $els=$("[dss]");
        $els.each(function(){
            let $el=$(this);
            let f=Number($(this).attr("dss"));
            let y=-speedScroll.speedY*f;
            //y=utils.math.range(y,-200,200);
            gsap.set(
                $el,
                {
                    y:y
                }
            );
        });
    }
}