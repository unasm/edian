/*
   author:			unasm
   email:			douunasm@gmail.com
   last_modefied:	2013/04/05 04:33:37 PM
   */
function tse(){	
	var val;//控制页面点击消失提示字的函数
	$("#dir input[type = 'text']").focus(function(){
		val = $(this).val();
		$(this).removeAttr("value");
	});
	$("#dir input[type = 'text']").blur(function(){
		if($(this).val()==""){
			$(this).attr("value",val);
		}
	});
}
function judgeState () {
	if((user_name !="")&&(PASSWD != "")){
		cre_zhuxiao();//既然已经存在了，就没有必要再次登陆了吧
	}
	else {
		var name = $.cookie("user_name");
		var password = $.cookie("passwd");
		if((name !="")&&(password != "")){
			$.ajax({
				//第一次通信，检查用户名和密码是否相同
				url:site_url+"/reg/get_user_name/"+name,
				success:function  (data) {
					var id = $(data.getElementsByTagName('id')[0]).text();
					if(id!="0"){
						var pass=$(data.getElementsByTagName('passwd')[0]).text();
						if(password==pass){
							ALogin(name,id,pass);
						}
					}
				},
			});
		}
	}
}
function comconstru (url) {//这个对象，是所有评论区域的集合
	//初始化的函数
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
	$("#face").delegate("img","click",function(){
		var temp=getGifName(this.src);
		var content=document.getElementsByName("com")[0];
		content.value=content.value+"[face:"+temp+"]";
	});
	$("#subcom").click(function(){
		var node=document.getElementById("comcon");
		var content=node.value;
		if(content == "" ||(content == undefined)){
			return;
		}
		content=content.replace(/\n/g,"<br/>");
		$.ajax({
			url:url,
			type:"POST",
			data:{"com":content},
			success:function(responseText) {
				var ans = responseText.getElementsByTagName("comId")[0];//返回的类型是"<comId>中间是comid</comId>"
				content=content.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+base_url+"/face/$1.gif"+"/>");
				//只允许一个的（），读取其中的序号，然后添加，自己增加其他的地址之类的
			},
			error:function(xml){
				console.log(xml);
			}
		});
		node.value="";//这里表明，其实原生的js更好,目前支持火狐，chrome
		return false;
	});
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
}
function  hl(type){
	//short for hightlight
	var reg = /(\d*)$/;
	$("#dirUl a").each(function  () {
		if(reg.exec(this.href)[0] == type){
			$(this).find("span").addClass("tran");
			$(this).find("li").removeClass("dirmenu").addClass("liC");
			return false;
		}
	});
}
function changePart () {
	//处理修改板块时候发生的事情
	$("#dirUl").delegate("#dirUl a","click",function(){
		var last = $("#dirUl").find(".liC");
		$(last).removeClass("liC").addClass("dirmenu");
		$(last).find(".tran").removeClass("tran");
		$(this).find("span").addClass("tran");
		$(this).find("li").removeClass("dirmenu").addClass("liC");
		temp = reg.exec($(this)[0].href)[1];
		if(temp!=now_type){
			$("#ulCont").empty();
			now_type = temp;
			partId = 1;
			getInfo(now_type,partId);
			partId++;
		}
		event.preventDefault();
	});
}
$(document).ready(function(){
	var reg = /(\d*)$/,partId = 1;//partId标示浏览板块的页数
	tse();
	$("#ent").hide();
	$("#judge input").hide();
	$("#face").hide();
	changePart();
	var time = 0;
	/*
	setInterval($(window).scroll(function  () {
		var height=$(window).scrollTop()+$(window).height(),stp = 2;
		time++;
		console.log(time);
	}),900);
	*/
	//如何每隔一段读取数据库内容成了难题
	var temp = reg.exec(window.location.href)[1];
	if(temp){
		now_type = temp;
	}
	hl(now_type);
	if(window.location.pathname.indexOf("art")==-1)
	getInfo(now_type,partId);//要不要根据页面内容，控制函数的执行呢？
//autoload(now_type);
$("#dir input[name = 'enter']").click(function(){
	var name = $("#ent input[name='userName']").val();
	var pass  = $("#ent input[name = 'passwd']").val();
	if(name != "用户名" && pass != "密码"){
		if((user_name == name)&&(pass == PASSWD)){
			ALogin(name ,user_id,pass);//算是直接登陆了，只是再服务端还有判断
		}
	}
});
$("#dir input[name = 'showsub']").click(function  () {
	checkUserName();
	$("#ent").animate({
		opaacity:'toggle',
		height:'toggle',
	},400);
});
judgeState();
});

function judge () {
	var pass = $("#passwd").val();
	if((pass!="密码") &&(pass !="")&&(pass != undefined)){
		if(pass == PASSWD){
			$("#atten").html("<b class = 'safe'>对应密码正确</b>");
		}
		else {
			$("#atten").html("<b class = 'danger'>对应密码错误</b>")	;
		}
	}
	else {
		$("#atten").html("<b class ='safe'>用户名正确</b>");
		checkUserPasswd();
	}
}
function checkUserName () {
	//通过ajax检验用户的名称，获得对应的密码
	$("#ent input[name='userName']").blur(
			function ()	{
				var name=$(this).val();
				if((name == undefined)||(name == "")||(name =="用户名")){
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
							PASSWD=data.getElementsByTagName('passwd');
							PASSWD=$(PASSWD[0]).text();
							judge();//单独分离出的一个函数，太多的东西拥挤在一起不好
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
function checkUserPasswd () {
	//只有在获得与user_name相对应的密码的时候才可以帮绑定事件
	$("#ent input[name='passwd']").blur(function(){
		var secPasswd=$(this).val();
		if((secPasswd ==undefined)||(secPasswd == "")||(secPasswd=="密码")){
			$("#atten").html("<b class='danger'>请输入密码</b>");
			return;
		}
		if(secPasswd == PASSWD){
			$("#atten").html("<b style='color:green'>密码正确</b>");
		}
		else {
			$("#atten").html("<b style='color:red'>密码错误</b>");
		}
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
		console.log(data);//这里是直接返回一直数值，而不是数组，有待验证
		if(data  == 0){
			$("#atten").html("<b class = 'danger'>登陆失败</b>");
		}
		else {
			cre_zhuxiao();
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
		$.ajax({
			url:site_url+"/destory/zhuxiao",
			success:function  (textStatus) {
				if (textStatus=="success") {
					$(this).detach();
					document.cookie = "";
					$.cookie("user_name",null);
					$.cookie("user_id",null);
					$.cookie("passwd",null);
					cre_denglu();//刷新的按钮
				}
			},
		});
	});
}
function init_scroll()
{//好像是滚动时候自动添加的函数
	autoload(now_type);
}
function getInfo (type,partId) {
	var li;
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+type+"/"+partId,
		dataType:"json",
		success:function  (data) {
			var page=document.createElement("div")	;
			$(page).addClass("page");
			for (var i = 0; i < data.length; i++) {
				li = ulCreateLi(data[i]["art_id"],data[i]["author_id"],data[i]["title"],data[i]["time"],data[i]["userName"],data[i]["photo"]);
				$(page).append(li);
			}
			var p = document.createElement("p");
			$(p).addClass("pageDir");
			$(p).text("第"+partId+"页");
			$("#ulCont").append(page).append(p);
		},
		error: function  (xml) {
			console.log(xml);
			console.log("申请数据出错");
		}
	});
}
function autoload(id) {
	//这里是进行自动加载的，根据用户的鼠标而改变，id表示当前浏览的版块，
	var height=$(window).scrollTop()+$(window).height(),stp = 2;
	if((height+download_height)>document.height){//不能到底部的时候才开始加载，提前一些才好，这里是100，在前面设置
		if(total>=(stp)*14){
			getInfo(id,stp++);
		}
		else {
			console.log("已经没有数据申请了");
		}
	}
}
function getTotal(part,totalurl) {
	$.ajax({
		url:totalurl,
	success:function  (data,textStatus) {
		var temp=data.getElementsByTagName('total');
		if (textStatus=="success") {
			total  = $(temp[0]).text();
			console.log(total);
		}
		else {
			console.log("读取总数失败");
		}
	},
	error: function  () {
		console.log("申请总数出错");
	}
	});
}
function ulCreateLi(art_id,user_id,title,time,author,photo) {
	//这个文件创建一个li，并将其中的节点赋值,psea有待完成,photo还位使用
	var li=document.createElement("li");
	$(li).append("<a href = '"+site_url+"/space/index/"+user_id+"'><img  class = 'imgLi block' src = '"+base_url+"upload/"+photo+"' /></a>");
	$(li).append("<a href = '"+site_url+"/showart/index/"+art_id+"'><p class = 'detail'>"+title+"</p></a>");
	$(li).append("<p class = 'user tt'>楼主:"+author+"</p>");
	$(li).append("<p class = 'user tt'>浏览:3/评论:2<span class = 'time'>"+time+"</span></p>");
	return li;
}
