import {Constants} from '../js/constants.js';

$(document).ready(function(){
    let obj = new Constants();
    getProducts();
    var ids = [];
    var price = 0;
    $('.cart').click(function(){
        $id = $(this).data('id');
        $price += $(this).data('price');
        if($ids.includes($id) == true){
            alert("San pham nay da ton tai trong gio hang.");
            return false;
        }
        $ids.push($id);
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem("ids", $ids);
            localStorage.setItem("total", $price);
          }
        $('.cart_total').html("$" + (localStorage.getItem("total") == null ? "0.00" : localStorage.getItem("total")));
        $('.cart_quantity').html(localStorage.getItem("ids") == null ? "0" : ((localStorage.getItem("ids")).split(',')).length);
    })
    $('.cart_total').html("$" + (localStorage.getItem("total") == null ? "0.00" : localStorage.getItem("total")));
    $('.cart_quantity').html(localStorage.getItem("ids") == null || localStorage.getItem("ids") == 'NaN'? "0" : ((localStorage.getItem("ids")).split(',')).length);

    function getProducts() {

        $.ajax({
            type: 'POST',
            url: obj.baseUrl('cart/getProducts'),
            // dataType: 'JSON',
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });

    }
})