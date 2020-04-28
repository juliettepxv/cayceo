import autosize from "autosize/dist/autosize";
export default class Form{
    constructor($main) {

        let me=this;
        this.$main=$main;
        $main.on("submit",function(e){
            e.preventDefault();
            me.submit();
        });
        $main.on("change input","textarea,select,input",function(){
            me.checkFields();
        });

        $main.find("select[message-placeholder]").on("change",function(){
            me.refreshMessagePlaceholder();
        });
        me.refreshMessagePlaceholder();

    }
    $fields(){
        return this.$main.find("input,textarea,select");
    }
    refreshMessagePlaceholder(){
        let $o=this.$main.find("[placeholder]:selected");
        if($o.length){
            let oVal=$o.attr("placeholder");
            this.$main.find("[name='message']").attr("placeholder",oVal);
        }
    }

    /**
     *
     * @returns {boolean}
     */
    checkFields(){
        let valid="valid";
        this.$fields().removeClass("error");
        this.$fields().filter("[mandatory]").each(function(){
            let $f=$(this);
            if($f.val().length<2){
                //$f.addClass("error");
                valid="";
                $f.addClass("error")
            }
        });

        let $phone=this.$fields().filter("[name='phone']");
        let $phoneMoment=this.$fields().filter("[name='phonemoment']");
        if($phoneMoment.val() && $phone.val().length<5){
            valid="";
            $phone.addClass("error");
        }

        this.$main.attr("state",valid);
        return valid!=="";
    }
    submit(){
        let me=this;
        if(this.checkFields()){

            //reconstitue le message texte
            let message=[];
            me.$main.find("[m]").each(function(){
                let $f=$(this);
                if($f.is("input,textarea")){
                    message.push($f.val());
                }else if($f.is("select")){
                    message.push($f.find(":selected").text());
                }else if($f.is("hr")){
                    message.push("<br>");
                }else{
                    message.push($f.text());
                }

            });
            me.$main.attr("state","sending");
            let datas={
                humanMessage:message.join(""),
                lastname:me.$main.find(`[name='lastname']`).val(),
                email:me.$main.find(`[name='email']`).val(),
                phone:me.$main.find(`[name='phone']`).val(),
                date:me.$main.find(`[name='date']`).val(),
                message:me.$main.find(`[name='message']`).val(),

            };

            PovApi.actionCB("form-contact",datas,function(res){
                console.log(res);
                if(res.success){
                    me.$main.attr("state","sent");
                    me.$main.find(".success-message").html(res.messages.join("<br>"))
                }else{
                    me.$main.attr("state","error");
                    me.$main.find(".error-message").html(res.errors.join("<br>"))
                }

            },function(){
                me.$main.attr("state","error");
                me.$main.find(".error-message").html("error");
            })

        }
    }



    static fromDom(){
        $("[data-form]").not(".form-init").each(function(){
            $(this).addClass("form-init");
            new Form($(this));
        });
    }

}





