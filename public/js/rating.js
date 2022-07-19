var star = 0;

$("#comment-submit").click(function () {
    if (star == 0) {
        if (confirm("Rate 0 star??") == false) {
            return;
        }
    }

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

$("#delete").click(function () {
    deleteComment(0);
});

$(".delete").click(function () {
    id = $(this).attr("id");
    deleteComment(id);
});

function deleteComment(userId) {
    $.ajax({
        type: "DELETE",
        datatype: "JSON",
        data: { userId },
        url: "/comment/delete/" + getId(),
        success: function (result) {
            if (result) {
                location.reload();
            }
        },
        error: function (results) {
            console.log("Error Delete!!");
        },
    });
}
