function loadProduct(productID) {
    // to transfer the product id via url
    function loadProduct(productID) {
        // console.log(productID);
        var origin = window.location.origin;
        window.location.href = origin + "/assignment/Elegant Wardrobe/productinfo.php?product_id=" + productID;
        // console.log(origin);

    }
    // console.log(origin);

}