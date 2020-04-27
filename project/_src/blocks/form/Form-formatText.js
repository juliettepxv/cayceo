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
        $main.find(".resizeinput").each(function(){
            me.listenResizeInput($(this));
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
        this.$fields().each(function(){
            let $f=$(this);
            if($f.val().length<2){
                //$f.addClass("error");
                valid="";

            }
        });
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
                object:me.$main.find(`[name='object']`).val(),
                humanMessage:message.join(""),
                message:me.$main.find(`[name='message']`).val(),
                firstname:me.$main.find(`[name='firstname']`).val(),
                lastname:me.$main.find(`[name='lastname']`).val(),
                email1:me.$main.find(`[name='email1']`).val(),
                email2:me.$main.find(`[name='email2']`).val(),

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




    listenResizeInput($input){
        let me=this;
        if($input.is("textarea")){
            autosize($input);
            return;
        }
        $input.on("change input",function(){
            me.resizeInput($(this));
        });
        window.addEventListener('resize',
            function(){
            me.resizeInput($input);
        });
        me.resizeInput($input);
    }
    resizeInput($input){
        let text="";
        let arrowWidth=4;
        let fontSize=parseFloat($input.css("font-size"));
        //arrowWidth=fontSize /2;
        if($input.is("select")){
            //arrowWidth=fontSize;
            text = $input.find("option:selected").text();
        }else{
            text=$input.val();
            if(!text){
                text=$input.attr("placeholder")
            }
        }
        let $test = $("<span>").html(text).css({
            "font-size": $input.css("font-size"), // ensures same size text
            "font-weight": $input.css("font-weight"), // ensures same size text
            "visibility": "hidden"               // prevents FOUC
        });
        $test.appendTo($input.parent());
        let width = $test.width();
        $test.remove();
        $input.width(width+arrowWidth);
        Pov.events.dispatchDom($body,Pov.events.DOM_CHANGE);
    }


    static fromDom(){
        $("[data-form]").not(".form-init").each(function(){
            $(this).addClass("form-init");
            new Form($(this));
        });
    }

}



