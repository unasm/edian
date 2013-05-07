/***********
 *	author:			unasm
 *	email:			douunasm@gmail.com
 *	Last_Modefied:	2013/05/07 09:10:49 PM
 *	这里是为了修改用户的个人信息而存在的js
 */
$(document).ready(function  () {
	console.log("change");
	var name = true,phone = true,userName = $("#content input[name = 'userName']");
	$(userName).blur(function  () {
		namecheck(userName);
	})
	function namecheck(node){
		name = $(node).val();
		if(name == user_name)return false;
		if(name != ""){
			$.get(site_url+"/reg/get_user_name/"+name,function(data,status) {
				if(status === "success"){
					var id = $(data.getElementsByTagName('id')[0]).text();
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
	}
	$("#content input[name = 'contra']").blur(function  () {
		phone = $.trim($(this).val());
		if(phone.length == 0){
			phone = false;
			return;
		}
		if(phone.length === 11){
			var reg = /^[1]\d{10}$/;
			if(reg.exec(phone) === null){
				report("请正确输入手机号","#contra","red");
				phone = false;
			}
			else {	
				phone = true;
				report("手机号码","#contra","green");
			}
		}
		else {
			reg = /^\d{3}[-]\d{7}$/;
			if(reg.exec(phone) === null){
				report("联系方式错误","#contra","red");
				phone = false;
			}else {
				phone = true;
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
	$("form").submit(function  () {
		if (!name) {
			report("请输入适合的用户名","#name","red");
			return false;
		}
		if(!phone){
			report("请至少输入一种联系方式","#contra","red");
			return false;
		}
		if(!photo)$("#content input[name = 'photo']").val("");
	});
})
function report (cont,select,color) {
	$(select).text(cont);
	$(select).css("color",color);
}
