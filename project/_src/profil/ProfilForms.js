import SignIn from "./forms/SignIn";
import LogIn from "./forms/LogIn";
import LostPassword from "./forms/LostPassword";
import ChangePassword from "./forms/ChangePassword";
import Address from "./address/Address";

export default class ProfilForms {
    constructor(){
        //LogIn.onLogin()
    }
    static initFromDom(){
        SignIn.initFromDom();
        LogIn.initFromDom();
        LostPassword.initFromDom();
        ChangePassword.initFromDom();
        Address.initFromDom();
    }
}