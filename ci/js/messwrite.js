var geter = "#content input[name = 'geter']";
$(document).ready(function  () {
	var locate = window.location.href;
	var user =   locate.substring(locate.indexOf("?")+1,locate.length);
	user = user.split("&");
	var userId = user[1];
	var flagId = false;
	if(userId != undefined ){
		var reg = /^[0-9]+$/;
		if(reg.exec(userId)){
			flagId = true;
		}
	}
	if(user_name ==""){
		alet("请先登陆");
	}
	user = user[0];
	if(user != undefined){
		reg = /^http[s]{0,1}\:\/\/www.edian\S*$/;
		if(user != ""){
			if(!reg.exec(user)){
				if(flagId == false){
					console.log(site_url+"/reg/get_user_name/"+user);
					$(geter).val(user);
					getId(user);
				}
				else $(geter).val(user+"("+userId+")");
			}
		}
	}
	$(geter).change(function  () {
		console.log($(this).val());
		user = $(this).val();
		user = user.split("(");
		console.log(user);
		user = user[0];
		$(this).val(user);
		getId(user);
	});
	$("#content form").submit(function  () {
		userId = $.trim($(geter).val());
		if(userId.length > 0){
			reg = /\(([0-9]+)\)/;
			userId = reg.exec(userId)[1];
			$(geter).val(userId);
		}
		else {
			alet("请输入用户名");
			return false;
		}
		var title = $("#content input[name = 'title']").val();
		title = $.trim(title);
		if(title.length  == 0){
			alet("请输入标题");
			return false;
		}
		else{
			$("#content input[name = 'title']").val(title);
		}
	});
});
function getId(user){
	console.log(site_url+"/reg/get_user_name/"+user);
	$.ajax({
		url:site_url+"/reg/get_user_name/"+user,
		success:function  (data,textStatus) {
			if(textStatus == "success"){
				console.log(data);
				var id = data.getElementsByTagName("id");
				id = $(id["0"]).text();
				if(id == "0"){
					$(geter).val($(geter).val()+"(请检查收件人用户名，数据库中找不到匹配)");
				}
				else {
					$(geter).val($(geter).val()+"("+id+")");
				}
			}
			else {
				console.log(textStatus+"出错了，请联系管理员douunasm@gmail.com,谢谢");
			}
		}
	});
}
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
