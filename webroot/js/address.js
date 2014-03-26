var xhr;

function zip(zip, call) {

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: webroot + "address/addresses/zip/" + zip,
        dataType: "json"
    })
    .done(function(data) {
        call(data);
    });
}
