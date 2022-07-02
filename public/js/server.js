$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(function () {
    let ip_address = "127.0.0.1";
    let socket_port = "3000";
    let socket = io(ip_address + ":" + socket_port);

    socket.on("sendChatToClient", (data) => {
        message = data["message"];

        let url = getUrl();
        ajaxUrl = url.includes("message")
            ? url.replace("view", "seen")
            : baseUrl(url) + '/message/seen';

        $.ajax({
            type: "post",
            datatype: "json",
            data: {
                message,
            },
            url: ajaxUrl,
            success: function (result) {
                if (result["check"]){
                    showUnseenSidebar(url);
                    showUnseenMessage(url, result["id"]);
                }
            },
        });

    });

    function getUrl() {
        url = location.href;
        if (!url) url = window.location.href;
        url = url.split("?")[0];
        return url;
    }

    function baseUrl(url) {
        path = url.split('/');
        return path[0] + '//' + path[2];
    }

    function showUnseenSidebar(url){
        $.ajax({
            type: "post",
            datatype: "json",
            data: {},
            url: baseUrl(url) + '/message/unseen/count',
            success: function (result) {
                $("#unseen").removeClass('hidden').text(result);
            },
        });
    }

    function showUnseenMessage(url, id){
        if (url.includes("message")) {
            $("#groupchat"+id).removeClass('hidden');
        }
    }

});
