$(document).ready(function(){
	var reg,name = false,pass = false,phone = false,photo = false;
	var userName = $("#content input[name = 'userName']");
	$("#check").click(function  () {
		$.get(site_url+"/checkcode/index",function  (data,status) {
			document.getElementById("check").src = site_url+"/checkcode/index/"+(new Date()).getTime();
		});
	})
	 function namecheck(node){
		name = $(node).val();
		if(name != ""){
			$.get(site_url+"/reg/get_user_name/"+name,function(data,status) {
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
var temp = $(userName).val();
	if(temp != "")
		namecheck(userName);
	$(userName).blur(function  () {
		namecheck(this)	;
	});
	$("#content input[name = 'contra']").focus(function  () {
		$("#contra").text("请输入手机或电话");
	});
	$("input[name = 'passwd']").focus(function  () {
		report("密码太短，太简单容易泄密哦!","#pass","green");
	});
	$("#incheck").blur(function  () {
		var value = $(this).val();
		$.get(site_url+"/checkcode/check/"+value,function  (data,status) {
			if(status == "success" && (data == 1)){
				report("验证码正确","#spanCheck","green");
			}
		})	
	}).focus("$('#spanCheck').text('点击图片切换验证码')");
	$("#content input[name = 'contra']").blur(function  () {
		phone = $.trim($(this).val());
		if(phone.length == 0){
			phone = false;
			return ;
		}
		if(phone.length === 11){
			var reg = /^[1]\d{10}$/;
			if(reg.exec(phone) === null){
				report("请正确输入手机号","#contra","red");
			}
			else {	
				report("手机号码","#contra","green");
			}
		}
		else {
			reg = /^\d{3}[-]\d{6}$/;
			if(reg.exec(phone) === null){
				report("联系方式错误","#contra","red");
			}else {
				report("电话号码","#contra","green");
			}
		}
	});
	$("#content input[name = 'userfile']").change(function  () {
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
				report("请输入联系方式","#contra","red");
				return false;
			}
		}
		else {
			report("两次输入密码不相同","#pass","red");
			return false;
		}
	})
});
function report (cont,select,color) {
	$(select).text(cont);
	$(select).css("color",color);
}
