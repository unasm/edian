$(document).ready(function(){
	$("#content input[name = 'userName']").blur(function  () {
		var name = $(this).val();
		if(name != ""){
			$.get(site_url+"/reg/get_user_name/"+name,function(data,status) {
				if(status === "success"){
					var id = data.getElementsByTagName('id');
					id = $(id[0]).text();
					if(id != "0"){
						$("#name").text("该用户已经存在，请更改用户名");
						$("#name").css("color","red");
					}
					else {
						$("#name").text("恭喜您，用户名可用");
						$("#name").css("color","green");
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
		var phone = $(this).val();
		if(phone.length === 13){
			var reg = /^[1]\d{12}$/;
			if(reg.exec(phone) === null){
				$("#contra").text("请正确输入手机号");
				$("#contra").css("color","red");
			}
			else {	
				$("#contra").text("手机号码");
				$("#contra").css("color","green");
			}
		}
		else {
			reg = /^\d{3}[-]\d{6}$/;
			if(reg.exec(phone) === null){
				$("#contra").text("联系方式错误");
				$("#contra").css("color","red");
			}else {
				$("#contra").text("电话号码");
				$("#contra").css("color","green");
			}
		}
	});
	$("#content input[name = 'photo']").change(function  () {
		var photo = $(this).val();
		reg = /\.(jpg|jpeg|png|gif)$/i;
		if(reg.exec(photo) === null){
			$("#photo").text("图片格式应为jpg,png,gif");
			$("#photo").css("color","red");		
			photo = false;
		}
		else {
			$("#photo").text("正确");
			$("#photo").css("color","green");
			photo = true;	
		}
	});
});
