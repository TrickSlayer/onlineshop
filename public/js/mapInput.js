$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$.ajax({
    type: "post",
    datatype: "json",
    data: { address },
    url: "/map/ip",
    success: function (result) {
        $("#address-input").val() = "Hà Nội" ;
        $("#address-map").replaceWith(
            '<div id="address-map">' + result + "</div>"
        );
    },
});

$("#address-input").on("input", search);

function search() {
    const address = $("#address-input").val();
    if (address != "")
        $.ajax({
            type: "post",
            datatype: "json",
            data: { address },
            url: "/map/search",
            success: function (result) {
                $("#address-map").replaceWith(
                    '<div id="address-map">' + result + "</div>"
                );
            },
        });
}