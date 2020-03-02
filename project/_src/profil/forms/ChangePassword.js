
import AbstractForm from "../AbstractForm";

export default class ChangePassword extends AbstractForm{

    /**
     *
     * @param {jQuery} $main
     */
    constructor($main){
        super($main);
        console.log("init data-model-change-password")
        let me=this;
        /**
         * Le conteneur pour les saisies utilisateur
         * @type {jQuery}
         */
        this.$password=$main.find("input[name='password']");
        this.$confirm=$main.find("input[name='confirm']");
        this.$main.on("submit",function(e){
            e.preventDefault();
            if(me.$password.val() !== me.$confirm.val() ){
                me.displayErrors("Les mots de passe sont différents!")
                return;
            }
            me.loading();
            me.$password.blur();
            me.$confirm.blur();
            api.me.changePassword(
                me.$password.val(),
                function (messages) {
                    me.displayMessage(messages);
                    setTimeout(function(){
                        goLogin();
                    },1000*1);
                },
                function(messages){
                    me.displayErrors(messages);
                }
            )
        });
    }


    static initFromDom(){
        $body.find("[data-model-change-password='']").each(function () {
            $(this).attr("data-model-change-password","init");
            new ChangePassword($(this));
        })
    }
}