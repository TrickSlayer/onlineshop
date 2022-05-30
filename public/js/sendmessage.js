$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    let ip_address = "127.0.0.1";
    let socket_port = "3000";
    let socket = io(ip_address + ":" + socket_port);


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
        let user_id = $("#user_id").val();
        let group_chat_id = $("#group_chat_id").val();
        let user_name = $("#user_name").val();
        let input = [user_id, content, group_chat_id, user_name];

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

        resetInput(["content"]);
    }


    //Lấy url
    function getUrl() {
        url = location.href;
        if (!url) url = window.location.href;
        url = url.split("?")[0];
        return url;
    }

    function getGroupId(){
        url = getUrl();
        url_split = url.split("/");
        return url_split[url_split.length - 1];
    }

    //Hiển thị khi gửi
    function getHtml(input) {
        user_name = input[3];
        if (input[2] == getGroupId())
            return `<li><strong>${user_name}</strong>: ${input[1]}</li>`;
        return "";
    }

    //Reset input content
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
