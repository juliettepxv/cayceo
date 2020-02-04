import UtilsArray from "./Array";
import UtilsMath from "./Math";
import UtilsDevice from "./Device";

export default class Utils{
    constructor() {
        this.math=new UtilsMath();
        this.array=new UtilsArray();
        this.device=new UtilsDevice();
    }

}

