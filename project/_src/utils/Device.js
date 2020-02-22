export default class UtilsDevice {

    constructor() {
        let ua=navigator.userAgent;
        /**
         * ios or not
         * @type {boolean}
         */
        this.isIos=/iPad|iPhone|iPod/.test(ua) && !window.MSStream;
        /**
         * microsoft edge or not
         * @type {boolean}
         */
        this.isEdge=ua.indexOf("Edge") !== -1;
        /**
         * microsoft internet explorer or not
         * @type {number}
         */
        this.isMsie=ua.indexOf("MSIE ") > 0 || !!ua.match(/Trident.*rv\:11\./);

    }

    /**
     * hover possible or not ?
     * @returns {boolean}
     */
    isHoverCapable(){
        return !window.matchMedia("(hover: none)").matches;
    }

    /**
     * touch possible or not?
     * @returns {boolean}
     */
    isTouchDevice() {
        return ('ontouchstart' in window) || ('msmaxtouchpoints' in window.navigator);
    }


}