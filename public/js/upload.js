$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

upload();
upload(1);

$("#image_cancel").click(function() {
    $("#image_box").hide();
});

//Upload file
function upload(number = "") {
    let checkId = document.getElementById("file" + number);

    if (checkId == null) return;

    url = checkId.value;

    $("#upload" + number).change(function () {
        const form = new FormData();
        form.append("file", $(this)[0].files[0]);

        //Delete old file
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { url },
            url: "/upload/delete",
            success: function (result) {
                if (result.error === false) {
                    console.log(result.message);
                } else {
                    console.log("Delete Fail!");
                }
            },
            error: function (results) {
                console.log("Error Delete!!");
            },
        });

        //Store new file
        $.ajax({
            processData: false,
            contentType: false,
            type: "POST",
            dataType: "JSON",
            data: form,
            url: "/upload/store",
            success: function (results) {
                if (results.error === false) {
                    let results_url = "/storage/" + results.url;
                    $("#image_box").removeClass('hidden');
                    $("#image_show" + number).html(
                        '<a  target="_blank" href="' +
                            results_url +
                            '">' +
                            '<img class="object-cover w-full h-full" src="' +
                            results_url +
                            '" target="_blank">' +
                            "</a>"
                    );
                    $("#file" + number).val(results_url);
                    url = results.url;
                } else {
                    console.log("Upload Fail!!");
                }
            },
            error: function (results) {
                console.log("Error Upload!!");
            },
        });
    });
}
