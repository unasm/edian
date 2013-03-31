$(document).ready(function(){
	var name = false,pass = false,phone = false,photo = false;
	$("#content input[name = 'userName']").blur(function  () {
		name = $(this).val();
		console.log(site_url+"/reg/get_user_name/"+name);
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
		}
	});
	$("#content input[name = 'contra']").focus(function  () {
		$("#contra").text("请输入手机或电话号码");
	});
	$("#content input[name = 'contra']").blur(function  () {
		phone = $(this).val();
		if(phone.length == 0)return;
		if(phone.length === 13){
			var reg = /^[1]\d{12}$/;
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
				report("请输入用户名","#name","red");
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
			if(photo == false){
				$("#content input[name = 'photo']").val("");
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
