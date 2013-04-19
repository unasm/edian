/*
   author:			unasm
   email:			douunasm@gmail.com
   last_modefied:	2013/04/05 04:33:37 PM
   */
var seaFlag;
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
function changePart () {
	//处理修改板块时候发生的事情
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
			now_type = temp;
			autoload(now_type);
		}
		event.preventDefault();
		return false;
	});	
	/********作用高亮当前板块***********/
	var reg = /(\d*)$/;
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
	$("#seaform").submit(function  () {
		var keyword = $.trim($("#sea").val());
		seaFlag = 1;
		now_type = -1;
		if(keyword.length == 0){
			$.alet("请输入关键字");
			return false;	
		}
		$.getJSON(site_url+"/search/index?key="+keyword,function  (data,status) {
			if(status == "success"){
				if(data.length == 0){
					$.alet("你的搜索结果为0");
				}else{
					$("#ulCont").empty();
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
	seaFlag = 0;
	var reg = /(\d*)$/,partId = 1;//partId标示浏览板块的页数
	tse();
	search();
	var temp = reg.exec(window.location.href)[1];
	if(temp) now_type = temp;
	$("#ent").hide();
	changePart();
	autoload(now_type);
	$("#dir input[name = 'showsub']").click(function  () {
		checkUserName();
		$("#ent").animate({
			opaacity:'toggle',
			height:'toggle',
		},400);
	});
});
function checkUserName () {
	//通过ajax检验用户的名称，获得对应的密码
	$("#ent input[name='userName']").blur(
			function ()	{
				var name=$(this).val();
				if((name == "")||(name =="用户名")||(name == undefined)){
					$("#atten").html("<b class ='danger'>用户名不能为空</b>");
					return;
				}
				$.ajax({
					url:site_url+"/reg/get_user_name/"+name,
					success:function  (data) {
						user_id=data.getElementsByTagName('id');
						user_id=$(user_id[0]).text();
						if(user_id!="0"){
							user_name = name;
							$("#atten").html("<b class ='safe'>用户名正确</b>");
							var pass = $("#passwd").val();
							if((pass != undefined)&&(pass!="密码") &&(pass !="")){
								checkPasswd(user_id,pass);
							}
							else{
								checkUserPasswd();
							}
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
		url:site_url+"/reg/getPass/"+userId+"/"+pass,
	dataType:"json",
	success:function(data){
		if(data == '1'){
			$("#atten").html("<b class = 'safe'>密码正确</b>");
			$("#ent form").submit(function(){
				//通过密码验证才可以登陆
				var name = $("#ent input[name='userName']").val();
				if(user_name == name){
					ALogin(name ,user_id,pass);//算是直接登陆了，只是再服务端还有判断
					return false;
				}
			});
			//需要监听enter事件
		}	
		else $("#atten").html("<b class = 'danger'>密码错误</b>");
	},
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
		url:site_url+"/reg/dc/"+user_id+"/"+passwd,
	dataType:"json",
	success:function(data){
		//console.log(data);//这里是直接返回一直数值，而不是数组，有待验证
		if(data  == 0){
			$("#atten").html("<b class = 'danger'>登陆失败</b>");
		}
		else {
			cre_zhuxiao();
			$("#atten").hide();
			$.cookie("user_name",user_name);
			$.cookie("user_id",user_id);
			$.cookie("passwd",passwd);
		}
	},
	});
}
function cre_zhuxiao () {
	$("#ent").detach();
	$("#dir input[name = 'reg']").detach();
	var ent = $("#dir input[name='showsub']");
	$(ent).removeAttr("name").attr("name","zhu");
	$(ent).removeAttr("value").attr("value","注销");
	$("#dir input[name = 'zhu']").click(function  () {//为注销添加事件，注销成功则生成登陆按钮
		console.log("testing");
		$.ajax({
			url:site_url+"/destory/zhuxiao",
			success:function  (data,textStatus) {
				if (data == 1) {
					$(this).detach();
					document.cookie = "";
					$.cookie("user_name",null);
					$.cookie("user_id",null);
					$.cookie("passwd",null);
					window.location.reload();//刷新的按钮
				}
			},
		});
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
	$(p).text("第"+partId+"页");
	$("#ulCont").append(page).append(p);
	return true;
}
function getInfo (type,partId) {
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+type+"/"+partId,
		dataType:"json",
		success:function  (data,textStatus) {
			if(textStatus == "success"){
				if (data.length == 0) {
					return false;
				}
				seaFlag = 0;
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
	var timer = 0,height,stp=0,total,pageNum = 16;
	$.ajax({
		url:site_url+"/mainpage/getTotal/"+id,
		type:"json",
		beforeSend:function  () {
			total = -1;
		},
		success:function  (data,textStatus) {
			if (textStatus=="success") 
				total = data;
			else  console.log(data);
		},
	});
	autoAppend();//控制时序，避免页数颠倒
	function autoAppend () {
		$.ajax({
			url:site_url+"/mainpage/infoDel/"+id+"/"+(++stp),
			dataType:"json",
			success:function  (data,textStatus) {
				if(textStatus == "success"){
					if (data.length == 0) return false;
					if(formPage(data,stp)){//生成页面dom;
						if(document.height <=$(window).height()&& (stp<5))//如果页面高度没有屏幕高，再申请
							autoAppend();
					}
				}
			},
			error: function  (xml) {
				console.log(xml);
			}
		});
	}
	$(window).scroll(function  () {
		if(timer === 0){//!timer貌似有漏洞,每次只允许一个申请
			timer = 1;//进入后立刻封闭if，防止出现两次最后一页
			if(seaFlag){
				console.log("disabling");
				timer = 0;
				return false;//如果在搜索过程中，滚动无效，如果已经发出了请求中，成功之前请求无效;
			}
			setTimeout(function  () {
				height = $(window).scrollTop()+$(window).height();
				if((height+150)> document.height){
					if((pageNum*stp > total )&&(total != "-1")){
						//console.log(total);
						$("#ulCont").append("<p class = 'pageDir'>最后一页</p");
						return  false;
					}
					seaFlag = 1;//禁止成功之前的请求
					getInfo(id,++stp);
				}
				timer = 0;
			},100);
		}
	});
}
function ulCreateLi(data,search) {
	//这个文件创建一个li，并将其中的节点赋值,psea有待完成,photo还位使用
	var li=document.createElement("li");
	$(li).append("<a href = '"+site_url+"/space/index/"+data["author_id"]+"' target = '_blank'><img  class = 'imgLi block' src = '"+base_url+"upload/"+data["photo"]+"' alt = '"+data["userName"]+"的头像"+"' title = "+data["userName"]+"/></a>");
	$(li).append("<a href = '"+site_url+"/showart/index/"+data["art_id"]+"'><p class = 'detail'>"+data["title"]+"</p></a>");
	if(search === undefined)
		$(li).append("<p class = 'user tt'>楼主:"+data["userName"]+"</p>");
	else 
		$(li).append("<p class = 'user tt'><span class = 'master'>楼主:"+data["userName"]+"</span><span class = 'partName'>"+data["partName"]+"</span></p>");
	$(li).append("<p class = 'user tt'>浏览:"+data["visitor_num"]+"/评论:"+data["comment_num"]+"<span class = 'time'>"+data["time"]+"</span></p>");
	return li;
}
