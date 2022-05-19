$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url){
    if (confirm('Delete ?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result){
                if (result.error === false){
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Fail. Try Agains!');
                }
            }
        })
    }
}

function loadMore(){
    const page = $('#page').val();
    const price = getParameterByName('price');
    $.ajax({
        type: 'post',
        datatype: 'json',
        data: { page, price },
        url: '/admin/products/load-product',
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