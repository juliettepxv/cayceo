/**
 * Permet de ralentir le déplacement d'éléments DOM en fonction de la vitesse du scroll
 */
export default class DomSpeedScroll {

    constructor(){
    }

    /**
     * Fait bouger tous les dom speed scroll actifs
     * @param delta
     */
    updade(delta){
        if(!speedScroll.active){
            return;
        }
        let $els=$("[dss]");
        $els=$els.not("[scroll-active=''][dss]");
        $els=$els.not("[scroll-active=''] [dss]");
        //console.log("bouge "+$els.length+" dom-speed-scroll éléments",);
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
        if(perfs.domCopy){
            domCopyManager.positionne();
        }

    }
}