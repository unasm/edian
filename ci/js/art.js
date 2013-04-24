$(document).ready(function(){
	var reg = /\d+$/,art_id;
	art_id = reg.exec(window.location.href)[0];
	$("#dirUl a").each(function  () {
		var temp = reg.exec(this.href);
		if(temp){
			if(now_type == temp[0]){
				$(this).find("li").removeClass("dirmenu").addClass("liC");
				$(this).find("span").addClass("tran");
				return false;
			}
		}
	})
	getCom(art_id);
	$("#face").hide();
	$("#denglu").hide();
	tse();//控制input text中的显隐
	subCom();//下面评论的提交
	com();//控制评论区域的显隐
	//var time = new Date.format("yyyy-MM-dd hh:mm:ss");
	$("#face").delegate("img","click",function(){
		temp=getName(this.src);
		var content=document.getElementsByName("com")[0];
		content.value=content.value+"[face:"+temp+"]";
	});
	user_id = $.trim(user_id);
	if(user_id.length){
		$("#after").show();
		$("#dir input[name = 'zhu']").click(function  () {//为注销添加事件，注销成功则生成登陆按钮
			$.ajax({
				url:site_url+"/destory/zhuxiao",
				success:function  (data) {
					if (data == 1){
						window.location.reload();//刷新的按钮
					}
				},
			});
		});
	}
});
function tse(){	
	var val;//控制页面点击消失提示字的函数
	$(".valTog").focus(function(){
		val = $(this).val();
		$(this).removeAttr("value");
	}).blur(function(){
		if($(this).val()==""){
			$(this).attr("value",val);
		}
	});
}
function denglu () {
	//关于登陆的控制js
	$("#denglu").fadeIn();
	$("#denglu").submit(function  (event) {
		var name = $(this).find("input[name = 'userName']").val();
		var passwd = $(this).find("input[name = 'passwd']").val();
		if(passwd  == "")return false;
		$.ajax({
			url:site_url+"/reg/artD/"+name+"/"+passwd,
			dataType:"json",
			success:function  (data,textStatus) {//登陆成功，返回用户id的方法貌似不错呢，或许可以修改mainpage的一些东西
				if(textStatus == "success"){
					if(data == 0)
			$.alet("密码错误");
					else if(data == -1)
			$.alet("名字错误，不存在该用户");
					else{
						user_name = name;
						user_id = data;
						$.alet("登陆成功");
						$("#denglu input").fadeOut();
					}
				}else{
					console.log(data);
				}
			},
			error:function  (xml) {
				console.log(xml);
			}
		})
		event.preventDefault();
	});
}
function subCom() {
	//初始化的函数
	$("#comform").submit(function(){
		var node = document.getElementById("comcon");
		content = node.value;
		if(node.value == "")return false;
		content=content.replace(/\n/g,"<br/>");
		$.ajax({
			url:this.action,//呵呵，这个要不要换一种方式
			type:"POST",
			data:{"com":content},
			dataType:"json",
			success:function(data,responseText) {
				if(data == "0"){
					$.alet("请首先登陆");
					denglu();
					return false;
				}
				giveUpFun();
				node.value = "";
				content=content.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"face/$1.gif>");
				if((user_id != undefined)&&(user_id !=""))
			CCA(content,nowTime(),user_name,user_id,data["photo"],data["comment_id"]);
				else 
			CCA(content,nowTime(),$.cookie("user_name"),$.cookie("user_id"),data["photo"],data["comment_id"]);
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
			data[i]["comment"]=data[i]["comment"].replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"face/$1.gif>");
			CCA(data[i]["comment"],data[i]["reg_time"],data[i]["name"],data[i]["user_id"],data[i]["photo"],data[i]["comment_id"],i+1);
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
	$(li).append("<a href = '"+site_url+"/space/index/"+userId+"' target = '_blank'><img class = 'thumb' title = '"+name+"' src = '"+base_url+"upload/"+photo+"'/></a>");
	$(li).append("<p >"+cont+"</p>");
	$(li).append("<span class = 'time'>"+name+"--"+layer+"楼 -- "+time+"</span>");
	layer++;
	$("#ulCont").append(li);
}
function getName (name) {//通过传入的url获得其中隐藏的图片名称
	var reg = /(\d+).gif$/;
	return reg.exec(name)[1];
}
function com() {//controller the comment area hide or show
	$("#comcon").focus(function(){
		if((user_id == "")||(user_id == null)){
			$.alet("请登陆后发表评论");
			denglu();
			return false;
		}
		$("#judge .pholder").hide();
	//	$("#judge .sli").css({position:"relative"}).animate({
		$(".sli").animate({
			height:"200px",
			width:"590px",	
		},'fast');
		$("#comcon").animate({
			height:"200px",
		},'fast');
		$("#face").fadeIn();
		//$("#comform input").fadeIn();
	});
	$("#giveup").click(function(){
		giveUpFun();
	});
}
function giveUpFun () {
	var node  = document.getElementById("comcon").value = "";
	$("#face").fadeOut();
	$(".sli").animate({
		width:"351px",
		height:"33px"
	},'fast');
	$("#comcon").animate({
		height:"33px",
	});
	$("#judge .pholder").show();
}
