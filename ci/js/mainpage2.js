/*
   author:			unasm
   email:			douunasm@gmail.com
   last_modefied:	2013/04/05 04:33:37 PM
   */
var seaFlag,passRight;
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
	$("#dir input[name = 'showsub']").click(function  () {
		checkUserName();
		$("#ent").animate({
			opaacity:'toggle',
			height:'toggle',
		},400);
		$(this).val("显示登陆");
	});
}
function changePart () {
	//处理修改板块时候发生的事情
	var reg = /(\d*)(#\d)?$/;//partId标示浏览板块的页数
	$("#dirUl").delegate("#dirUl a","click",function(event){
		seaFlag = 0;
		var last = $("#dirUl").find(".liC");
		$(last).removeClass("liC").addClass("dirmenu");
		$(last).find(".tran").removeClass("tran");
		$(this).find("span").addClass("tran");
		$(this).find("li").removeClass("dirmenu").addClass("liC");
		temp = reg.exec($(this)[0].href)[1];
		if(temp!=now_type){
			$("#ulCont").empty();
			$("#bottomDir ul").empty();
			now_type = temp;
			autoload(now_type);
		}
		event.preventDefault();
		return false;
	});	
	/********作用高亮当前板块***********/
	if(now_type == undefined || now_type == "")now_type =0;
	$("#dirUl a").each(function  () {
		if(reg.exec(this.href)[0] == now_type){
			$(this).find("span").addClass("tran");
			$(this).find("li").removeClass("dirmenu").addClass("liC");
			return false;
		}
	});
	/**************/
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
		console.log(site_url+"/search/index?key="+keyword);
		$.getJSON(site_url+"/search/index?key="+encodeURI(keyword),function  (data,status) {
			console.log(data);
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
$(document).ready(function(){
	seaFlag = passRight = 0;
	getCon = getTotal = null;
	var reg = /(\d*)(#\d)?$/,partId = 1;//partId标示浏览板块的页数
	tse();//显隐控制
	init();//登陆的初始化
	search();//搜索时候的函数
	/**************处理关于当前板块的东西************/
	var temp = reg.exec(window.location.href)[1];
	if(temp) now_type = temp;
	/*******************/
	$("#ent").hide();
	changePart();
	autoload(now_type);
	showInfo();
});
function showInfo () {
	//控制用户信息悬浮的函数I;
	var inarea = 0,info,lastCon = null;//在可悬浮区域内部外部标志变量
	//lastCon 上一个显示出来的aImg,在进入aImg 的时候判断
	$("#ulCont").delegate(".aImg","mouseenter",function  () {
		if(lastCon != this){//在上一个,因为有进入另一个的可能性，所以需要判断新进入的和上一个是不是同一个
			$(info).fadeOut(999);//让他慢慢消失吧,一个的消失是另一个的开始
		}
		lastCon = this;//现在正在有一个显示中,将正在显示的复制
		inarea = 1;
		ct(this);
	}).delegate(".aImg","mouseleave",function  () {
		info = $(this).siblings(".userCon");//离开的时候将她赋值，成为全局变量,方便之后隐藏
		inarea = 0;
		close();
	}).delegate(".userCon","mouseenter",function  () {
		inarea = 1;//单纯的延长时间
	}).delegate(".userCon","mouseleave",function  () {
		inarea = 0;
		close();
	})
	function ct (node) {
		//count Time,在一个图片停放一定时间才决定要不要显示信息
		setTimeout(function  () {
			if((lastCon == node)&&(inarea))//只有是同一个图片，中间没有改变，并且还在区域内部才可以
			$(node).siblings(".userCon").fadeIn();
		},350);//或许事件有点短，步步哦，太长了就不好，而且，只是针对滑过的情况其实足够了
	}
	function close () {
		//延迟0.5S，之后不在显示区域就隐藏
		setTimeout(function  () {
			if(inarea == 0){
				$(info).fadeOut();
				lastCon = null;//当前已经没在显示的了
			}
		},500);
	}
}
function checkUserName () {
	//通过ajax检验用户的名称，获得对应的密码
	$("#ent input[name='userName']").blur(
			function ()	{
				var name=$.trim($(this).val());
				if((name == "")||(name =="用户名")||(name == undefined)){
					return;
				}
				$.ajax({
					url:site_url+"/reg/get_user_name/"+encodeURI(name),
					success:function  (data) {
						console.log(data);
						user_id=data.getElementsByTagName('id');//这里曾经出现过错误，看来错误处理其实也需要呢,好像是找不到user——id
						user_id=$(user_id[0]).text();
						if(user_id!="0"){
							user_name = name;
							$("#atten").html("<b class ='safe'>用户名正确</b>");
							var pass = $("#passwd").val();
							((pass != undefined)&&(pass!="密码") &&(pass !=""))?checkPasswd(user_id,pass):checkUserPasswd();
						}
						else {
							$("#atten").html("<b class='danger'>用户名错误</b>");
						}
					},
					error: function  () {
						$("#atten").html("<b class = 'danger'>失败了，请检查网络 </b>")
					}
				});
			}
	);
}
function checkPasswd (userId,pass) {
	$.ajax({
		url:site_url+"/reg/getPass/"+userId+"/"+encodeURI(pass),
	dataType:"json",
	success:function(data){
		if(data == '1'){
			$("#atten").html("<b class = 'safe'>密码正确</b>");
			passRight = 1;//需要监听enter事件
		}	
		else {
			$("#atten").html("<b class = 'danger'>密码错误</b>");
			passRight = 0;
		}
	}
	});
}
function checkUserPasswd () {
	//只有在获得与user_name相对应的密码的时候才可以帮绑定事件
	$("#ent input[name='passwd']").blur(function(){
		var sec=$(this).val();
		if((sec == "")||(sec =="密码")||(sec == undefined)){
			return;
		}
		checkPasswd(user_id,sec);
	});
}
function ALogin (user_name,user_id,passwd) {
	//对登陆验证正确之后，进行各种处理，比如，隐藏登陆按钮，更新cookie,首先生成服务端的session，成功就生成cookie
	//生成注销的按钮还有待完成
	//第二次通信，在服务端生成真正的session
	$.ajax({
		url:site_url+"/reg/dc/"+user_id+"/"+encodeURI(passwd),
		dataType:"json",
		success:function(data){//返回数组，方便将来扩展
			console.log(data);//扩展到了，添加mailNum和comNum
			if(data["flag"]  == 0){
				$("#atten").html("<b class = 'danger'>登陆失败</b>");
			}
			else {
				cre_zhuxiao(data["photo"],user_name,data["mailNum"],data["comNum"]);
				$("#atten").hide();
				$.cookie("user_name",user_name,{expires:7});//cookie用在登陆地方了
				$.cookie("user_id",user_id,{expires:7});
			}
		},
	});
}
function cre_zhuxiao (photo,name,mail,com) {
	//登陆之后的按钮处理，注销的事件绑定//发现photo太占地方了，目前取消
	$("#ent").detach();
	$("#denter").empty();
	if(mail>0)
		$("#denter").append("<p><a target = '_blank' href = "+site_url+"/write/index"+">新帖</a><a id = 'zhu' href = "+site_url+"/destory/zhuxiao"+">注销</a><a  target = '_blank' href = "+site_url+"/message/index"+">邮箱<sup>新"+mail+"</sup></a></p>");
	else 
		$("#denter").append("<p><a target = '_blank' href = "+site_url+"/write/index"+">新帖</a><a id = 'zhu' href = "+site_url+"/destory/zhuxiao"+">注销</a><a  target = '_blank' href = "+site_url+"/message/index"+">邮箱</a></p>");
	if(com>0)
		$("#denter").append("<p>欢迎您,<a target = '_blank' href = "+site_url+"/space/index/"+user_id+">"+name+"<sup>新"+com+"</sup></a></p>");
	else
		$("#denter").append("<p>欢迎您,<a target = '_blank' href = "+site_url+"/space/index/"+user_id+">"+name+"</a></p>");
	$("#zhu").click(function  (e) {//为注销添加事件，注销成功则生成登陆按钮
		$.ajax({
			url:site_url+"/destory/zhuxiao",
			success:function  (data) {
				if (data == 1){
					window.location.reload();//刷新的按钮
				}
			},
		});
		return false;
	});
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
function getInfo (type,partId) {
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+type+"/"+partId,
	dataType:"json",
	success:function  (data,textStatus) {
		if(textStatus == "success"){
			seaFlag = 0;
			if (data.length == 0) 	return false;
			if(type != now_type)return false;
			formPage(data,partId);//生成页面dom
		}
	},
	error: function  (xml) {
		console.log(xml);
	}
	})
}
function autoload(id) {
	//这里是进行自动加载的，根据用户的鼠标而改变，id表示当前浏览的版块，
	//之所以出现bug的原因，是因为没有清空之前板块的请求
	var timer = 0,height,stp=0,total = -1,pageNum = 16,doc = document;
	$.ajax({
		url:site_url+"/mainpage/getTotal/"+id,
		type:"json",
		beforeSend:function  () {total = -1;},
		success:function  (data,textStatus) {
			if ((textStatus=="success")&&(id == now_type)) {
				total = data;
			}
			else  console.log(data);
		},
	});
	autoAppend();//控制时序，避免页数颠倒
	function autoAppend () {
		$.ajax({
			url:site_url+"/mainpage/infoDel/"+id+"/"+(++stp),
			dataType:"json",
			success:function  (data,textStatus) {
				console.log(data);
				if(id!=now_type)return false;
				if(textStatus == "success"){
					if (data.length == 0) return false;
					if(formPage(data,stp)){//生成页面dom;
						if(doc.height <=$(window).height()&& (stp<5))//如果页面高度没有屏幕高，再申请
			autoAppend();
					}
					$(window).scroll(function  () {
						if((timer === 0) && (seaFlag === 0)){//!timer貌似有漏洞,每次只允许一个申请
							timer = 1;//进入后立刻封闭if，防止出现两次最后一页//如果在搜索过程中，滚动无效，如果已经发出了请求中，成功之前请求无效;
							setTimeout(function  () {
								height = $(window).scrollTop()+$(window).height();
								if((height+150)> $(doc).height()){
									if((pageNum*stp > total)&&(total != -1)){
										if(id!=now_type)//因为需要是异步加在，所以或许已经change_part这边还是没有修改过来变量，执行的，依旧是之前的id
								return false;
							$("#ulCont").append("<p class = 'pageDir'>最后一页</p");
							total = -1;
							return  false;
									}else if(seaFlag == 0){
										seaFlag = 1;//禁止成功之前的请求
										getInfo(id,++stp);
									}
								}
								timer = 0;
							},300);
						}
					});
				}
			},
			error: function  (xml) {
				console.log(xml);
			}
		});
	}

}
function ulCreateLi(data,search) {
	//这个文件创建一个li，并将其中的节点赋值,psea有待完成,photo还位使用
	//肮脏的代码，各种拼字符串
	var doc = document;
	var li=doc.createElement("li");
	$(li).addClass("mainli");
	$(li).append("<a class = 'aImg' href = '"+site_url+"/showart/index/"+data["art_id"]+"' target = '_blank'><img  class = 'imgLi block' src = '"+base_url+"upload/"+data["img"]+"' alt = '"+data["user"]["user_name"]+"的头像"+"' title = "+data["user"]["user_name"]+"/></a>");
	$(li).append("<a target = '_blank' href = '"+site_url+"/showart/index/"+data["art_id"]+"'><p class = 'detail'>"+data["title"]+"</p></a>");
	$(li).append("<p class = 'user tt '><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+"><span class = 'master tt'>店主:"+data["user"]["user_name"]+"</span></a><span class = 'price'>￥:"+data["price"]+"</span></p>");
	$(li).append("<p class = 'user clearfix'>浏览:"+data["visitor_num"]+"/评论:"+data["comment_num"]+"<span class = 'time'>"+data["time"]+"</span></p>");
	var div = doc.createElement("div");
	$(div).addClass("block userCon");
	$(div).append("<p class = 'utran'></p><p class = 'clearfix'><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+"><img class = 'imgLi block' src = '"+base_url+"upload/"+data["user"]["user_photo"]+"'/></a><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+" class = 'fuName tt'>"+data["user"]["user_name"]+"</a><a target = '_blank' href = "+site_url+"/message/write/"+data["author_id"]+">站内信联系</a></p><p><span>联系方式:</span>"+data["user"]["contract1"]+"</p>");
	if(data["user"]["addr"])
	$(div).append("<p><span>地址:</span>"+data["user"]["addr"]+"</p>");
	$(div).hide();
	$(li).append(div);
	return li;
}
function  init(){
	$("#ent form").submit(function(){
		//通过密码验证才可以登陆
		if(passRight == 0){
			$("#atten").html("<b class = 'danger'>请正确输入用户名密码</b>");
			return false;
		}
		var name = $.trim($("#ent input[name = 'userName']").val());
		var pass = $.trim($("#ent input[name = 'passwd']").val());
		ALogin(name,user_id,pass);//算是直接登陆了，只是再服务端还有判断
		return false;
	});
	if((user_id !="")){
		cre_zhuxiao(userPhoto,user_name,mail,com);//既然已经存在了，就没有必要再次登陆了吧
	}
	else {//通过cookie 登陆
		var userId = $.cookie("user_id");
		var userName = $.cookie("user_name");
		if((userId != null)&&(userId != undefined)){
			$("#userName").val(userName);//因为担心和之前绑定的冲突，所以我觉得还是在username  focus的时候，就取消掉这个密码检测
			$("#passwd").blur(function  () {
				var password = $.trim($(this).val());
				user_id = userId;
				if(password.length){
					checkPasswd(userId,password);
				}
			});
			$("#userName").focus(function  () {$('#passwd').unbind('blur')});//unsername 在试图修改的时候，取消掉密码检测
		}
		//这里设置成 ^_^没有登陆，cookie补全，获得密码后和id一起发送登陆
	}
};
