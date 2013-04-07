$(document).ready(function  () {
	var title;
	$("#title").blur(function  () {
		title = $("#title").val();
		if((title != "")&&(title !=undefined)){
			$("#title").attr("value","标题");
		}
	});
	$("#title").focus(function  () {
		title = $("#title").val();
		if(title == "标题"){
			$("#title").removeAttr("value");
		}
		title = "testging";
	});
	$("#content form").submit(function(){
		var name = $.cookie("user_name");
		if(name == "" || name == undefined){
			$.alet("请先登陆");
			return false;
		}
		 title = $("#title").val();
		if(title == "" || title == undefined){
			$.alet("忘记输入标题，请输入");
			return false;
		}
		title  = $("#cont").val();
		if((title == "") || (title == undefined)){
			$.alet('请输入内容');
			return false;
		}
		return true;
	});
})

