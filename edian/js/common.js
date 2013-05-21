/*************************************************************************
    > File Name :  ../js/common.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-05-21 20:06:18
 ************************************************************************/
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
	$(li).append("<a class = 'aImg' href = '"+site_url+"/showart/index/"+data["art_id"]+"' ><img  class = 'imgLi block' src = '"+base_url+"thumb/"+data["img"]+"' alt = '商品压缩图' title = "+data["user"]["user_name"]+"/></a>");
	$(li).append("<a class = 'detail' href = '"+site_url+"/showart/index/"+data["art_id"]+"'>"+data["title"]+"</a>");
	$(li).append("<p class = 'user tt '><a href = "+site_url+"/space/index/"+data["author_id"]+"><span class = 'master tt'>店主:"+data["user"]["user_name"]+"</span></a><span class = 'price'>￥:"+data["price"]+"</span></p>");
	$(li).append("<p class = 'user clearfix'>浏览:"+data["visitor_num"]+"/评论:"+data["comment_num"]+"<span class = 'time'>"+data["time"]+"</span></p>");
	var div = doc.createElement("div");
	$(div).addClass("block userCon");
	$(div).append("<p class = 'utran'></p><p class = 'clearfix'><a target = '_blank' href = "+site_url+"/space/index/"+data["author_id"]+"><img class = 'imgLi block' src = '"+base_url+"upload/"+data["user"]["user_photo"]+"'/></a><a href = "+site_url+"/space/index/"+data["author_id"]+" class = 'fuName tt'>"+data["user"]["user_name"]+"</a><a target = '_blank' href = "+site_url+"/message/write/"+data["author_id"]+">站内信联系</a></p><p><span>联系方式:</span>"+data["user"]["contract1"]+"</p>");
	if(data["user"]["addr"])
		$(div).append("<p><span>地址:</span>"+data["user"]["addr"]+"</p>");
	$(div).hide();
	$(li).append(div);
	return li;
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
			$.getJSON(site_url+"/search/index?key="+encodeURI(keyword),function  (data,status) {
				if(status == "success"){
					if(data.length == 0){
						$.alet("你的搜索结果为0");
					}else{
						$("#ulCont").empty();
						$("#bottomDir ul li").detach();
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
