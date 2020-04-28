$body.on("click",'.regie .info .button-line',function(e){
    $(".info").removeClass("active");
    $(this).closest(".info").addClass("active");
})