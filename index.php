<html>
    <head>
        <script type="text/javascript" src="assets/main.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/style.css"/>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <div class="main">
            <form class="" id="uploadForm" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <h1>S3 Upload Demo</h1>
                    <div class="">
                        <input type="file" name="files" id="fileInput" class="" placeholder="Select file">
                        <button type="button" class="btn" onclick="upload();">Upload File</button> <br /><br />
                    </div>
                </div>
            </form>
            <a class="thumbnail " style="height: 150px;">
                <img class="img-demo" id="new_img" width="100" height="100" src="assets/img/loadading.gif" alt="">
            </a>
            Url:<a href="" target="_blank" class="new_url"></a><br /><br />
        </div>
    </body>
</html>
<script>
    function upload() {
        var files = $('#fileInput').prop('files')[0];
        if(files == '' || files == undefined ){
            alert("Please, select your file!");
            return false;
        }
        if(File2S3.flagProcess){
            alert("Please, waiting for other process finish.");
            return;
        }
        File2S3.upload();
    }

    File2S3.baseUrl = window.location.pathname;

</script>