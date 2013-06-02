function loginA (name,data) {
	//loginAlready 登陆之后的工作

	if(!user_id.length){//还没登录的话，进行下面操作
		user_name = name;
		user_id = data["user_id"];
		var temp = "<div id = 'denter' class = 'denter'><p><a target = '_blank' href = "+site_url+"/write/index >新帖</a><a id = 'zhu' href = "+site_url+"/destory/zhuxiao >注销</a><a href = "+site_url+"/message/index >邮箱";
		temp+=(data["mailNum"] > 0)?("<sup>"+data["mailNum"]+"</sup>"):("");
		temp+= "</a></p><p>欢迎您:<a target = '_blank' href = "+site_url+"/space/index/"+data["user_id"]+">";
		temp+=(data["comNum"] > 0)?(name+"<sup>"+data["comNum"]+"</sup>"):(name);
		temp+="</a></p></div>";
		$("#dirUl").before(temp);
	$("#zhu").click(function  (e) {//为注销添加事件，注销成功则生成登陆按钮
		$.ajax({
			url:site_url+"/destory/zhuxiao",
			success:function  (data) {
				if (data == 1){
					user_id = null;
					$("#denter").hide();
					$("#change").hide();
					//window.location.reload();//刷新的按钮
				}
			}
		})
		return false;
	});
	}
}
$(document).ready(function(){
	mouse();
	user_id = $.trim(user_id);
	var reg = /\d+$/,art_id;
	/*特殊情况呢
	 * http://www.edian.cn/index.php/showart/index/88?sea=&sub=
	 */
	art_id = reg.exec(window.location.href)[0];
	if(user_id.length){
		var temp = new Array();
		temp["user_id"] = user_id;
		loginA(user_name,temp);
	}
	$("#dirUl a").each(function  () {
		var temp = reg.exec(this.href);
		if(temp){
			if(now_type == temp[0]){
				$(this).find("li").removeClass("dirmenu").addClass("liC");
				//$(this).find("span").addClass("tran");
				return false;
			}
		}
	})
	getCom(art_id);
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
				}
			});
		});
	}
	$("#msg").click(function  () {
		var userId = reg.exec(this.href);
		if(userId){
			userId = userId[0];
		}else return true;
		$("#cc").click(function  () {//cancel
			msgcc();
		});
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
		if(user_id.length==0){//先绑定之前对应的时间，然后决定是否显示隐藏
			$.alet("请登陆后发信");
			denglu(showMsg);
			return false;
		}
		showMsg();//将那块区域显示出来
		return false;
	})
});
function msgcc() {
	$("#msgatten").removeClass("high");
	$("#msgA").fadeOut();
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
function showMsg () {
	$("#comcon").animate({//不管是为了纠错什么的也好，这个开启的时候，下面貌似没有必要大开呢
		height:"33px"
	});
	$("#msgatten").addClass("high");
	$("#msgA").fadeIn();
}
function denglu (callback) {
	//关于登陆的控制js
	$("#denglu").fadeIn();
	$("#denglu").submit(function  (event) {
		var name = $.trim($(this).find("input[name = 'userName']").val());
		var passwd = $.trim($(this).find("input[name = 'passwd']").val());
		if(passwd  == "")return false;
		$.ajax({
			url:site_url+"/reg/dc/1",dataType:"json",type:"POST",data:{"userName":name,"passwd":passwd},
			success:function  (data,textStatus) {//登陆成功，返回用户id的方法貌似不错呢，或许可以修改mainpage的一些东西
				//既然显示登录区域，就代表加载了js，不必通过跳转的方式提交了
				if(textStatus == "success"){
					if(data["user_id"] == 0)
						$.alet("用户名或密码错误");
					else{
						callback();
						loginA(name,data);//显示登陆区域
						$("#denglu").hide();//隐藏登陆块
						$.alet("登陆成功");
					}
				}else console.log(data);
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
		console.log(this.action);
		$.ajax({
			url:this.action,//呵呵，这个要不要换一种方式
			type:"POST",
			data:{"com":content},
			dataType:"json",
			success:function(data,responseText) {
				//返回值，将来修改成为评论的数目，修改页面中的信息,不过，不着急
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
	//通过art_id 获得评价信息，不分页，我觉得，分页反而会增加代码量，也很少有需要分页的帖子，之后如果出现很长很长的，就再处理吧
	//之后在这里绑定时间
	$.ajax({
		url:site_url+"/showart/getCom/"+id,
		dataType:"json",
		success:function(data,responseText){
			console.log(data);
		for (var i = 0,len = data.length; i < len; i++) {
			data[i]["comment"]=data[i]["comment"].replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"face/$1.gif>");
			CCA(data[i]["comment"],data[i]["reg_time"],data[i]["name"],data[i]["user_id"],data[i]["photo"],data[i]["comment_id"],i+1);
		};
		$("#ulCont").delegate(".thumb ","mouseenter",function  () {
			$(this).find("p").fadeOut();
		}).delegate(".thumb","mouseleave",function  () {
			$(this).find("p").fadeIn();
		})
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
	$(li).append("<a  class = 'thumb' href = '"+site_url+"/space/index/"+userId+"'><img class = 'block' title = '"+name+"' src = '"+base_url+"upload/"+photo+"'/></a>");
	$(li).append("<p >"+cont+"</p>");
	$(li).append("<span class = 'tt atime'>"+name+"--"+layer+"楼 -- "+time+"</span>");
	layer++;
	$("#ulCont").append(li);
}
function getName (name) {//通过传入的url获得其中隐藏的图片名称
	var reg = /(\d+).gif$/;
	return reg.exec(name)[1];
}
function com() {//controller the comment area hide or show
	$("#comcon").focus(function(){
			console.log(user_id);
		if((user_id == "")||(user_id == null)){
			$.alet("请登陆后发表评论");
			denglu(showJ);
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
	$("#comcon").animate({
		height:"200px"
	},'fast');
	$("#face").fadeIn();
	$("#subcom").fadeIn();
	$("#giveup").fadeIn();
}
function giveUpFun () {
	var node  = document.getElementById("comcon").value = "";
	$("#face").fadeOut();
	$("#comcon").animate({
		height:"33px"
	});
	$("#judge .pholder").show();
	$("#subcom").fadeOut();
	$("#giveup").fadeOut();
}
function mouse () {
	//睡觉了，下面就是关于位置的判断http://www.neoease.com/tutorials/cursor-position/
	var dir = 1;//前后三次，对比是否是水平滑动-》角度在30度以内的2*y>x
	//dir 表示侧边栏的状态，1表示上次向右，已经展开，2向左，闭合的状态，初始状态为打开，为1
	var sp = {x:0,y:0},ep = {x:0,y:0};
	document.addEventListener("touchstart",first,true);
	document.addEventListener("touchmove",move,true);
	function first (event) {
		event = event.touches[0];
		sp.x = event.clientX;
		sp.y = event.clientY;
	}
	var ulCont = $("#content");
	var dir = $("#dir");
	function move (event) {
		document.removeEventListener("touchmove",move,true);
		var ev = event.touches[0];
		ep.x = ev.clientX;
		ep.y = ev.clientY;
		var y = Math.abs(ep.y-sp.y);
		var x = ep.x - sp.x;
		if((dir == 1)&&(2*y<(-x))){//x 小于0代表左滑动，关闭
			event.preventDefault();
			hide();
			dir = 2;	
		}else if((dir == 2)&&(2*y<x)){//大于0向右滑动，打开，dir为2，状态
			event.preventDefault();
			dir = 1;	
			show()	;
		}
		setTimeout(function  () {
			document.addEventListener("touchmove",move,true);
		},500);
	}
	function show () {
		//控制边栏的显隐和主要区域的移动
		dir.css("top",$(window).scrollTop());
		dir.css("display","block");
		ulCont.animate({
			"margin-left":"250px"
		},200);
	}
	function hide () {
		dir.css("display","none");
		ulCont.animate({
			"margin-left":"0px"
		},200);
	}
	//控制边框的显示隐藏和旁边body的显示margin,效果一般，不绚烂，漂亮的将来作吧
	//整合到dir.js中
	var flag = 1;//1 表示还在显示，0表示正在隐藏中
	$("#hiA").click(function  () {
		console.log("testing");
		flag?hide():show();
		flag = 1-flag;
	});
}
