$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Filter
$("#filter").on("input", load);

function load(){
    const value = $("#filter").val();
    const sort = getParameterByName('sort');
    const direction = getParameterByName('direction');
    $.ajax({
        type: 'post',
        datatype: 'json',
        data: { value, sort, direction },
        url: getUrl() + "/search",
        success: function (result){
            if (result !== ''){
                $('#table').replaceWith('<div id="table">'+result.html+'</div>');
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

function getUrl() {
    url = location.href;
    if (!url) url = window.location.href;
    url = url.split('?')[0];
    return url;
}

//Delete
function removeRow(id, message){
    if (confirm('Are you sure delete '+ message + '?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: getUrl() + "/destroy",
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