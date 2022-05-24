$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


//Upload file
let url = document.getElementById('file').value;

$('#upload').change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    console.log('Url old: ' + url);
    //Delete old file
    $.ajax({
        type: 'DELETE',
        datatype: 'JSON',
        data: {url},
        url: '/upload/delete',
        success: function (result){
            if (result.error === false){
                console.log(result.message);
            } else {
                console.log('Delete Fail!');
            }
        },
        error: function(results){
            console.log(results);
            console.log("Error Delete!!");
        }
    });

    //Store new file
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/upload/store',
        success: function(results){
            if (results.error === false){
                let results_url = "/storage/" + results.url;
                $('#image_show').html(
                    '<a  target="_blank" href="'+ results_url +'">'+
                        '<img src="'+ results_url +'" target="_blank">' +
                    '</a>');
                $('#file').val(results_url);
                url = results.url;
            } else {
                console.log('Upload Fail!!');
            }
        },
        error: function(results){
            console.log(results);
            console.log("Error Upload!!");
        }
    });

})