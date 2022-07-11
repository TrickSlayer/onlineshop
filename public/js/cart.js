$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function deleteCart(cart) {
    id = cart.value;
    $.ajax({
        type: "post",
        datatype: "json",
        data: { id },
        url: "/cart/remove",
        success: function (result) {
            location.reload();
        },
    });
}

$(".increment").click(total);
$(".decrement").click(total);
total();

function total() {
    total = 0;
    $(".price").each(function(){
        if ($(this).val()<0){
            $(this).val(0);
        }
        total += $(this).val() * $(this).attr("name");
    });

    $("#total").html(total);
}

function order(){
    address = $("#address-input").val();

    $.ajax({
        type: "post",
        datatype: "json",
        data: { id },
        url: "/cart/oder",
        success: function (result) {
            location.reload();
        },
    });

}
