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
			alet("请先登陆");
			return false;
		}
		 title = $("#title").val();
		if(title == "" || title == undefined){
			alet("忘记输入标题，请输入");
			return false;
		}
		title  = $("#cont").val();
		if((title == "") || (title == undefined)){
			alet('请输入内容');
			return false;
		}
		return true;
	});
})
function alet (cont) {//给出各种提示的函数，和alert不同，这个过1s就消失
	var alet = document.createElement("div");
	var css = {
		position:'absolute',
		padding:'9px',
		background:"#729ECA",
		top:"40%",
		"border-radius":"5px",
		left:'45%'
	};
	$(alet).html("<p>"+cont+"</p>");
	$(alet).css(css);
	$("body").append(alet);
	setTimeout(function  () {
		$(alet).detach();
	},999);
}
