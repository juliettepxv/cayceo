//import Nav from "../nav/Nav";

$body.on("click","[api-click]",function(e){

    let $clicked=$(this);
    let action=$(this).attr("api-click");
    let uid=null;
    let $article=null;
    let file=null;

    e.preventDefault();
    e.stopPropagation();

    let productUid;

    switch (action) {
        case "meLogOut":
            api.me.logOut();
            break;

        case "display-login-popin":
            let message=$(this).attr("api-message");
            dialog.ask(message,function(){
                goLogin();
            });
            break;

        case "shop/incrementBasketQuantity":
            let quantity=$clicked.attr("quantity");
            productUid=$clicked.attr("product-uid");
            api.shop.setProductQuantity(productUid,quantity);
            break;

        case "product/setBasketQuantity":

            let $parent = $clicked.closest(".market");
            let maxQuantity = parseInt($parent.find(".stock").attr("data-stock"));


            let $quantityDisplay = $parent.find(".quantity");
            let quantityValue = parseInt($quantityDisplay.html());

            if($clicked.hasClass("more") && quantityValue < maxQuantity) quantityValue++;
            else if($clicked.hasClass("less") && quantityValue>1) quantityValue--;

            $parent.find("[quantity]").attr("quantity", quantityValue);

            $quantityDisplay.html(quantityValue);
            break;

        default:
            alert(`api-click Action ${action} non prise en charge`);
    }
});


$body.on("submit","[api-submit]",function(e){
    let $form=$(this);
    let action=$(this).attr("api-submit");
    e.preventDefault();
    e.stopPropagation();

    switch (action) {
        case "todo":
        default:
            alert(`Action ${action} non prise en charge par api-submit`);

    }
});


$body.on("click",".diapo-nav li",function(e){

    let $clicked=$(this);
    let $parent = $clicked.closest(".diapo-wrapper");
    let $targetId = $(this).attr("data-image");

    $parent.find(".active").removeClass("active");
    $parent.find('[data-image="'+$targetId+'"]').addClass("active");

    e.preventDefault();
    e.stopPropagation();
});


$body.on("click",".recipeCatNav [data-categorie]",function(e){

    let $clicked=$(this);
    let categorie = $(this).attr("data-categorie");
    e.preventDefault();
    e.stopPropagation();


    if(categorie != "all") {
        $(".recipeList .gird-item").addClass("hide");
        $('.recipeList .gird-item[data-categorie="'+categorie+'"]').removeClass("hide");
    } else {
        $(".recipeList .gird-item").removeClass("hide");
    }

    api.masonry.refresh();
    STAGE.emit(EVENTS.RESIZE);

    /*
    setTimeout(function(){

    }, 200);
    */

    /*
    let $parent = $clicked.closest(".diapo-wrapper");
    let $targetId = $(this).attr("data-image");

    $parent.find(".active").removeClass("active");
    $parent.find('[data-image="'+$targetId+'"]').addClass("active");
    */

});