$(document).ready(function  () {
	var value;
	$("#sorry").click(function  () {
		alert("抱歉，让您选择\"其他\"是我们分类的不够细致，请联系管理员"+admin+"帮忙");
	})
	$("input[name = 'price']").blur(function  () {
		value = $.trim($(this).val());
		console.log(value);
		reg = /^\d+.?\d*$/;
		if(!reg.exec(value)){
			$("#patten").text("不是数字的话导致发帖失败的");
		}
	}).focus(function  () {
		$("#patten").text("请输入数字，小数");
	})
	$("input[type = 'file']").change(function  () {
		value = $.trim($(this).val());
		console.log(value);
		reg = /.[gif|jpg|jpeg|png]$/i;
		if(!reg.exec(value)){
			$("#imgAtten").text("只有gif,png,jpg格式图片可以");	
		}
	})
})

