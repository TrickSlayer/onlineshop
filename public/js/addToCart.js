$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#submit").on('click', function(){
    quantity = $("#quantity").val();
    add(quantity, getId());
})

function add(quantity, id){
    $.ajax({
        type: 'post',
        datatype: 'json',
        data: { quantity, id},
        url: '/cart/add',
        success: function (result){
            alert(result);
        }
    })
}


$(function () {
    let ip_address = "127.0.0.1";
    let socket_port = "3000";
    let socket = io(ip_address + ":" + socket_port);
});