
import AbstractForm from "../AbstractForm";

export default class SignIn extends AbstractForm{



    /**
     *
     * @param {jQuery} $main
     */
    constructor($main){
        super($main);
        console.log("init SignIn")
        let me=this;
        /**
         * Le conteneur pour les saisies utilisateur
         * @type {jQuery}
         */
        this.$email=$main.find("input[name='email']");
        this.$pwd=$main.find("input[name='pwd']");
        this.$pwdConfirm=$main.find("input[name='pwd-confirm']");

        this.$main.on("submit",function(e){
            e.preventDefault();
            me.loading();
            me.$pwd.blur();
            me.$pwdConfirm.blur();
            me.$email.blur();
            api.me.signIn(
                me.$email.val(),
                me.$pwd.val(),
                me.$pwdConfirm.val(),
                function (messages) {
                    me.displayMessage(messages);
                    setTimeout(function(){
                        document.location.reload(true);
                    },1000*1);
                },
                function(messages){
                    me.displayErrors(messages);
                }
            )
        });
    }

    static initFromDom(){
        $body.find("[data-model-sign-in='']").each(function () {
            $(this).attr("data-model-sign-in","init");
            new SignIn($(this));
        })
    }
}