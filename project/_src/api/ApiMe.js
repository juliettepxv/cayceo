import Api from "./Api";

export default class ApiMe extends Api{

    constructor(){
        super();
        let me=this;
        //ping
        this.setPingRefreshSlow();
        this._pingTimeout=null;

        this._pingId=null;

        //set interval pour contourner les erreurs dans la récusion
        setInterval(function(){
            me.doPing();
        },120*1000);
        this.doPing();
    }
    /**
     * Accélère le refresh du ping (30 secondes)
     */
    setPingRefreshFast(){
        this._pingRefreshDuration=30*1000;
    }
    /**
     * Accélère le refresh du ping (10 secondes)
     */
    setPingRefreshFaster(){
        this._pingRefreshDuration=10*1000;
    }
    /**
     * Ralentit le refresh du ping
     */
    setPingRefreshSlow(){
       this._pingRefreshDuration=60*1000;
    }
    /**
     * Fait un ping et le relance en récursif
     */
    doPing(){
        let me=this;
        me._ping(function(json){
            console.log("ping success");
            //gestion connexton ou pas
            if(me.isLogged !== json.isLogged){
                console.log("islogged différent",me.isLogged,json.isLogged);
                if(confirm("reload???")){
                    document.location.reload(true);
                }
                return;//on recharge la page et ciao
            }
            if(json.isLogged){
                //todo update basket
                //notifications.setArticlesBadge(json.drafts,json.offlines);
            }

            //appel récusif
            if(me._pingTimeout){
                clearTimeout(me._pingTimeout);
            }
            me._pingTimeout=setTimeout(
                function(){
                    me.doPing();
                },me._pingRefreshDuration
            );
        }
        )
    }

    /**
     * Le réel appel au ping serveur
     * @param cbSuccess
     * @private
     */
    _ping(cbSuccess){
        this._call("me","ping",{
            },
            function(messages,html,json){
                cbSuccess(json)
            });
    }
    /**
     * Déconnecte l'utilisateur et revient sur la home page
     */
    logOut(){
        let cb=function(){
            goHome();
        };
        this._call("me","log-out",{},cb,cb);
    }
    /**
     * Pour recevoir un mail de modif de mot de passe
     * @param email
     * @param cbSuccess
     * @param cbError
     */
    lostPassword(email, cbSuccess, cbError){
        this._call(
            "me","lost-password",
            {
                email:email
            },
            cbSuccess,
            cbError
        );
    }
    /**
     * Pour créer un compte
     * @param {String} email
     * @param {String} pwd
     * @param {String} pwdConfirm
     * @param {function} cbSuccess
     * @param {function} cbError
     */
    signIn(email,pwd,pwdConfirm,cbSuccess,cbError){
        this._call(
            "me","sign-in",
            {
                email:email,
                pwd:pwd,
                pwdConfirm:pwdConfirm
            },
            cbSuccess,
            cbError
        );
    }
    /**
     * Pour s'identifier
     * @param email
     * @param pwd
     * @param cbSuccess
     * @param cbError
     */
    logIn(email,pwd,cbSuccess,cbError){
        this._call(
            "me","log-in",
            {
                email:email,
                pwd:pwd
            },
            cbSuccess,
            cbError
        );
    }
    /**
     * Pour modifier son mot de passe
     * @param newPassword
     * @param cbSuccess
     * @param cbError
     */
    changePassword(newPassword, cbSuccess, cbError){
        this._call(
            "me","change-password",
            {
                newPassword:newPassword
            },
            cbSuccess,
            cbError
        );
    }
    saveAddress(formData,cbSuccess, cbError){
        this._call(
            "me","save-address",
            formData,
            cbSuccess,
            cbError
        );
    }
}