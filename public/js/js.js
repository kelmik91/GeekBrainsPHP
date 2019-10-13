function addGood(id) {
    jQuery.ajax({
        url: "?p=cart&f=add&id=" + id,
        context: document.body,
        success: function (count) {
            jQuery('#countGoodsInCart').text(count);
        }
    });
}

function dellGood(id) {
    jQuery.ajax({
        url: "?p=cart&f=dell&id=" + id,
        context: document.body,
        success: function (count) {
            jQuery('#countGoodsInCart').text(count);
        }
    });
}


