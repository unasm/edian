function getmast () {
	var reg = /[\d]+$/;
	var mastId = reg.exec(window.location.href)[0];
	if(mastId)return mastId;
	if((user_id  == "")||(user_id == null))return false;
	return user_id;
}
$(document).ready(function  () {
	var mastId = getmast();
	if(mastId == user_id){
		getJoin(user_id);
	}
});
function getJoin (userId) {
	//获得我参与的板块的数据，因为考虑到隐私？服务器，数据量等问题，用户只允许看自己参与的帖子动态
	$.getJSON(site_url+"/space/getJoin/"+userId,function  (data,status){
		if(status == "success"){
			console.log(data);
			var div = document.createElement("div");
			$(div).attr("id","join").append("<p class = 'partT'><span>我<span class = 'direc'>参</span>与的</span></p>")
			var ul = document.createElement("ul");
			$(ul).addClass("clearfix content");
			for (var i = 0; i < data.length; i++) {
				$(ul).append(creLi(data[i]));
			};
			$(div).append(ul);
			$("body").append(div);
		}else console.log(xhr);
	});
}
function creLi (data) {
	var li = document.createElement("li");
	$(li).addClass("block").append("<a title = "+data["title"]+" href = "+site_url+"/showart/index/"+data["art_id"]+"><img class = 'block liImg' src = "+base_url+"upload/"+data["img"]+" /></a>");
	$(li).append("<a class = 'detail' href = "+site_url+"/showart/index/"+data["art_id"]+">"+data["title"]+"</a>");
	$(li).append("<p class = 'user clearfix'><span class = 'part'>￥:"+data["price"]+"</span><a href = "+site_url+"/space/index/"+data["author_id"]+"><span class = 'master tt'>店主:"+data["name"]+"</span></a></p>");
	$(li).append("<p class = 'user'>浏览:"+data["visitor_num"]+"/回复:"+data["comment_num"]+"<span class = 'time'>"+data["time"]+"</span></p>");
	return li;
}
