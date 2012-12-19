

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>js判断上传文件的大小</title>
    <script type="text/javascript">
        var isIE = /msie/i.test(navigator.userAgent) && !window.opera;
        var sizeLabel = ["B", "KB", "MB", "GB"];
        function fileChange(target) {
            var fileSize = 0;
            if (isIE && !target.files) {
                var filePath = target.value;
                var fileSystem = new ActiveXObject("Scripting.FileSystemObject");   
                var file = fileSystem.GetFile (filePath);
                fileSize = file.Size;
								alert("wot");
            } else {
                fileSize = target.files[0].size;
								alert(fileSize);
            }
            displayFileSize(fileSize);
        }
    
        function displayFileSize(size) {
            var fileSize = document.getElementById("fileSize");
            fileSize.innerHTML = calFileSize(size);
        }
        
        function calFileSize(size) {
            for (var index = 0; index < sizeLabel.length; index++) {
                if (size < 1024) {
                    return round(size, 2) + sizeLabel[index];
                }
                size = size / 1024;
            }
            return round(size, 2) + sizeLabel[index];
        }
        
        function round(number, count) {
            return Math.round(number * Math.pow(10, count)) / Math.pow(10, count);
        }
    </script>
</head>
<body>
    <div>
        <input type="file" onchange="fileChange(this);">
    </div>
    <div id="fileSize">
    </div>
</body>
</html>
