$(document).ready(function  () {
	var title;
	$("#title").blur(function  () {
		title = $.trim($("#title").val());
		if(title.length==0){
			$("#title").attr("value","标题");
		}
	});
	$("#title").focus(function  () {
		title = $.trim($("#title").val());
		if(title == "标题"){
			$("#title").removeAttr("value");
		}
	});
	$("#content form").submit(function(){
		var name = $.cookie("user_name");
		if(name == "" || name == undefined){
			$.alet("请先登陆");
			return false;
		}
		 title = $.trim($("#title").val());
		if(title.length == 0){
			$.alet("忘记输入标题，请输入");
			return false;
		}
		return true;
	});
})

