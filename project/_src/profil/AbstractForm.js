export default class AbstractForm {
    constructor($main){
        /**
         *
         * @type {jQuery}
         */
        this.$main=$main;
        this.$message=this.$main.find("[message]");

        if(!this.$message.length){
            console.error("pas de message");
            alert("pas de message");
        }
    }
    loading(){
        this.displayMessage("...");
    }
    displayErrors(messages){
        this.displayMessage(messages);
        this.$message
            .removeClass("alert-success")
            .addClass("alert-danger")
            .html(messages.join("<br>"));

    }
    displayMessage(messages){
        //window.scrollToElement(this.$message);
        if(typeof messages === "string"){
            messages=[messages];
        }
        this.$message
            .addClass("alert-success")
            .removeClass("alert-danger")
            .html(messages.join("<br>"));
    }
}