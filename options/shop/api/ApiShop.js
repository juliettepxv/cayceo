import Api from "../../../project/_src/api/Api";

export default class ApiShop extends Api{

    constructor(){
        super();
        let me=this;
    }

    /**
     * Ajouter, supprimer un article du panier
     * @param productUid
     * @param quantity
     * @param price
     * @param cbSuccess
     * @param cbError
     */
    setProductQuantity(productUid,quantity,price, cbSuccess, cbError){
        if(quantity>0){
            stats.add_to_cart(productUid,price);
        }else{
            stats.remove_from_cart(productUid,price);
        }
        this._call(
            "shop","set-product-quantity",
            {
                productUid:productUid,
                quantity:quantity
            },
            function(){
                basket.refresh();
            },
            cbError
        );
    }
    getBasket(cbSuccess, cbError){
        this._call(
            "shop","get-basket",
            {
            },
            cbSuccess,
            cbError
        );
    }




}