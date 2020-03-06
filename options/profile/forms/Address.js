import AbstractForm from "../../../project/_src/profil/AbstractForm";

export default class Address extends AbstractForm{
    /**
     *
     * @param {jQuery} $main
     */
    constructor($main){
        super($main);
        console.log("init Address")
        let me=this;
        /*
        this.$uid=$main.find("input[name='uid']");
        this.$name=$main.find("input[name='name']");
        this.$address=$main.find("input[name='address']");
        this.$zipcode=$main.find("input[name='zipcode']");
        this.$city=$main.find("input[name='city']");
        this.$country=$main.find("input[name='country']");
        */
        this.$main.on("submit",function(e){
            e.preventDefault();
            me.loading();
            api.me.saveAddress(
                me.$main.serialize(),
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
        $body.find("[data-model-address='']").each(function () {
            $(this).attr("data-model-address","init");
            new Address($(this));
        })
    }
}