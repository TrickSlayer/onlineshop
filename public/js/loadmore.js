$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore(){
    const page = $('#page').val();
    const price = getParameterByName('price');
    const category_id = 0;
    $.ajax({
        type: 'post',
        datatype: 'json',
        data: { page, price },
        url: '/categories/load-product/' + getCategoryId(),
        success: function (result){
            if (result !== ''){
                $('#load').append(result.html);
                $('#page').val(1 + Number(page));
            }
        }
    })
}

function getParameterByName(name) {
    url = location.href;
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function getCategoryId(){
    url = location.href;
    if (!url) url = window.location.href;
    url = url.split("?")[0];
    array = url.split("/");
    return array[array.length - 1];
}