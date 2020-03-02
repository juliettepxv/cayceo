import AbstractForm from "../AbstractForm";

export default class LostPassword extends AbstractForm{



    /**
     *
     * @param {jQuery} $main
     */
    constructor($main){
        super($main);

        console.log("init data-model-lost-password")

        let me=this;

        /**
         * Le conteneur pour les saisies utilisateur
         * @type {jQuery}
         */
        this.$email=$main.find("input[name='email']");
        this.$main.on("submit",function(e){
            e.preventDefault();
            me.loading();
            me.$email.blur();
            api.me.lostPassword(
                me.$email.val(),
                function (messages) {
                    me.displayMessage(messages)
                },
                function(messages){
                    me.displayErrors(messages)
                }
            )
        });


    }


    static initFromDom(){
        $body.find("[data-model-lost-password='']").each(function () {
            $(this).attr("data-model-lost-password","init");
            new LostPassword($(this));
        })
    }
}