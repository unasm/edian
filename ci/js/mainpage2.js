function tse(){	
	var val;
	$("#dir .ip").focus(function(){
		val = $(this).val();
		$(this).removeAttr("value");
	});
	$("#dir .ip").blur(function(){
		if($(this).val()==""){
			$(this).attr("value",val);
		}
	});
}
$(document).ready(function(){
	tse();
	$("#ent").hide();
	$("#dir input[name = 'enter']").click(function(){
		var val = $("#dir input[name='userName']").val();
		var passwd  = $("#dir input[name='passwd']").val();
		if(val != "用户名" && passwd != "密码"){
			login(val,passwd);
		}
		else {
			$("#ent").fadeToggle();
		}
	});
	$("#dir").mouseleave(function (){
		$("#ent").slideUp();
	});
});
function login(val,passwd){

}
