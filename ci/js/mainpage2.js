function tse(){	
	$("#search").focus(function(){
		$("#search").removeAttr("value");
	})
}
$(document).ready(function(){
	console.log($("#dir input[name='enter']").val());
	$("#dir input[name = 'enter']").click(function(){
		var val = $("#dir input[name='userName']").val();
		var passwd  = $("#dir input[name='passwd']").val();
		if(val != "用户名" && passwd != "密码"){
			login(val,passwd);
		}
		else {
			$("#ent").slideToggle("19");
		}
	});
	$("#dir").mouseleave(function (){
		console.log("testing");
		$("#ent").slideUp();
	});
});
function login( val,passwd){

}
