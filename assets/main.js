var File2S3 = {
    fileName: '',
    flagProcess: false,
    baseUrl: '',
    upload: function () {
        var files = $('#fileInput').prop('files')[0];
        var filename = "new_" +files.name;
        File2S3.fileName = filename;
        File2S3.flagProcess = true;
        var fd = new FormData();
        fd.append( 'file', files );
        var contentType = files.type;
        jQuery.ajax({
            url: File2S3.baseUrl + 'src/process.php',
            type: 'GET',
            data: {filename: filename,contentType:contentType},
            dataType: "html",
            success: function (data) {
                var data = $.parseJSON(data);
                if(data.url){
                    $.ajax({
                        url: data.url,
                        type: 'PUT',
                        dataType: 'html',
                        processData: false,
                        headers: {'Content-Type': contentType},
                        crossDomain: true,
                        data: files
                    }).done(function(data,textStatus,error) {
                        $(".new_url").html('https://s3-trungnv.s3.amazonaws.com/'+File2S3.fileName);
                        $(".new_url").attr("href",'https://s3-trungnv.s3.amazonaws.com/'+File2S3.fileName);
                        File2S3.flagProcess = false;
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        File2S3.flagProcess = false;
                        alert("Error!");
                    });
                }

            }
        });

    }
};
