$(document).ready(function  () {
	$("#sorry").click(function  () {
		alert("抱歉，让您选择\"其他\"是我们分类的不够细致，请联系管理员"+admin+"帮忙");
	})
	$("input[name = 'price']").blur(function  () {
		var price = $.trim($(this).val());
		console.log(price);
		console.log(parseFloat(price));
	}).focus(function  () {
		
	})
})

