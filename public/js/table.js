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