$(document).ready(function(){
	var reg = /\d+$/,art_id;
	art_id = reg.exec(window.location.href)[0];
	getCom(art_id);
	subCom();
	//var time = new Date.format("yyyy-MM-dd hh:mm:ss");
	$("#face").delegate("img","click",function(){
		var temp=getName(this.src);
		var content=document.getElementsByName("com")[0];
		content.value=content.value+"[face:"+temp+"]";
	});
});
function subCom() {
	//初始化的函数
	$("#judge form").submit(function(){
		var node = document.getElementById("comcon");
		content = node.value;
		content=content.replace(/\n/g,"<br/>");
		$.ajax({
			url:this.action,//呵呵，这个要不要换一种方式
			type:"POST",
			data:{"com":content},
			dataType:"json",
			success:function(data,responseText) {
				node.value = "";
				content=content.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"face/$1.gif>");
				CCA(data["del"],nowTime(),$.cookie("user_name"),$.cookie("user_id"),data["photo"],data["comment_id"]);
			},
			error:function(xml){
				console.log(xml);
			}
		});
		return false;
	});
}
function nowTime () {
	//获得本地的时间"2013-4-6 20:27:32"的形式
	var time=new Date();
	return time.getFullYear()+"-"+(time.getMonth()+1)+"-"+time.getDate()+" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds();
}
function getCom (id) {//或许设置成滚动加载比较好
	//通过art_id 获得评价信息，不分页，我觉得，分页反而会增加代码量，也很少有需要分页的帖子，
	$.ajax({
		url:site_url+"/showart/getCom/"+id,
		dataType:"json",
		success:function(data,responseText){
			for (var i = 0; i < data.length; i++) {
				CCA(data[i]["comment"],data[i]["reg_time"],data[i]["name"],data[i]["user_id"],data[i]["photo"],data[i]["comment_id"]);
			};
		},
		error:function(xml){
		}
	});
}
function CCA(cont,time,name,userId,photo,comId) {
	//comId目前不准备使用,以后添加修改评论功能吧，创建评论的li
	//用户评论后生成内容,好挫
	var li = document.createElement("li");
	$(li).append("<a href = '"+site_url+"/space/index/"+userId+"'><img class = 'thumb' title = '"+name+"' src = '"+base_url+"upload/"+photo+"'/></a>");
	$(li).append("<p>"+cont+"</p>");
	$(li).append("<span class = 'time'>"+time+"</span>");
	$("#ulCont").append(li);
}
function getName (name) {
	//通过传入的url获得其中隐藏的图片名称,其实使用正则超级简单的
	return temp;
}
function com() {//controller the comment area hide or show
	$("#judge textarea").focus(function(){
		$("#judge .pholder").hide();
		$("#judge .sli").css({position:"relative"}).animate({
			height:"200px",
		},'fast')
		$("#face").fadeIn();
		$("#judge input").fadeIn();
	});
	$("#giveup").click(function(){
		var node  = document.getElementById("comcon");
		node.value = "";
		$("#judge input").fadeOut();
		$("#face").fadeOut();
		$("#judge .sli").css({position:"relative"}).animate({
			height:"20px",
		},'fast');
		$("#judge .pholder").show();
	});
}
