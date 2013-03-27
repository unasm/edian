function tse(){	
	var val;
	$("#dir input").focus(function(){
		val = $(this).val();
		$(this).removeAttr("value");
	});
	$("#dir input").blur(function(){
		if($(this).val()==""){
			$(this).attr("value",val);
		}
	});
}
function judgeState () {
	var flag = 0;
	if((user_name !="")&&(PASSWD != "")){
		flag = loginAuto(user_name,PASSWD);
	}
	if(flag)return;
	var name = $.cookie("user_name");
	var password = $.cookie("passwd");
	if((name !="")&&(password != "")){
		flag = loginAuto(name,password);
	}
	return flag;
}
function error () {
	//处理担心出现的各种奇葩现象
	if(user_id == ""){
		PASSWD = "";
		user_name = "";
	}
	else if(user_name == ""){
		PASSWD = "";
		user_id = "";
	}
	else if(PASSWD == ""){
		user_id = "";
		user_name ="";
	};
}
function login () {
	//进行判断，yes，进行上传后的一些处理，修改按钮之类的事情，否则报错
	var name = $("#ent input[name = 'userName']").val();
	var pass = $("#ent input[name = 'passwd']").val();//md5 加密，将来
	if((user_name == name)&&(pass == PASSWD)){
		//只是不想刷新，就重新通信一次
		$.ajax({
			url:site_url+"/reg/dc/"+name+"/"+pass,
			success:function(data){
				console.log(data);
				var va = data.getElementsByTagName('root');
				va = $(va[0]).text();
				if(!va){
					$("#atten").html("<b class = 'danger'>登陆失败</b>");
				}
			},
		});
		ALogin(name ,user_id,pass);
		return true;
	}
	return false;
}
function com() {//controller the comment area hide or show
	$("#judge textarea").focus(function(){
		$("#judge .sli").css({position:"relative"}).animate({
			height:"200px",
		},'fast')
		$("#judge .pholder").hide();
		$("#face").fadeIn();
	});
	$("#judge textarea").blur(function(){
		$("#judge .sli").css({position:"relative"}).animate({
			height:"20px",
		},'fast');
		$("#judge .pholder").show();
		$("#face").fadeOut();
	});
}
$(document).ready(function(){
	tse();
	error();
	$("#ent").hide();
	$("#face").hide();
	com();
	$("#dirUl").delegate("#dirUl li","click",function(){
		var last = $("#dirUl").find("li.liC");
			last.removeClass("liC").addClass("dirmenu");
			$(last).find("span.tran").removeClass("tran");
		$(this).append("<span class = 'tran'></span>");
		$(this).removeClass("dirmenu").addClass("liC");
	});
	if(window.location.pathname.indexOf("art")==-1)
	getInfo(now_type);//要不要根据页面内容，控制函数的执行呢？
$("#dir input[name = 'enter']").click(function(){
	checkUserName();
	var val = $("#ent input[name='userName']").val();
	var pass  = $("#ent input[name = 'passwd']").val();
	if(val != "用户名" && pass != "密码"){
		if(login()==false){
			$("#ent").animate({
				opaacity:'toggle',
				height:'toggle',
			},400);
		}
		else {
			$("#atten").hid();
		}
	}
	else {
		//$("#ent").fadeToggle();
		$("#ent").animate({
			opaacity:'toggle',
			height:'toggle',
		},400);
	}
});
$("#dir").mouseleave(function (){
	$("#ent").slideUp();
	$("#atten").slideUp();
});
judgeState();
});
function changePart(node){
	//现在想想，当初的设计还是有点幼稚，其实可以在url中直接保存板块内容的，然后通过preDefault;使用事件托管优化一下吧
	//	getTotal(now_type,"<?php echo site_url('mainpage/getTotal')?>"+"/"+now_type);
}
function init_scroll()
{//好像是滚动时候自动添加的函数
	autoload(now_type);
}
function getInfo (type) {
	console.log(site_url+"/mainpage/infoDel/"+type+"/"+partId[type]);
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+type+"/"+partId[type],
		success:function  (data,textStatus) {
			//我想既然出现在success中，就没有必要判断错误了吧
			var art_id=data.getElementsByTagName('art_id');
			var title=data.getElementsByTagName('title');
			var user_id=data.getElementsByTagName('user_id');
			var time=data.getElementsByTagName('reg_time');
			var author=data.getElementsByTagName('author');
			append(art_id,author,title,user_id,time);
			var p = document.createElement("p");
			$(p).addClass("pageDir");
			$(p).text("第"+partId[type]+"页");
			$("#ulCont").append(p)
		partId[type]++;
		},
		error: function  () {
			console.log("申请数据出错");
		}
	});
}
function getValue (node) {//当初设计的时候的诟病
	return $(node).text();
}
function dump (obj) {
	//用来输出的对象的函数,表示很好用,辅助函数  无用
	var s="";
	for( var property in obj){
		s=s+"\n" +property +":" +obj[property];
		console.log(property);
		console.log(obj[property]);
	}
}
function append (art_id,author,title,user_id,time) {
	//这个是调用所有其他的函数的函数，就是只是负责分配生成ul中内容的函数的函数。也就是一页的内容
	var page=document.createElement("div")	;
	$(page).addClass("page");
	for (var i = 0; i < art_id.length; i++) {
		var li=ulCreateLi(getValue(art_id[i]),getValue(user_id[i]),getValue(title[i]),getValue(time[i]),getValue(author[i]));
		///这里的author还没有用到，因为没有添加对应的数据在数据库中
		$(page).append(li);
	}
	$("#ulCont").append(page);
}
function autoload(id) {
	//这里是进行自动加载的，根据用户的鼠标而改变，id表示当前浏览的版块，
	var height=$(window).scrollTop()+$(window).height();
	if((height+download_height)>document.height){//不能到底部的时候才开始加载，提前一些才好，这里是100，在前面设置
		if(total>=(partId[id])*18){
			getInfo(id);
		}
		else {
			console.log("已经没有数据申请了");
		}
	}
}
function getTotal(part,totalurl) {
	//part表示当前版块的id,或许，我想应该使用匿名函数比较好吧
	$.ajax({
		url:totalurl,
	success:function  (data,textStatus) {
		var temp=data.getElementsByTagName('total');
		if (textStatus=="success") {
			total=getValue(temp[0]);
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
function ulCreateLi(art_id,user_id,title,time,author) {
	//这个文件创建一个li，并将其中的节点赋值,psea有待完成
	var li=document.createElement("li");
	var img=document.createElement("img");
	var ptitle=document.createElement("p");//填充title，具体内容
	var psea=document.createElement("p");//填充最新,具体内容将来具体添加，目前还不做
	var ptime=document.createElement("p");//填充时间和浏览
	$(li).addClass("block");
	$(img).addClass("imgLi block");
	$(ptitle).addClass("detail infoLi");
	$(psea).addClass("user infoLi tt");
	$(ptime).addClass("user infoLi tt");
	$(li).append(img);
	$(li).append(ptitle);
	$(li).append(psea);
	$(li).append(ptime);

	$(img).attr("src",site_url+"/space/"+user_id);
	$(ptitle).html("<a href= "+site_url+"/showart/index/"+art_id+">"+title+"</a>");
	$(psea).html("<a href = "+site_url+"/space/index/ >最新:"+author+"</a>");
	$(ptime).html("评论:3/浏览:6<span class = 'time'>"+time+"</span>");
	return li;
}
function judge () {
	var pass = $("#passwd").val();
	if((pass!="密码") &&(pass !="")&&(pass != undefined)){
		if(pass == PASSWD){
			user_name = name;
			console.log("here is 202 line"+user_name);
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
					success:function  (data,textStatus) {
						console.log(data);
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
	$("#ent input[name='passwd']").blur(
			function(){
				var secPasswd=$(this).val();
				if((secPasswd ==undefined)||(secPasswd == "")||(secPasswd=="密码"))
	{
		$("#atten").html("<b class='danger'>请输入密码</b>");
		return;
	}
	if(secPasswd == PASSWD){
		$("#atten").html("<b style='color:green'>密码正确</b>");
	}
	else {
		$("#atten").html("<b style='color:red'>密码错误</b>");
	}
			}
			);
}
function loginAuto (name,password) {
	//通过存在的cookie或者是ci自己带的对用户进行验证，将来可以通过使用id进行查
	$.ajax({
		url:site_url+"/reg/get_user_name/"+name,
	success:function  (data,textStatus) {
		var temp=data.getElementsByTagName('id');
		var id=getValue(temp[0]);
		if(id!="0"){
			pass=data.getElementsByTagName('passwd');
			pass  = $(pass[0]).text();
			if(password==pass){
				ALogin(name,id,pass);
				cre_zhuxiao();
				return true;
			}
		}
		else return false;
	},
	});
}
function ALogin (user_name,user_id,passwd) {
	//对登陆验证正确之后，进行各种处理，比如，隐藏登陆按钮，更新cookie
	//生成注销的按钮还有待完成
	$.cookie("user_name",user_name);
	$.cookie("user_id",user_id);
	$.cookie("passwd",passwd);
	cre_zhuxiao();
}
function zhuxiao () {
	//为注销添加事件，注销成功则生成登陆按钮
	$("#dir input[name = 'zhu']").click(
			function  () {
				$(this).detach();
				document.cookie = "";
				$.cookie("user_name",null);
				$.cookie("user_id",null);
				$.cookie("passwd",null);
				$.ajax({
					url:site_url+"/destory/zhuxiao",
					success:function  (data,textStatus) {
						if (textStatus=="success") {
							//		cre_denglu();//刷新的按钮
							window.location.reload();
						}
					},
				});
			}
			);
}
function cre_zhuxiao () {
	$("#ent").detach();
	$("#dir input[name = 'reg']").detach();
	var ent = $("#dir input[name='enter']");
	$(ent).removeAttr("name").attr("name","zhu");
	$(ent).removeAttr("value").attr("value","注销");
	zhuxiao();
}

