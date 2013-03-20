function tse(){	
	$("#search").focus(function(){
		$("#search").removeAttr("value");
	})
}
$(document).ready(function(){
	tse();
});
