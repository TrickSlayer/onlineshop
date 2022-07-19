function loadMore(){
    const page = $('#page').val();
    const price = getParameterByName('price');
    $.ajax({
        type: 'post',
        datatype: 'json',
        data: { page, price },
        url: '/categories/load-product/' + getId(),
        success: function (result){
            if (result !== ''){
                $('#load').append(result.html);
                $('#page').val(1 + Number(page));
                if (!result.more){
                    $('#more').hide();
                }
            }
        }
    })
}