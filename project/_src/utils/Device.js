export default class UtilsDevice {

    isHoverCapable(){
        return !window.matchMedia("(hover: none)").matches;
    }
}