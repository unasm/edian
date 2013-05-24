/*
author:    		unasm
email:			douunasm@gmail.com
last_modefied:	2013/04/05 04:33:37 PM
*/

var seaFlag,passRight,hisLen,back,np = $("#np");
//back 后退，为了添加后退的功能而添加的标志变量

function tse(){	
	var val;//控制页面点击消失提示字的函数,移动到dir.js中
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
				height:'toggle'
			},400);
			$(this).val("显示登陆");
	});
}
function hiA () {
	//控制边框的显示隐藏和旁边body的显示margin,效果一般，不绚烂，漂亮的将来作吧
	//整合到dir.js中
	var flag = 1;//1 表示还在显示，0表示正在隐藏中
	var dir = $("#dir");
	var ulCont = $("#ulCont");
	$("#hiA").click(function  () {
		if(flag){
			ulCont.animate({
				"margin-left":"0"
			},600);
			$(this).text("显示");
		}else{
			$(this).text("隐藏");
			ulCont.animate({
				"margin-left":"250"
			},600);
		}
		flag = 1-flag;
	})
}
function urlChange () {
	//控制url的跳转，更改，就是为了不使用iframe的情况下进行后退不失效
	//history.length的方式不可靠，最长只有50，极限测试下，会挂的
	//back的成立条件是首先会冒泡的之前的delegate 的dir上，然后才会到hashchange上
	if(back){
		var reg = /#(\d+)00$/;
		//console.log("后退");
		var ans  = location.hash || location.hash[0];
		ans = reg.exec(ans);
		if(ans){
			ans = parseInt(ans[1]);
			if(ans){
				ans--;
				reg = /\d+$/;
				$("#dirUl a").each(function  () {
					if(reg.exec(this.href)[0] == ans){
						chaCon(this);
						//console.log(this.href);
						//console.log(reg.exec(this.href));
						return ;
					}
				});
			}
		}
	}
}
function chaCon (node) {
	//在后退和前进都需要使用到的函数，独立出来的,但是IE就不会用到这个函数
	seaFlag = 0;//后退的判断完毕之后，进行后退之前的处理，如颜色，url的更改
	var reg = /(\d+)$/,last = $("#dirUl").find(".liC");
	$(last).removeClass("liC").addClass("dirmenu");
	//$(last).find(".tran").removeClass("tran");
	//$(node).find("span").addClass("tran");
	$(node).find("li").removeClass("dirmenu").addClass("liC");
	temp = reg.exec($(node)[0].href)[1];
	if(temp!=now_type){
		var reg2 = /#(\d+)$/;
		var href = window.location.href;
		if(reg2.exec(href)){
			//console.log(reg2.exec(href));
			window.location.href = href.replace(reg2,"#"+(parseInt(temp)+1)*100);
		}else {
			window.location.href +="#"+(parseInt(temp)+1)*100;//因为担心采集到0，所以避开00的盲区，从100开始，用户不会浏览一百页的
		}
		//刷新的时候，是不会将uri的信息给服务器的，所以给出的信息不是当前页面的,是bug
		$.cookie("uri",temp,{expires:1});//IE是不会通过url的，所以去掉IE
		var fornow = href.replace("#?(/\d*)$/g",temp);
		$("#cont").empty();
		$("#bottomDir ul li").detach();//hide的事件必须保留
		now_type = temp;
		autoload(now_type,0);
	}
}
function changePart () {
	//处理修改板块时候发生的事情
	//如果是IE的话，就不管了，直接跳转吧，为了后退的功能不失效，算是优雅降级吧
	$("#dirUl").delegate("#dirUl a","click",function(event){
		//console.log("测试一下发生顺序，好吗，就是这个的顺序和onhashchange的顺序");
		back = false ;
		$("#seaMore").removeAttr("id").attr("id","np");//seamore是通过将np的id修改成的，不搜索的时候，改回来
		$("#sea").val("");//之所以清空，是因为如果之后点击的时候 ，会因为last 和keyword相同发生bug，所以清除
		//chrome中的结果是首先发生delegate，之后是hashchange
		//其实和点击一样，在后退的时候，也许要发生点击的事情，因此将后面的代码单独成立为函数，
		if(navigator.appName == "Netscape"){
			chaCon(this);
			np.text("下一页");
			event.preventDefault();//我想，如果这里阻止冒泡的话，估计就不会侦测到hashchange了吧
		}
	});	
	/********作用高亮当前板块***********/
	var reg = /(\d+)$/;
	if(now_type == undefined || now_type == "")now_type =0;
	$("#dirUl a").each(function  () {
		if(reg.exec(this.href)[0] == now_type){
			//$(this).find("span").addClass("tran");
			$(this).find("li").removeClass("dirmenu").addClass("liC");
			return false;
		}
	});
	/**************/
}
$(document).ready(function(){
		hiA();
		hisLen = history.length;
		window.onhashchange = urlChange;
		seaFlag = passRight = 0;
		getCon = getTotal = null;
		var reg = /(\d*)(#\d)?$/,partId = 1;//partId标示浏览板块的页数
		tse();//显隐控制
		init();//登陆的初始化
		search();//搜索时候的函数
		/**************处理关于当前板块的东西************/
		var temp = reg.exec(window.location.href)[1];
		if(temp) {
			if(temp>99)temp=(temp/100)-1;
			now_type = temp;
		}
		temp = $.cookie("uri");
		if(temp)now_type = temp;
		/************当前板块的uri处理结束************/
		changePart();
		autoload(now_type);
		showInfo();
		var botDir = $("#bottomDir");
		var timer = 0;
		$(window).scroll(function  () {
			if(timer == 0){
				botDir.css("display","none");
				//botDir.fadeOut(100);
				var flag = setInterval(function  () {
					if(( (new Date()).valueOf() - timer )> 999)
					{
						botDir.fadeIn(999);
						clearInterval(flag);
					}
					timer = 0;
				},999);
			}
			timer = (new Date()).valueOf(); 
		});

});

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
					//console.log(data);
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
	url:site_url+"/reg/getPass/"+userId+"/"+encodeURI(pass),dataType:"json",
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
		url:$("#ent")[0].action+"/1",dataType:"json",type:"POST",data:{"userId":user_id,"passwd":passwd},
		success:function(data){//返回数组，方便将来扩展
			if(data["flag"]){
				cre_zhuxiao(data["photo"],user_name,data["mailNum"],data["comNum"]);
				$("#atten").hide();
				$.cookie("user_name",user_name,{expires:7});//cookie用在登陆地方了
				$.cookie("user_id",user_id,{expires:7});
			}
			else {
				$("#atten").html("<b class = 'danger'>登陆失败,用户名活密码错误</b>");
			}
		},
		error:function  (xml) {
			//console.log(xml);
		}
	});
}
function cre_zhuxiao (photo,name,mail,com) {
	//登陆之后的按钮处理，注销的事件绑定//发现photo太占地方了，目前取消
	$("#ent").detach();
	$("#denter").empty();
	if(mail>0)
		$("#denter").append("<p><a   href = "+site_url+"/write/index"+">新帖</a><a id = 'zhu' href = "+site_url+"/destory/zhuxiao"+">注销</a><a  target = '_blank' href = "+site_url+"/message/index"+">邮箱<sup>新"+mail+"</sup></a></p>");
	else 
		$("#denter").append("<p><a href = "+site_url+"/write/index"+">新帖</a><a id = 'zhu' href = "+site_url+"/destory/zhuxiao"+">注销</a><a target = '_blank' href = "+site_url+"/message/index"+">邮箱</a></p>");
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
				}
			});
			return false;
		});
}

function getInfo (type,partId) {
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+type+"/"+partId,dataType:"json",timeout:5000,
		success:function  (data,textStatus) {
			if(textStatus == "success"){
				seaFlag = 0;
			if (data.length == 0) 	return false;
			if(type != now_type)return false;
				formPage(data,partId);//生成页面dom
			}
			np.text("下一页");
		},
		error: function  (xml) {
			//console.log(xml);
		}
	})
}
function autoload(id,page) {
	//这里是进行自动加载的，根据用户的鼠标而改变，id表示当前浏览的版块，
	//之所以出现bug的原因，是因为没有清空之前板块的请求
	var timer = 0,height,stp=0,total = -1,pageNum = 16,doc = document;
	(page == undefined)?(stp = 1):(stp = page);//从ready中调用，则是从1，其他的时候则是为0
	$("#np").click(function  () {
			//np nextpage，和滚动有差不多作用，只是一个是自动，一个是被动	
			//首先添加申请中符号,有待改进符号问题,然后判断是否已经申请了
			if(seaFlag === 0){//这里是普通的加载请求
				np.text("加载中..");
				seaFlag = 1; //屏蔽之后的请求
				getInfo(id,++stp);//开始申请数据，
			}
	});
	$.ajax({
		url:site_url+"/mainpage/getTotal/"+id,type:"json",
		beforeSend:function  () {total = -1;},
		success:function  (data,textStatus) {
		if ((textStatus=="success")&&(id == now_type)) {
			total = data;
		}
		//else  console.log(data);
		},
		error:function  (xml) {
			console.log(xml);
		}
	});
autoAppend();//控制时序，避免页数颠倒
function autoAppend () {
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+id+"/"+(++stp),dataType:"json",
		complete:function  () {//无论之前的事件结果如何，这个，都必须添加这个事件
			back = true;
			$(window).scroll(function  () {
				if((timer === 0) && (seaFlag === 0)){//!timer貌似有漏洞,每次只允许一个申请
					timer = 1;//进入后立刻封闭if，防止出现两次最后一页//如果在搜索过程中，滚动无效，如果已经发出了请求中，成功之前请求无效;
					setTimeout(function  () {
						height = $(window).scrollTop()+$(window).height();
						if((height+450)> $(doc).height()){//高度还有一部分的时候，开始申请数据
							if(((pageNum*stp) > total)&&(total != -1)){
							//因为需要是异步加在，所以或许已经change_part这边还是没有修改过来变量，执行的，依旧是之前的id	
								if(id == now_type){
									np.text("没有了");
									seaFlag = 1;//因为没有了，就拒绝所有的请求
									total = -1;
								}
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
		
		},
		success:function  (data,textStatus) {
			if(id!=now_type)return false;
			if(textStatus == "success"){
				if (data.length == 0) return false;
				if(formPage(data,stp)){//生成页面dom;
					if(doc.height <=$(window).height()&& (stp<5))//如果页面高度没有屏幕高，再申请
						autoAppend();
				}
			}
		},
		error: function  (xml) {
		   //console.log(xml);
	   }
	});
}
}

function  init(){
	$("#ent").submit(function(){
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
function formPage (data,partId,search) {
	//在search和getInfo中都可以用到的东西，给一个data的函数，形成页，添加到页面中
	var page=document.createElement("div")	,li;
	$(page).addClass("page");
	for (var i = 0,len = data.length; i < len; i++) {
		if(search === undefined)
			li = ulCreateLi(data[i]);
		else li = ulCreateLi(data[i],search);
		$(page).append(li);
	}
	var p = document.createElement("p");
	$(p).addClass("pageDir");
	$(p).html("第<a name = "+partId+">"+partId+"</a>页");
	$("#cont").append(page).append(p);
	$("#bottomDir ul").append("<a href = #"+(partId-1)+"><li class = 'block botDirli'>"+partId+"</li></a>");
	return true;
}
