$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    let ip_address = "127.0.0.1";
    let socket_port = "3000";
    let socket = io(ip_address + ":" + socket_port);

    $("#content").keypress(function (event) {
        var keycode = event.keyCode ? event.keyCode : event.which;
        if (keycode == "13") {
            sendMessage();
        }
    });

    $("#send").on("click", sendMessage);

    function sendMessage() {
        let content = $("#content").val();
        let user_id = $("#user_id").val();
        let input = [user_id, content];

        $.ajax({
            type: "post",
            datatype: "json",
            data: {
                user_id,
                content,
            },
            url: getUrl(),
            success: function (result) {
                socket.emit("sendChatToServer", input);
                html = getHtml(input);
                $("#chat-content ul").append(html);
            },
        });

        resetInput(["content","user_id"]);
    }

    function getUrl() {
        url = location.href;
        if (!url) url = window.location.href;
        url = url.split("?")[0];
        return url;
    }

    function getHtml(input) {
        return `<li><strong>${input[0]}</strong>: ${input[1]}</li><br>`;
    }

    function resetInput(input) {
        for (const element of input) {
            document.getElementById(element).value = "";
        }
    }

    socket.on("sendChatToClient", (input) => {
        html = getHtml(input);
        $("#chat-content ul").append(html);
    });
});
