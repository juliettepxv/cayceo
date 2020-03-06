
export default class Api {
    constructor(){
        let me=this;
        this.isLogged=LayoutVars.isLogged;
    }

    /**
     * Fait une reqête d'api
     * @param {string} entry
     * @param {string} action
     * @param {*} params
     * @param {function} cbSuccess
     * @param {function} cbError
     * @returns {JQuery.jqXHR}
     */
    _call(entry,action,params,cbSuccess,cbError){
        //let url=`${LayoutVars.rootUrl}/api/${entry}/${action}`;
        let url=`${LayoutVars.rootUrl}/povApi/action/${entry}.${action}/`;
        if(!cbError){
            cbError=function(errs){
                console.error(entry,action,errs)
            }
        }
        if(!cbSuccess){
            cbSuccess=function(msgs){
                console.log(entry,action,msgs)
            }
        }
        let request=$.ajax({
            dataType: "json",
            url: url,
            method:"post",
            data: params,
            success: function(response){
                console.log(response);
                if(response.success){
                    cbSuccess(response.messages,response.html,response.json);
                }else{
                    cbError(response.errors);
                }

            },
            error:function(response){
                if (response.statusText ==='abort') {
                    console.log("aborted",response);
                    return;
                }
                console.error(response);
                if(response.responseText){
                    Xdebug.fromString(response.responseText)
                }
                cbError(response.errors);
            }
        });
        return request;
    }

    /**
     * TODO Pour enregistrer un record (adresse, infos perso etc...)
     * @param modelUid
     * @param data
     * @param cbSuccess
     * @param cbError
     */
    store(modelUid, data ,cbSuccess, cbError){
        data.uid=modelUid;
        this._call(
            "store","update",
            data,
            cbSuccess,
            cbError
        );
    }





}