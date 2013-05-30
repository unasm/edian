$(document).ready(function(){ 
	$("#test").change(function() { 
		console.log("testin");
		var filepath=$("input[name='myFile']").val(); 
		var extStart=filepath.lastIndexOf("."); 
		debugger;
		var ext=filepath.substring(extStart,filepath.length).toUpperCase(); 
		if(ext!=".BMP"&&ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){ 
			alert("图片限于bmp,png,gif,jpeg,jpg格式"); 
			return false; 
		} 
		var img=new Image(); 
		img.src=filepath; 
		while(true){ 
			if(img.fileSize>0){ 
				console.log(img.filesize);
				debugger;
				if(img.fileSize>3*1024){ 
					alert("图片不大于300KB。"); 
					return false; 
				} 
				break; 
			} 
		} 
	});
});
