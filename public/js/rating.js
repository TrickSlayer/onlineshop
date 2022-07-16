$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var star = 0;

$("#comment-submit").click(function () {
    $("#star-input").val(parseInt(star));
    $("#form").submit();
});

$(".star")
    .click(function () {
        id = $(this).attr("id").split("-")[1];
        star = id;
        show(id);
    })
    .mouseenter(function () {
        id = $(this).attr("id").split("-")[1];
        show(id);
    })
    .mouseleave(function () {
        show(star);
    });

function show(number) {
    for (let i = 1; i <= 5; i++) {
        if (i <= number) {
            $("#star-" + i)
                .removeClass("text-white")
                .addClass("text-yellow-300");
        } else {
            $("#star-" + i)
                .removeClass("text-yellow-300")
                .addClass("text-white");
        }
    }
}

$("#delete").click(function(){
    $.ajax({
        type: "DELETE",
        datatype: "JSON",
        url: "/comment/delete/" + getId(),
        success: function (result) {
            location.reload();
        },
        error: function (results) {
            console.log("Error Delete!!");
        },
    });
})
