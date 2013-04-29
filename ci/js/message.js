function delDir () {
	//只是处理刚刚来到时候的高亮问题
	var getBox = 1;
	if(get == "getbox")
		getBox = 0;
	getBox = $("#dirUl li")[getBox];
	$(getBox).removeClass("dirmenu").addClass("liC");
	$(getBox).find("span").addClass("tran");
}
$(document).ready(function  () {
	delDir();
	getData(get);
	$("#dirUl").delegate("#dirUl li","click",function(){
		var last = $("#dirUl").find("li.liC");
		last.removeClass("liC").addClass("dirmenu");
		$(last).find("span.tran").removeClass("tran");
		$(this).find("span").addClass("tran");
		$(this).removeClass("dirmenu").addClass("liC");
	});
	$(".mail").click(function  (event) {
		var href = $(this)[0].href;
		var reg = /age$/;
		if (reg.exec(href)) {
			if(get == "getbox")
			{
				event.preventDefault();
				return ;//如果原来就是这个的话，就直接返回;
			}
			get = "getbox";
		}
		else{
			if(get == "sendBoxData")
			{
				event.preventDefault();
				return;
			}
			get = "sendBoxData";
		}
		getData(get);
		event.preventDefault();
	});

});
function getData (path) {
	console.log("tedsting");
		$.ajax({
		url:site_url+"/message/"+path,
		dataType:"json",
		success:function  (data) {
			console.log(data);
			var cont = document.createElement("ul"),li;
			$(cont).addClass("clearfix");
			$(cont).attr("id","ulCont");
			for (var i = 0; i < data["cont"].length; i++) {
				 li = document.createElement("li");
				 $(li).addClass("block");
				 $(li).append("<img class = 'imgLi block' src = '"+base_url+"upload/"+data["sender"][i]["user_photo"]+"'>");
				 $(li).append("<a href = '"+site_url+"/message/send/"+data["cont"][i]["messageId"]+"'><p class = 'detail' title ='"+data["cont"][i]["title"]+"'>"+data["cont"][i]["title"]+"</p></a>");
				 $(li).append("<p class = 'user tt'>"+data["sender"][i]["user_name"]+"</p>");
				 $(li).append("<p class = 'user'>"+data["cont"][i]["time"]+"</p>");
				 $(cont).append(li);
			};
			$("#content").empty().append(cont);
		},
		error:function  (xml) {
			console.log(xml);
		}
	});
}
