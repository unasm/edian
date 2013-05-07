$(document).ready(function(){
	search();
	var reg = /\d+$/,art_id;
	/*特殊情况呢
	 * http://www.edian.cn/index.php/showart/index/88?sea=&sub=
	 */
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
	giveUpFun();
	$("#denglu").hide();
	tse();							//控制input text中的显隐
	subCom();						//下面评论的提交
	com();							//控制评论区域的显隐
	$("#face").delegate("img","click",function(){
		temp=getName(this.src);
		var content=document.getElementsByName("com")[0];
		content.value=content.value+"[face:"+temp+"]";
	});
	user_id = $.trim(user_id);
	if(user_id.length){						//注销事件的绑定
		$("#after").show();
		$("#dir input[name = 'zhu']").click(function  () {//为注销添加事件，注销成功则生成登陆按钮
			$.ajax({
				url:site_url+"/destory/zhuxiao",
				success:function  (data) {
					if (data == 1){
						//window.location.reload();//刷新的按钮
						$("#after").hide();
					}
				},
			});
		});
	}
	$("#msg").click(function  () {
		if(user_id.length==0){
			$.alet("请登陆后发信");
			$(".sli").animate({
				width:"570px",	
				height:"85px"
			},'fast',denglu(showMsg));
			return false;
		}
		showMsg();//将那块区域显示出来
		var userId = reg.exec(this.href);
		if(userId){
			userId = userId[0];
		}else return true;
		$("input[name = 'cc']").click(function  () {//cancel
			msgcc();
		})
		$("#msgt").focus(function  (){				//控制标题的显示隐藏
			$(".plab").hide();
		}).blur(function  () {
			if($.trim($(this).val()).length==0){
				$(".plab").show()	;
			}
		})
		$("#msgA form").submit(function  () {
			var tit = $.trim($(this).find("input[name = 'title']").val());
			var geter = $.trim($(this).find("input[name = 'geter']").val());
			var cont = document.getElementById("cont");
			cont = $.trim(cont.value);
			if(tit.length == 0){
				$.alet("标题是要有的哦");
				return false;
			}
			var url = this.action+"/1";
			$.ajax({
				url:url,dataType:"json",type:"POST",
				data:{"geter":geter,"cont":cont,"title":tit},
				success:function  (data) {
					(data == "1")?$.alet("发送成功"):$.alet(data);
				}
			})	
			msgcc();//无论成功，或者失败，都要消失
			return false;
		})
		return false;
	})
});
function msgcc() {
	$("#msgatten").removeClass("high");
	$("#msgA").fadeOut();
}
function showMsg () {
	$(".sli").animate({//不管是为了纠错什么的也好，这个开启的时候，下面貌似没有必要大开呢
		height:"33px",
		width:"351px"
	});
	$("#msgatten").addClass("high");
	$("#msgA").fadeIn();
}
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
function denglu (callback) {
	//关于登陆的控制js
	$("#denglu").fadeIn();
	$("#denglu").submit(function  (event) {
		var name = $.trim($(this).find("input[name = 'userName']").val());
		var passwd = $.trim($(this).find("input[name = 'passwd']").val());
		if(passwd  == "")return false;
		$.ajax({
			url:site_url+"/reg/artD/"+encodeURI(name)+"/"+encodeURI(passwd),
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
						callback();
						$("#denglu").hide();
						$.alet("登陆成功");
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
					denglu(showJ);
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
		console.log(xml);
	}
	});
}
function CCA(cont,time,name,userId,photo,comId) {
	//comId目前不准备使用,以后添加修改评论功能吧，创建评论的li
	//用户评论后生成内容,好挫
	var li = document.createElement("li");
	$(li).addClass("alire");//art li
	$(li).append("<a href = '"+site_url+"/space/index/"+userId+"' target = '_blank'><img class = 'thumb' title = '"+name+"' src = '"+base_url+"upload/"+photo+"'/></a>");
	$(li).append("<p >"+cont+"</p>");
	$(li).append("<span class = 'atime'>"+name+"--"+layer+"楼 -- "+time+"</span>");
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
			$(".sli").animate({
				width:"570px",	
				height:"85px"
			},'fast',denglu(showJ));
			return false;
		}
		showJ();
		//$("#comform input").fadeIn();
	});
	$("#giveup").click(function(){
		giveUpFun();
	});
}
function showJ () {
	//showJudgearea，将评论区域显示出来
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
function search () {
	$("#sea").focus(function  () {
		$("#seaatten").text("");
	}).blur(function  () {
		if($.trim($("#sea").val())=="")//只有去掉空格才可以，不然会出bug
		$("#seaatten").html("搜索<span class = 'seatip'>请输入关键字</span>")
	})
	//所有关于search操作的入口函数
	var last;
	$("#seaform").submit(function  () {
		var keyword = $.trim($("#sea").val());
		if(keyword == last)return false;//担心用户的连击造成重复申请数据
		if(keyword.length == 0){
			$.alet("请输入关键字");
			return false;	
		}
		last = keyword;
		seaFlag = 1;
		now_type = -1;
		console.log(site_url+"/search/index?key="+encodeURI(keyword));
		$.getJSON(site_url+"/search/index?key="+encodeURI(keyword),function  (data,status) {
			if(status == "success"){
				if(data.length == 0){
					$.alet("你的搜索结果为0");
				}else{
					$("#ulCont").empty();
					$("#bottomDir ul").empty();
					var last = $("#dirUl").find(".liC");
					$(last).removeClass("liC").addClass("dirmenu");
					$(last).find(".tran").removeClass("tran");
					formPage(data,1,1);
					$("#content").append("<p style = 'text-align:center'><button id = 'seaMore'>更多....</button></p>")
					getNext();
				}
			}
		});
		return false;
		function getNext () {//获得搜索下一页的函数
			var page = 2;
			$("#seaMore").click(function  () {
				$.getJSON(site_url+"/search/index/"+(page-1)+"?key="+keyword,function  (data,status,xhr) {
					console.log(data);
					console.log(xhr);
					if(status == "success"){
						if(data.length == 0){
							$.alet("你的搜索结果为0");
							$("#seaMore").text("没有了").unbind();//为什么这里没有办法使用this呢
						}else{
							formPage(data,page++,1);
							if(data.length < 16){
								$("#seaMore").text("没有了");
							}
						}
					}else console.log(xhr);
				});
			});
		}
	})
}
function formPage (data,partId,search) {
	//在search和getInfo中都可以用到的东西，给一个data的函数，形成页，添加到页面中
	var page=document.createElement("div")	,li;
	$(page).addClass("page");
	for (var i = 0; i < data.length; i++) {
		if(search === undefined)
			li = ulCreateLi(data[i]);
		else li = ulCreateLi(data[i],search);
		$(page).append(li);
	}
	var p = document.createElement("p");
	$(p).addClass("pageDir");
	$(p).html("第<a name = "+partId+">"+partId+"</a>页");
	$("#ulCont").append(page).append(p);
	$("#bottomDir ul").append("<a href = #"+(partId-1)+"><li class = 'block botDirli'>"+partId+"</li></a>");
	return true;
}
function ulCreateLi(data,search) {
	//这个文件创建一个li，并将其中的节点赋值,psea有待完成,photo还位使用
	//肮脏的代码，各种拼字符串
	var doc = document;
	var li=doc.createElement("li");
	$(li).addClass("mainli clearfix");
	$(li).append("<a class = 'aImg' href = '"+site_url+"/showart/index/"+data["art_id"]+"' target = '_blank'><img  class = 'imgLi block' src = '"+base_url+"upload/"+data["img"]+"' alt = '"+data["user"]["user_name"]+"的头像"+"' title = "+data["user"]["user_name"]+"/></a>");
	$(li).append("<a target = '_blank' href = '"+site_url+"/showart/index/"+data["art_id"]+"'><p class = 'detail'>"+data["title"]+"</p></a>");
	$(li).append("<p class = 'user tt clearfix'><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+"><span class = 'master tt'>店主:"+data["user"]["user_name"]+"</span></a><span class = 'price'>￥:"+data["price"]+"</span></p>");
	$(li).append("<p class = 'user clearfix'>浏览:"+data["visitor_num"]+"/评论:"+data["comment_num"]+"<span class = 'atime'>"+data["time"]+"</span></p>");
	var div = doc.createElement("div");
	$(div).addClass("block userCon");
	$(div).append("<p class = 'utran'></p><p class = 'clearfix'><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+"><img class = 'imgLi block' src = '"+base_url+"/thumb/"+data["user"]["user_photo"]+"'/></a><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+" class = 'fuName tt'>"+data["user"]["user_name"]+"</a><a target = '_blank' href = "+site_url+"/message/write/"+data["author_id"]+">站内信联系</a></p>");
	$(div).append("<p><span>联系方式:</span>"+data["user"]["contract1"]+"</p><p><span>地址:</span>"+data["user"]["addr"]+"</p>")
		$(div).hide();
	$(li).append(div);
	return li;
}
