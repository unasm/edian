function getCom (id) {//或许设置成滚动加载比较好
	//通过art_id 获得评价信息，不分页，我觉得，分页反而会增加代码量，也很少有需要分页的帖子，
	$.ajax({
		url:site_url+"/showart/getCom/"+id,
		success:function(responseText){
			var comment = responseText.getElementsByTagName("comment");
			var time = responseText.getElementsByTagName("time");
			var userName = responseText.getElementsByTagName("userName");
			var userId = responseText.getElementsByTagName("userId");
			var userPhoto = responseText.getElementsByTagName("userPhoto");
			var comId = responseText.getElementsByTagName("comId");
			for (var i = 0; i < comment.length; i++) {//生成评论的板块
				var li = creComArea($(comment[i]).text(),$(time[i]).text(),$(userName[i]).text(),$(userId[i]).text(),$(userPhoto[i]).text(),$(comId[i]).text());
				$("#commentUl").append(li);
			};
		},
		error:function(xml){
			//刷新，或者联系管理员
		}
	});
}
function creComArea (cont,time,name,userId,photo,comId) {;
	//comId目前不准备使用,以后添加修改评论功能吧，创建评论的li
	var li = document.createElement("li");
	var div = document.createElement("div");
	$(div).addClass("content clearfix");
		var div2 = document.createElement("div");
		$(div2).addClass("block userInfo");
		var img = document.createElement("img");
		$(img).addClass("block thumb");
		$(img).attr("src","upload/"+photo);
		$(div2).append(img);
		var p = document.createElement("p");
		$(p).html("用户名:<span>"+name+"</span>");
		$(div2).append(p);
		p = document.createElement("p");
		$(p).html("在线:<span>否</span>");
		$(div2).append(p);
		$(div).append(div2);
			div2 = document.createElement("div");
			$(div2).addClass("commentInfo");
			$(div2).append("<p>"+cont+"</p><p class = 'time'>发表于"+time+"</p>");
			$(div).append(div2);
	$(li).append(div);
	return li;
}
