/**
 * écoute les formulaires de profil et réagit en fonction
 */
$body.on("EVENT_SUCCESS EVENT_ERROR","[api-form]",function(e){
    console.log('api-form EVENT',e,this);

    switch ($(this).attr("api-form")) {
        case "profile.login":
        case "profile.signIn":
            if(e.type==="EVENT_SUCCESS"){
                setTimeout(function(){
                    document.location.reload(true);
                },1000);
            }
            break;
        case "profile.changePassword":
            if(e.type==="EVENT_SUCCESS"){
                setTimeout(function(){
                    document.location=LayoutVars.rootUrl;
                },1000);
            }
            break;
    }
});