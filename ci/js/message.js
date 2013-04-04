$(document).ready(function  () {
	console.log("testging");
	console.log(site_url+"/message/"+get);
	getData(get);
	$("#dirUl .mail").click(function  () {
		var href = $(this)[0].href;
		console.log(href);
		var reg = /age$/
		console.log(reg.exec(href));
		if (reg.exec(href)) {
			get = "getbox";
		}
		else{
			get = "getBoxData";
		}
		getData(get);
		event.preventDefault();
	});
});
function getData (path) {
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
				 $(li).append("<p class = 'detail infoLi' title ='"+data["cont"][i]["title"]+"'><a href = '"+site_url+"/message/send/"+data["cont"][i]["messageId"]+"'>"+data["cont"][i]["title"]+"</a></p>");
				 $(li).append("<p class = 'user tt'>"+data["sender"][i]["user_name"]+"</p>");
				 $(li).append("<p class = 'user'>"+data["cont"][i]["time"]+"</p>");
				 $(cont).append(li);
			};
			$("#content").append(cont);
		},
		error:function  (xml) {
			console.log(xml);
		}
	});
}
