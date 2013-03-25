$(document).ready(function(){
	getCom(art_id);
	subCom(art_id);
	getFace();
});
function subCom(artId) {
	//初始化的函数
	$("#submit").click(function(){
		//var content = $("#commentContent").text();
		var node = document.getElementById("commentContent");
		content = node.value;
		content=content.replace(/\n/g,"<br/>");
		$.ajax({
			url:site_url+"/showart/addCom/"+artId,
			type:"POST",
			async: true,
			data:{"content":content},
			success:function(responseText) {
				node.value = "";
				var id = responseText.getElementsByTagName("comId");
					id = $(id).text();
					content=content.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"face/$1.gif>");
					var li = creComArea(content,nowTime(),$.cookie("user_name"),$.cookie("user_id"),$.cookie("user_photo"),id);
					$("#commentUl").append(li);
			},
			error:function(xml){

			}
		});
		return false;
	});
}
function nowTime () {
	//获得本地的时间"2010-2-23"的形式
	var time=new Date();
	var res="";
	res+=time.getFullYear();
	res+="-"+(time.getMonth()+1);
	res+="-"+time.getDate();
	return res;
}
function getFace () {
	$("#face").delegate("img","click",function(){
		var temp=getGifName(this.src);
			//这里没有使用jquery，因为不稳定的样子	
		var content=document.getElementById("commentContent");
		content.value=content.value+"[face:"+temp+"]";
	});
}
function getGifName (name) {
	//通过传入的url获得其中隐藏的图片名称,其实使用正则超级简单的
	var res="",flag=0;
	for(var i=name.length-1;i>=0;i--){
		if(name[i]=='/')break;
		if(flag)
			res+=name[i];
		else if(name[i]=='.')flag=1;
	}
	var temp="";
	for(var i=res.length-1;i>=0;i--){
		temp+=res[i];
	}
	return temp;
}
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
				var value = $(comment[i]).text();
				value = value.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"face/$1.gif>");
				var li = creComArea(value,$(time[i]).text(),$(userName[i]).text(),$(userId[i]).text(),$(userPhoto[i]).text(),$(comId[i]).text());
				if((i%2)==0){
					$(li).addClass("odd");
				}
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
