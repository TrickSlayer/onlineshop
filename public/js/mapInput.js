$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$.ajax({
    type: "post",
    datatype: "json",
    url: "/map/ip",
    success: function (result) {
        $("#address-map").replaceWith(
            '<div id="address-map">' + result[0] + "</div>"
        );

        $("#address-input").val(result[1]);
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
                    '<div id="address-map" class="hidden">' + result + "</div>"
                );
                $("#address-map").on("load", $(this).removeClass("hidden"));
            },
        });
}

// function showDoc(){
//     const iframe = $("#google-map");
//     iframe.load(function () {
//         console.log(iframe[0].outerHTML);
//     });
// }