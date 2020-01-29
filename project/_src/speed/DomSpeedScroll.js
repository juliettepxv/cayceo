/**
 * Permet de ralentir le déplacement d'éléments DOM en fonction de la vitesse du scroll
 */
export default class DomSpeedScroll {

    constructor(){
        this._oldSpeed=speedScroll.speedY;
    }
    updade(delta){
        if(this._oldSpeed===0 && speedScroll.speedY===0){
            return;
        }
        this._oldSpeed=speedScroll.speedY;
        let $els=$("[dss]");
        $els=$els.not("[scroll-active=''][dss]");
        $els=$els.not("[scroll-active=''] [dss]");
        console.log("dom speed scroll",$els.length);
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