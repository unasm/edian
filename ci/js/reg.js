$(document).ready(function(){
	var reg,name = false,pass = false,photo = false,phone = false,imgCheck = false;
	var userName = $("#content input[name = 'userName']");
	$("#check").click(function  () {
		$.get(site_url+"/checkcode/index",function  (data,status) {
			document.getElementById("check").src = site_url+"/checkcode/index/"+(new Date()).getTime();
		});
	})
	/********对输入的用户名检查*************/
	 function namecheck(node){
		name = $.trim($(node).val());
		if(name.length){
			$.get(site_url+"/reg/get_user_name/"+encodeURI(name),function(data,status) {
				if(status === "success"){
					var id = data.getElementsByTagName('id');
					id = $(id[0]).text();
					if(id != "0"){
						report("该用户已经存在，请更改","#name","red");
						name = false;
					}
					else {
						name = true;
						report("恭喜，用户名可用","#name","green");
					}
				}
				else {
					$("#name").text(status);
				}
			});
		}else report("请输入用户名","#name","red");
	}
	 var temp = $.trim(userName.val());
	if(temp != "")
		namecheck(userName);//担心发表失败后返回没有检查的情况
	$(userName).blur(function  () {
		namecheck(this)	;
	});
	 /**********************************/

	$("input[name = 'passwd']").blur(function  () {
		value = $.trim($(this).val());
		if(value.length<=5)
			report("太短,太简单的密码容易被破解哦","#pass","green");
		else $("#pass").text("");
	});
	/****************密码检查*******************/
	$("#incheck").blur(function  () {
		var value = $.trim($(this).val());
		if(value.length == 0)return false;
		$.get(site_url+"/checkcode/check/"+value,function  (data,status) {
			if(status == "success" && (data == 1)){
				imgCheck = true;
				report("验证码正确","#spanCheck","green");
			}else{ report("验证码错误","#spanCheck","red");
				imgCheck = false;
			}
		})	
	}).focus(function(){
		$('#spanCheck').text('点击图片切换验证码');
	})
	/***************图片验证码检查****************/
	$("input[name = 'contra']").blur(function  () {
		$(this).unbind("keypress");
	}).focus(function  (event) {
		$("#contra").text("请输入手机或电话");
		$(this).keypress(function  (event) {
			console.log(event.which);
			if(((event.which<48)||(event.which>57))&&(event.which != 45)){
				return false;	
			}
		})
	}).change(function  () {
		value = $.trim($(this).val());
		reg = /^[\d-]{8,13}$/;
		if(reg.exec(value)){
			phone = true;
			report("验证正确","#contra","green");
		}else {
			phone = false;
			report("请正确输入号码","#contra","red");
		}
	})
	/****************手机号码的验证******************/
	$("#content input[name = 'userfile']").change(function (){
		photo = $(this).val();
		reg = /\.(jpg|jpeg|png|gif)$/i;
		if(reg.exec(photo) === null){
			report("图片格式应该为jpg,png,gif","#photo","red");
			photo = false;
		}
		else {
			report("正确","#photo","green");
			photo = true;	
		}
	});
	/*****************图片格式的验证*********************/
	$("#content form").submit(function  () {
		var pass = $("#content input[name = 'passwd']").val();
		var repass = $("#content input[name = 'repasswd']").val();
		if(name == false)	{
			report("请根据提示检测用户名","#name","red");
			return false;
		}
		if(pass == ""){
			report("请输入密码","#pass","red");
			return false;
		}
		if(pass === repass){
			if(phone == false){
				reg = /^[\d-]{8,13}$/;
				if(!reg.exec(value)){
					report("请输入联系方式","#contra","red");
					return false;
				}
			}
		}
		else {
			report("两次输入密码不相同","#pass","red");
			return false;
		}
		if(imgCheck == false){
			report("请输入验证码","#spanCheck","red");
			return false;
		}
	})
});
function report (cont,select,color) {
	$(select).text(cont);
	$(select).css("color",color);
}
