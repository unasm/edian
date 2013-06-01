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
	$("#showsub").click(function  () {
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
		return false;
	})
}
function urlChange () {
	//控制url的跳转，更改，就是为了不使用iframe的情况下进行后退不失效
	//history.length的方式不可靠，最长只有50，极限测试下，会挂的
	//back的成立条件是首先会冒泡的之前的delegate 的dir上，然后才会到hashchange上
	if(back){
		var ans = window.location.href.split("#");
		if((ans.length>1)&&(ans[1]!="")){
			ans = ans[1];
		}else ans = 0;
		if(ans){
			reg = /\d+$/;
			if(reg.exec(ans)){
				if(ans>99){//如果是数字，并且大于100，是跳转，不然只是业内跳转
					ans = parseInt(ans/100)-1;
					$("#dirUl a").each(function  () {
						if(reg.exec(this.href)[0] == ans){
							chaCon(this);
							return ;
						}
					});
				}
			}else{//不是数字就是搜索
				getSea(ans);
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
		var href = window.location.href.split("#");
		if(href.length>1)
			href = href[0];
		window.location.href = href+"#"+(parseInt(temp)+1)*100;
		//刷新的时候，是不会将uri的信息给服务器的，所以给出的信息不是当前页面的,是bug
		$.cookie("uri",temp,{expires:1});//IE是不会通过url的，所以去掉IE
		//var fornow = href.replace("#?(/\d*)$/g",temp);
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
		passRight = 0;
		getCon = getTotal = null;
		var  partId = 1;//partId标示浏览板块的页数
		tse();//显隐控制
		init();//登陆的初始化
		search();//搜索时候的函数
		/**************处理关于当前板块的东西************/
		var temp = window.location.href.split("#");
		if((temp.length == 2)&&(temp[1]!="")){
			var reg = /\d+\/?/;
			temp = temp[1];
			//debugger;
			if(reg.exec(temp)){
				if(temp>99)temp=(temp/100)-1;
				now_type = temp;
				seaFlag = 0;	
			}else{
				seaFlag = 1;	
				getSea(temp);
			}
		}
		/************当前板块的uri处理结束************/
		changePart();
		autoload(now_type);
		showInfo();
		mess();
		/*
		 *发现，效果不好，就是想要它出来的时候，不见，平时又总是冒出来
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
		*/

});
function mess () {
	var temp = "<form class = 'block msgA' action = "+site_url+"/message/add method = 'post' accept-charset = 'utf-8'><input type = 'text' name = 'title' class = 'msgt' placeholder = '标题'/><input type = 'button' name = 'cc' value = '取消'/>";
		//<input type = 'text' name = 'geter' value = 'tianyi(123)'/>"
	var left = "<input type = 'submit' name = 'sub' value = '发送'/><textarea name = 'cont' placeholder = '内容...'></textarea></form>";
	var reg = /\d+\/?/,name,id,msga,flag;
	$("#cont").delegate(".mess","click",function  (event) {
		if(msga){
			flag = msga;
			flag.fadeOut();
		}
		name = this.name;
		id = reg.exec(this.href);
		if(id)id = id[0];
		var fat = this.parentNode.parentNode;
		msga = $(fat).siblings(".msgA");
		if(msga.length){
			msga.fadeIn();
		}else{
			$(fat).before(temp+"<input type = 'text' name = 'geter' value = "+name+"("+id+")"+">"+left)	;
			msga = $(fat).siblings(".msgA");
		}
		event.preventDefault();
	}).delegate("input","click",function  (event) {
		var tp = event.target.type;
		if(tp === "button"){
			flag = msga;
			flag.fadeOut();
			msga = null;
		}else if(tp === "submit"){
			var tit = $.trim($(this).siblings("input[name = 'title']").val());
			var geter = $.trim($(this).siblings("input[name = 'geter']").val());
			var text = $($(this).siblings("textarea")).val();
			return;
			if(tit.length == 0){
				$.alet("标题是要有的哦");
				return false;
			}
			var fater = this.parentNode;
			var url = fater.action+"/1";
			$.ajax({
				url:url,dataType:"json",type:"POST",
				data:{"geter":geter,"cont":text,"title":tit},
				success:function  (data) {
					(data == "1")?$.alet("发送成功"):$.alet(data);
				}
			})				
			fater.style.display = "none";
		}
		event.preventDefault();
	})
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
		if((sec == "")||(sec =="密码"))return;
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
		url:site_url+"/mainpage/infoDel/"+type+"/"+partId+"/1",dataType:"json",timeout:5000,
		success:function  (data,textStatus) {
			if(textStatus == "success"){
				seaFlag = 0;
				if (data.length == 0){ 	
					np.text("没有了..");
					return false;
				}
				if(type != now_type)return false;
				formPage(data,partId);//生成页面dom
			}
			np.text("下一页");
		},
		error: function  (xml) {
			np.text("下一页");
			//console.log(xml);
		}
	})
}
function autoload(id,page) {
	//这里是进行自动加载的，根据用户的鼠标而改变，id表示当前浏览的版块，
	//之所以出现bug的原因，是因为没有清空之前板块的请求
	var timer = 0,height,stp=0,total = -1,pageNum = 16,doc = document;
	var reg = /\d+/;
	if(!reg.exec(id)){
		return;//id不是数字的情况下，就返回无视
	}
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
	//在搜索的时候，没有必要发起下面的函数
	if(!seaFlag)
		autoAppend();//控制时序，避免页数颠倒
function autoAppend () {
	$.ajax({
		url:site_url+"/mainpage/infoDel/"+id+"/"+(++stp)+"/1",dataType:"json",
		complete:function  () {//无论之前的事件结果如何，这个，都必须添加这个事件
			back = true;
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
function showInfo () {
	//控制用户信息悬浮的函数I;
	var inarea = 0,show = 0,info = null,lastCon = null;//在可悬浮区域内部外部标志变量
	//lastCon 上一个显示出来的aImg,在进入aImg 的时候判断
	$("#ulCont").delegate(".aImg","click",function  (event) {
			if((info != null)&&(lastCon != this)){//在上一个,因为有进入另一个的可能性，所以需要判断新进入的和上一个是不是同一个
				var temp = info;
				temp.slideUp();//让他慢慢消失吧,一个的消失是另一个的开始
				show = 0;
			}
			lastCon = this;//现在正在有一个显示中,将正在显示的复制
			inarea = 1;
			info = $(this).siblings(".userCon");
			/*
			if(show)
				info.slideUp();
			else 
				info.slideDown();
				*/
			show?info.slideUp():info.slideDown();
			show = 1-show;
			//ct(this);//不必再计时，立刻显示
		event.preventDefault();
	}).delegate(".aImg","mouseleave",function  () {
		//info = $(this).siblings(".userCon");//离开的时候将她赋值，成为全局变量,方便之后隐藏
		//既然click过，必然enter，不必在查找dom
		inarea = 0;
		if(show)close();//自由在落下来的情况下，会开始计时
	}).delegate(".userCon","mouseenter",function  () {
		inarea = 1;//单纯的延长时间
	}).delegate(".userCon","mouseleave",function  () {
		inarea = 0;
		if(show)close();
	})
	function ct (node) {
		//count Time,在一个图片停放一定时间才决定要不要显示信息
		setTimeout(function  () {
			if((lastCon == node)&&(inarea))//只有是同一个图片，中间没有改变，并且还在区域内部才可以
				$(node).siblings(".userCon").slideDown();
		},350);//或许事件有点短，步步哦，太长了就不好，而且，只是针对滑过的情况其实足够了
	}
	function close () {
		//延迟0.5S，之后不在显示区域就隐藏
		setTimeout(function  () {
			if(inarea == 0){
				$(info).slideUp();
				info = null;
				show = 0;
			}
		},9990);
	}
}
function ulCreateLi(data,search) {
	//这个文件创建一个li，并将其中的节点赋值,psea有待完成,photo还位使用
	//肮脏的代码，各种拼字符串
	var doc = document;
	var li=doc.createElement("li");
	$(li).addClass("block");
	$(li).append("<a class = 'aImg' href = '"+site_url+"/showart/index/"+data["art_id"]+"' ><img  class = 'imgLi block' src = '"+base_url+"thumb/"+data["img"]+"' alt = '商品压缩图' title = "+data["user"]["user_name"]+"/></a>");
	$(li).append("<a class = 'detail' href = '"+site_url+"/showart/index/"+data["art_id"]+"'>"+data["title"]+"</a>");
	$(li).append("<p class = 'user tt '><a href = "+site_url+"/space/index/"+data["author_id"]+"><span class = 'master tt'>店主:"+data["user"]["user_name"]+"</span></a><span class = 'time'>￥:"+data["price"]+"</span></p>");
	$(li).append("<p class = 'user tt'><span class = 'time'>"+data["time"]+"</span>浏览:"+data["visitor_num"]+"/评论:"+data["comment_num"]+"</p>");
	var div = doc.createElement("div");
	$(div).addClass("clearfix userCon").css("display","none");
	$(div).append("<a  target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+"><img class = 'block' src = '"+base_url+"upload/"+data["user"]["user_photo"]+"'/></a><p ><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+" class = 'fuName tt'>sdfasdfasdfasdfas"+data["user"]["user_name"]+"</a><a class = 'mess' target = '_blank' href = "+site_url+"/message/write/"+data["author_id"]+">站内信联系</a></p><p><span>联系方式:</span>"+data["user"]["contract1"]+"</p>");
	if(data["user"]["addr"])
		$(div).append("<p><span>地址:</span>"+data["user"]["addr"]+"</p>");
	$(li).append(div);
	return li;
}
function search () {
	$("#sea").focus(function  () {
		$("#seaatten").text("");
	}).blur(function  () {
		if(($.trim($("#sea").val()))=="")//只有去掉空格才可以，不然会出bug
			$("#seaatten").html("搜索<span class = 'seatip'>请输入关键字</span>")
	})
	//所有关于search操作的入口函数
	$("#seaform").submit(function  () {
			var keyword = $.trim($("#sea").val());
			if(keyword == last)return false;//担心用户的连击造成重复申请数据
			if(keyword.length == 0){
				$.alet("请输入关键字");
				return false;	
			}
			back = false;
			var temp = window.location.href.split("#");
			temp = temp[0];
			window.location.href = temp+"#"+keyword;
			getSea(keyword);
			return false;
		})
}
var last;
function getSea (keyword) {
		//在search触发之后，对key进行审查之后的开始搜索
			last = keyword;
			seaFlag = 1;
			now_type = -1;
			var enkey = encodeURI(keyword);
			$.getJSON(site_url+"/search/index?key="+enkey,function  (data,status) {
				back = true;
				if(status == "success"){
					if(data.length == 0){
						$.alet("你的搜索结果为0");
					}else{
						$("#cont").empty();
						$("#bottomDir ul li").detach();
						var last = $("#dirUl").find(".liC");
						$(last).removeClass("liC").addClass("dirmenu");
						$(last).find(".tran").removeClass("tran");
						formPage(data,1,1);
						$("#np").removeAttr("id").attr("id","seaMore");
						//$("#content").append("<p style = 'text-align:center'><button id = 'seaMore'>更多....</button></p>")
						getNext();
					}
				}
			});
			function getNext () {//获得搜索下一页的函数
				var page = 1,seaing = 0;
				var more = $("#seaMore");
				more.click(function  () {
						if(seaing == 0){
							seaing = 1;
							$.alet("seaing");
							more.text("加载中..");
							$.getJSON(site_url+"/search/index/"+(page)+"?key="+enkey,function  (data,status,xhr) {
								if(status == "success"){
										if(data.length == 0){
										$.alet("你的搜索结果为0");
										more.text("没有了");
									}else{
										seaing = 0;
										formPage(data,++page,1);
										(data.length<16)?(more.text("没有了")):(more.text("下一页"));
									}
								}
								//else console.log(xhr);
							});
						}
				});
			}	
}
