function tse(){	
	var val;
	$("#dir .ip").focus(function(){
		val = $(this).val();
		$(this).removeAttr("value");
	});
	$("#dir .ip").blur(function(){
		if($(this).val()==""){
			$(this).attr("value",val);
		}
	});
}
function jugeState () {
	if(user_name != ""){//控制登陆
		ALogin(user_name,user_id,PASSWD);
	}
	else loginAuto();
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
	}
}
function login () {
	//进行判断，yes，进行上传后的一些处理，修改按钮之类的事情，否则报错
}
$(document).ready(function(){
	tse();
	error();
	$("#ent").hide();
	$("#dir input[name = 'enter']").click(function(){
		checkUserName();
		var val = $("#dir input[name='userName']").val();
		var pass  = $("#passwd").val();
		if(val != "用户名" && pass != "密码"){
			login();
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

});
function getUserId () {
	//通过页面的uri获得其中？后面的id
	var url = document.location.href;
	var son = "sd";
	console.log(url.indexOf("?"));
	if(url.indexOf("?")>0){
		son = url.substring(url.indexOf("?")+1,url.length);
	}
	if(!isNaN(son)){
		return son;
	}
	return false;
}
function changePart(node){
	//现在想想，当初的设计还是有点幼稚，其实可以在url中直接保存板块内容的，然后通过preDefault;使用事件托管优化一下吧
	//	getTotal(now_type,"<?php echo site_url('mainpage/getTotal')?>"+"/"+now_type);
}
function init_scroll()
{//好像是滚动时候自动添加的函数
	autoload(now_type);
}
function getInfo (type) {
	$.ajax({
		url:site_url+"mainpage/infoDel/"+type,
	success:function  (data,textStatus) {
		//我想既然出现在success中，就没有必要判断错误了吧
		dump(data);
		dump(textStatus);
		var art_id=data.getElementsByTagName('art_id');
		var title=data.getElementsByTagName('title');
		var user_id=data.getElementsByTagName('user_id');
		var time=data.getElementsByTagName('reg_time');
		var author=data.getElementsByTagName('author');
		append(art_id,author,title,user_id,time);
	},
	error: function  () {
		console.log("申请总数出错");
	}
	});
}
function getValue (node) {
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
	var spanTime=document.createElement("span");//填充时间
	$(li).addClass("block");
	$(img).addClass("imgLi block");
	$(ptitle).addClass("detail infoLi");
	$(psea).addClass("user infoLi tt");
	$(ptime).addClass("user infoLi tt");
	$(ptime).append(spanTime);
	$(li).append(img);
	$(li).append(ptitle);
	$(li).append(psea);
	$(li).append(ptime);

	$(img).attr("src",site_url+"userspace/"+user_id);
	$(ptitle).html("<a href= "+site_url+"/showart/index/"+art_id+">"+title+"</a>");
	$(spanAuth).html("<a href ="+ site_url+"/space/index/"+user_id+">最新:"+author+"</a>");
	$(psea).html("最新:"+"<a href = "+site_url+"space/index/ >"+"</a>");
	$(ptime).text("评论:3/浏览:6");
	$(spanTime).text(time);
	return li;
}
function checkUserName () {
	//通过ajax检验用户的名称，获得对应的密码
	$("#ent input[name='userName']").blur(
			function ()	{
				var name=$(this).val();
				$.ajax({
					url:site_url+"/reg/get_user_name/"+name,
					success:function  (data,textStatus) {
						var temp=data.getElementsByTagName('id');
							var reva=getValue(temp[0]);
							if(reva=="1"){
								PASSWD=data.getElementsByTagName('passwd');
								PASSWD=$(PASSWD[0]).text();
								user_id = data.getElementsByTagName("userId");
								user_id = $(uesr_id[0]).text();
								var pass = $("#passwd").val();
								if(pass!="密码"){
									if(passwd == PASSWD){
										user_name = name;
										console.log("here is 202 line"+user_name);
										$("#atten").text("对应密码正确");
									}
									else {
										$("#atten").text("对应密码错误")	;
									}
								}
								else {
									$("#atten").html("<b class ='safe'>用户名正确</b>");
									checkUserPasswd();
								}
							}
							else {
								$("#atten").html("<b class='danger'>用户名错误</b>")
							}
						else {
							$("#atten").html("<b class ='danger'>故障,请联系管理员1264310280@qq.com</b>");
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
	$("#dir input[name='passwd']").blur(
			function(){
				var secPasswd=$(this).val();
				if(secPasswd == PASSWD){
					$("#atten").html("<b style='color:green'>密码正确</b>");
				}
				else {
					$("#atten").html("<b style='color:red'>密码错误</b>");
				}
			}
			);
}
function loginAuto () {
	//通过cookie对用户进行验证，将来可以通过使用id进行查询，目前使用的是user_name
	var user_name=$.cookie("user_name");
	if(user_name == null){
		cre_denglu();
	}
	$.ajax({
		url:site_url+"/reg/get_user_name/"+user_name,
		success:function  (data,textStatus) {
			var temp=data.getElementsByTagName('id');
			if (textStatus=="success") {
				var reva=getValue(temp[0]);
				if(reva=="1"){
					PASSWD=data.getElementsByTagName('passwd');
					PASSWDL  = $(PASSWD[0]).text();

					if(PASSWD==$.cookie("passwd")){
						ALogin(user_name,$.cookie("user_id"),$.cookie("passwd"));
						cre_zhuxiao();
					}
					else cre_denglu();//如果登陆成功，就ALogin，不然就创建登陆的按钮
				}
			}
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
function getUserId () {
	//通过页面的uri获得用户的id
	var url = document.location.href;
	var son = "sd";
	console.log(url.indexOf("?"));
	if(url.indexOf("?")>0){
		son = url.substring(url.indexOf("?")+1,url.length);
	}
	if(!isNaN(son)){
		return son;
	}
	return false;
}
function zhuxiao () {
	//为注销添加事件，注销成功则生成登陆按钮
	$("#zhuxiao").click(
			function  () {
				$("#zhuxiao").detach();
				document.cookie = "";
				$.cookie("user_name",null);
				$.cookie("user_id",null);
				$.cookie("passwd",null);
				$.ajax({
					url:site_url+"/destory/zhuxiao",
					success:function  (data,textStatus) {
						if (textStatus=="success") {
							cre_denglu();//创建登陆的按钮
						}
					},
				});
			}
			);
}
function cre_zhuxiao () {
	$("#header").append(function(){
		var div = document.createElement("div");
		$(div).attr("id","zhuxiao");
		$(div).addClass("headLeft");
		$(div).append("<a>注销</a>");
		$(div).append("<span>"+$.cookie("user_name")+"</span>");
		return div;
	});
	zhuxiao();
}
function cre_denglu () {
	//生成登陆的按钮和其他
	$("#header").append(function(){
		var div = document.createElement("div")	;
		var form,input;
		form = cre_form();
		$(form).hide();
		$(div).attr("id","denglu");
		$(div).addClass("headLeft");
		$(div).append(function(){//生成登陆的按钮
			input = document.createElement("input");
			$(input).attr("type","button");
			$(input).addClass("butDenglu");
			$(input).click(function(){
				$(form).toggle();
			});
			return input;
		});
		$(div).append(function(){//生成注册的按钮 ,貌似现在显示的不是注册
			input  = document.createElement("input");
			$(input).attr("type","button");
			$(input).addClass("butDenglu");
			return input;
		});
		$(div).append(form);
		return div;
	});
	checkUserPasswd();
	checkUserName();
}
function cre_form () {
	//这是生成登陆form的func
}
