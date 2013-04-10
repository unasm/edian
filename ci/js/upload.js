$(document).ready(function(){
	showsize
	$("#upload input[name='userfile']").change(function(){
		var img = $(this).val();
		console.log(this);
		console.log($(this));
		console.log($(this)[0].files[0].size);
	});
})
function getsize (path) {
		var size=parseInt(path.files[0].size/1000);
		console.log(size);
		if(size>2000){
				$("#showsize").html(size+"Kb<p style = 'color:red'>超过2000K会上传失败<p>");
		}
		else {
				$("#showsize").html(size+"Kb");
		}
}
