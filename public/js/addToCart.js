$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#submit").on("click", function () {
    quantity = $("#quantity").val();
    add(quantity, getId());
});

function add(quantity, id) {
    if (quantity > 0) {
        $.ajax({
            type: "post",
            datatype: "json",
            data: { quantity, id },
            url: "/cart/add",
            success: function (result) {
                $("#cart").removeClass("hidden");
                $("#cart").html(result);
            },
        });
    }
}
