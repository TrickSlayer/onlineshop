$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    let ip_address = "127.0.0.1";
    let socket_port = "3000";
    let socket = io(ip_address + ":" + socket_port);

    let userid = $("#userid").val();

    //Bấm gửi / Enter
    $("#content").keypress(function (event) {
        var keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
            sendMessage();
        }
    });

    $("#send").on("click", sendMessage);

    // Gửi tin nhắn
    function sendMessage() {
        let content = $("#content").val();
        let thumb = $("#file").val();

        $.ajax({
            type: "post",
            datatype: "json",
            data: {
                content,
                thumb,
            },
            url: getUrl(),
            success: function (result) {
                if (result != null) {
                    console.log("True");
                    console.log(result);
                    socket.emit("sendChatToServer", result);
                    showBoxMessage(result);
                } else {
                    console.log("False");
                    console.log(result);
                }
            },
        });

        resetInput(["content", "file"]);
    }

    //Lấy url
    function getUrl() {
        url = location.href;
        if (!url) url = window.location.href;
        url = url.split("?")[0];
        return url;
    }

    function getGroupId() {
        url = getUrl();
        url_split = url.split("/");
        return url_split[url_split.length - 1];
    }

    //Hiển thị khi gửi
    function showBoxMessage(data) {
        if (data["message"].group_chat_id == getGroupId()) {
            if (data["message"].user_id == userid) {
                $("#chat-content ul").append(data["htmlA"]);
            } else {
                $("#chat-content ul").append(data["htmlB"]);
            }
        }
    }

    //Reset input content
    function resetInput(input) {
        for (const element of input) {
            document.getElementById(element).value = "";
        }

        $("#image_box").addClass("hidden");
    }

    socket.on("sendChatToClient", (data) => {
        showBoxMessage(data);
    });
});
