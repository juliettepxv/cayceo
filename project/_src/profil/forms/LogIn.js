import AbstractForm from "../AbstractForm";

export default class LogIn extends AbstractForm{
    /**
     *
     * @param {jQuery} $main
     */
    constructor($main){
        super($main);
        console.log("init LogIn")
        let me=this;
        /**
         * Le conteneur pour les saisies utilisateur
         * @type {jQuery}
         */
        this.$email=$main.find("input[name='email']");
        this.$pwd=$main.find("input[name='pwd']");

        this.$main.on("submit",function(e){
            e.preventDefault();
            me.loading();
            me.$pwd.blur();
            me.$email.blur();
            api.me.logIn(
                me.$email.val(),
                me.$pwd.val(),
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
        $body.find("[data-model-log-in='']").each(function () {
            $(this).attr("data-model-log-in","init");
            new LogIn($(this));
        })
    }
}