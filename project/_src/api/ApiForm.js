require("./api-form.less");
/**
 * Formulaire de base pour appeler une action d'API
 * [api-form="entry.action"]
 * ensuite il faut avoir...
 * un [type="submit"]
 * un div[message]
 *
 */
export default class ApiForm {
    constructor($form) {
        let me=this;
        this.$form=$form;
        this.$form.data("apiform_object",me);
        let split=$form.attr("api-form").split(".");
        this.entry = split[0];
        this.action = split[1];
        /**
         *
         *
         * @type {jQuery}
         */
        this.$form=$form;
        this.$message=this.$form.find("[message]");

        if(!this.$message.length){
            let m="pas de [message] dans le formulaire "+me.action;
            console.error(m);
            alert(m);
        }
        this.$form.on("submit",function(e){
            e.preventDefault();
            me.stateSending();

            api._call(
                me.entry,
                me.action,
                me.values(),
                function (messages) {
                    me.stateSent(messages);
                },
                function(messages){
                    me.stateError(messages);
                }
            )
        });
    }
    $fields(){
        return this.$form.find("[name]");
    }
    values(){
        let r={};
        this.$fields().each(function () {
            r[$(this).attr("name")]=$(this).val();
        });
        return r;
    }
    stateSending(){
        this.$form.attr("state","sending");
        this.displayMessage("...");
        this.$form.trigger("EVENT_SENDING",this);
    }
    stateError(errors){
        this.$form.attr("state","error");
        this.displayMessage(errors);
        this.$form.trigger("EVENT_ERROR",this);
    }
    stateSent(messages){
        this.$form.attr("state","success");
        this.displayMessage(messages);
        this.$form.trigger("EVENT_SUCCESS",this);
    }

    /**
     * Affiche un message
     * @param {String|String[]}messages
     */
    displayMessage(messages){
        //window.scrollToElement(this.$message);
        if(typeof messages === "string"){
            messages=[messages];
        }
        this.$message.html(messages.join("<br>"));
    }

    static initFromDom(){
        $body.find("[api-form]").not("[api-form-init]").each(function () {
            $(this).attr("api-form-init","init");
            new ApiForm($(this));
        })
    }

    /**
     * Renvoie les api forms correspondant aux elements donnés
     * @param {jQuery} $forms Le(s) objet(s) jquery
     * @returns {ApiForm[]}
     */
    static getByDom($forms){
        let r=[];
        $forms.each(function(){
            r.push($(this).data("apiform_object"))
        });
        return r;
    }

    /**
     * Renvoie les ApiForms correspondants à une action d'api
     * @param {String} action un truc genre me.login
     * @returns {ApiForm}
     */
    static getByAction(action){
        let $forms=$(`[api-form='${action}']`);
        return ApiForm.getByDom($forms);

    }
}