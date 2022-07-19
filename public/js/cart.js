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

total();

function total() {
    sum = 0;

    $(".price").each(function () {
        sum += $(this).val() * $(this).attr("name");
    });

    $("#total").html(sum);
}

$(".increment, .decrement").click(change);

function change() {
    id = $(this).attr("name");
    quantity = $("#quantity-" + id).val();

    if (quantity < 1) {
        $("#quantity-" + id).val(1);
    } else {
        $.ajax({
            type: "post",
            datatype: "json",
            data: { id, quantity },
            url: "/cart/change",
            success: function (result) {
                if (result) {
                    increment = $(this).hasClass("increment");

                    sum = $("#total").html();
                    $("#total").html(
                        parseFloat(sum) +
                            (increment ? 1 : -1) *
                                parseFloat($("#quantity-" + id).attr("name"))
                    );
                } else {
                    location.reload();
                }
            },
        });
    }
}

function order() {
    address = $("#address-input").val();
    note = $("#note").val();

    $.ajax({
        type: "post",
        datatype: "json",
        data: { address, note },
        url: "/cart/order",
        success: function (result) {
            if (result){
                location.reload();
            }
        },
    });
}
