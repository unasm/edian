/*
 *
author:			unasm
email:			douunasm@gmail.com
last_modefied:  2013/03/15 10:41:27 AM	
nextstep:		正在处理登陆	
*/
/*now_type表示当前表示的显示的版块，热门消息算是0，part_id，表示显示的页数，已经表示到了第几页
 */
function changePart(node){
	getTotal(now_type,"<?php echo site_url('mainpage/getTotal')?>"+"/"+now_type);
}
function init_scroll()
{
	autload(now_type);
}
function getInfo (type) {
	var xml=new XMLHttpRequest();
	if(xml==null){
		alert("您的浏览器版本太低，请更新浏览器，或者使用谷歌或火狐浏览器");
		return;
	}
	xml.open("post",url+now_type+"/"+partId[type],false);
	//console.log(url+now_type+"/"+partId[type]);
	xml.onreadystatechange=function()	{
		if(xml.readyState==4){
		if(xml.status==200){
				var resxml=xml.responseXML;
				var art_id=resxml.getElementsByTagName('art_id');
				var title=resxml.getElementsByTagName('title');
				var user_id=resxml.getElementsByTagName('user_id');
				var time=resxml.getElementsByTagName('reg_time');
				var author=resxml.getElementsByTagName('author');
				var ul = append(art_id,author,title,user_id,time);
				var pagenation=document.createElement("p");
				$(pagenation).addClass("pageDir");
				//pagenation.innerText="第"+partId[type]+"页";
				$(pagenation).text("第"+partId[type]+"页");
				partId[type]++;
				ul.appendChild(pagenation);
			}
			else {
				console.log("not ready");
			}
		}
	}
	xml.send(null);
}
function getValue (node) {
	return node.childNodes[0].nodeValue;
}
function dump (obj) {
	//用来输出的对象的函数,表示很好用
	var s="";
	for( var property in obj){
		s=s+"\n" +property +":" +obj[property];
		console.log(property);
		console.log(obj[property]);
	}
}
function append (art_id,author,title,user_id,time) {
	//这个是调用所有其他的函数的函数，就是只是负责分配生成ul中内容的函数的函数。也就是一页的内容
	var ul=document.getElementById("ulCont");
	var flag=0,team;
	team=document.createElement("div")	;
	team.className="team block shadow";
	for (var i = 0; i < art_id.length; i++) {
		var li=ulCreateLi(getValue(art_id[i]),getValue(user_id[i]),getValue(title[i]),getValue(time[i]),getValue(author[i]));
		///这里的author还没有用到，因为没有添加对应的数据在数据库中
		//var li=ulCre ateLi(getValue(art_id[i]),getValue(user_id[i]),getValue(author[i]),getValue(time[i]),getValue(title[i]));
		team.appendChild(li);
		if((i%6)==5){
			ul.appendChild(team);
			team=document.createElement("div")	;
			$(team).addClass("team block shadow");
		}
	}
	return ul;
}
function autload(id) {
	//这里是进行自动加载的，根据用户的鼠标而改变
	//id表示当前浏览的版块，
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
	//part表示当前版块的id
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
	//这个文件创建一个li，并将其中的节点赋值
	console.log(title);
	console.log(art_id);
	console.log(user_id);
	var li=document.createElement("li");
	var ArtDiv=document.createElement("div");
	var img=document.createElement("img");
	var ptitle=document.createElement("p");
	var attenDiv=document.createElement("div");
	var psea=document.createElement("p");
	var ptime=document.createElement("p");
	var spanSea=document.createElement("span");
	var spanFlo=document.createElement("span");
	var spanAuth=document.createElement("span");
	var spanTime=document.createElement("span");
	ptime.appendChild(spanAuth);
	ptime.appendChild(spanTime);
	psea.appendChild(spanSea);//spanSea,spanFlo作用是什么,sea现在定义为最新评价，flo为评价内容
	//psea.appendChild(spanFlo);
	attenDiv.appendChild(psea);
	attenDiv.appendChild(ptime);
	ArtDiv.appendChild(ptitle);
	ArtDiv.appendChild(attenDiv);
	li.appendChild(img);
	li.appendChild(ArtDiv);
	li.className="contLi block";
	$(li).addClass("contLi block");
	$(img).addClass("block");
	//ArtDiv.className="contArt";
	$(ArtDiv).addClass("contArt");
	$(ptitle).addClass("conTitle");
	//ptitle.className="conTitle";
	$(attenDiv).addClass("atten");
	//attenDiv.className="atten";
	//spanAuth.className="author oneAtten";
	$(spanAuth).addClass("author oneAtten");
	//spanTime.className="time";
	$(spanTime).addClass("time");

//在这里添加具体的内容
	$(spanSea).text("跟帖:3/浏览:5");
	$(ptitle).html("<a href= "+site_url+"/showart/index/"+art_id+">"+title+"</a>");
	$(spanAuth).html("<a href ="+ site_url+"/space/index/"+user_id+">楼主:"+author+"</a>");

	$(spanTime).text(time);
	return li;
}
function checkUserName () {
	//通过ajax检验用户的名称，获得对应的密码
	$("#loginform input[name='user_name']").blur(
		function ()	{
			var user_name=$(this).val();
			$.ajax({
			url:site_url+"/reg/get_user_name/"+user_name,
			success:function  (data,textStatus) {
				var temp=data.getElementsByTagName('id');
				if (textStatus=="success") {
					var reva=getValue(temp[0]);
					if(reva=="1"){
						PASSWD=data.getElementsByTagName('passwd');
						PASSWD=getValue(PASSWD[0]);
						$("#atten").html("<b style='color:green'>用户名正确</b>")
					}
					else {
						$("#atten").html("<b style='color:red'>用户名错误</b>")
					}
				}
				else {
					$("#atten").html("<b style='color:red'>连接故障,请联系管理员</b>")
				}
			},
			error: function  () {
				$("#atten").html("<b style='color:red'>连接故障,请联系管理员</b>")
			}
			});
		}
	);
}
function checkUserPasswd () {
	$("#loginform input[name='passwd']").blur(
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
						PASSWD=getValue(PASSWD[0]);
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
	/*生成注销的按钮还有待完成
	*/
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
	var form = document.createElement("form");
	$(form).attr("id","loginform");
	$(form).attr("action",site_url+"/reg/denglu_check");
	$(form).attr("accept-charset","utf-8");
	$(form).attr("method","post");
	$(form).attr("enctype","multipart/form-data");
	$(form).addClass("block");
	$(form).append("<i class='aow'><b>◆</b><u>◆</u></i>");
	$(form).append("<input type = 'text' name = 'user_name' class = 'block text'/>");
	$(form).append("<input type = 'text' name = 'passwd' class = 'block text'/>");
	$(form).append("<input type = 'submit' name = 'sub' value = '提交' class = 'lsub'/>");
	$(form).append("<span id = 'atten'></span>");
	return form;
}
