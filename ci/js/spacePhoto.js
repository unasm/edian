var download_height,page_num;
$(document).ready(function  () {
	//初始化的函数
	var reg = /\d+/;
	var userId = reg.exec(window.location.href);
	if(userId == null){
		userId = user_id;	
	}else userId = userId[0];
	$.ajax({
		url:site_url+"/spacePhoto/getThumb/"+userId,
		dataType:"json",
		success:function(data,textStatus){
			if(textStatus == "success"){
				if(data == "0")console.log("没有登陆");
				var a;
				var div = document.createElement("div");
				for (var i = 0; i < (data.length)&&(i<18);i++) {
					a = creThumb(data[i]["img_id"],data[i]["img_name"]);
					$(div).append(a);
				};
				$(div).attr("id","thumbInner").insertBefore("#arrowdown");
				console.log(div);
				console.log($(a).siblings()[0]);
				console.log($(div));
				$("#arrowdown").keydown(function  () {
					console.log("yes");
				})
			}
		},
		error:function  (xml) {
			console.log(xml);
		}
	});
	download_height=2;
	page_num=0;
	faceAdd();
	$("form").submit(function(){
		var node=document.getElementById("commentContent");
		var content=node.value;
		content=content.replace(/\n/g,"<br/>");
		$.ajax({
			url:url,
			type:"POST",
			async: true,
			data:{"judgeupload":content},
			success:function(responseText) {
				if(responseText=="1"){
					content=content.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+baseUrl+"/face/$1.gif"+"/>");
					//只允许一个的（），读取其中的序号，然后添加，自己增加其他的地址之类的
					create(page_num++,$("#commentUl"),nowTime(),content);
				}
				else {
					alert("出错了，登录状态,若没有错误，请联系管理员douunasm@gmail.com，谢谢了");
				}
			},
			error:function(xml){
				console.log(xml);
			}
		});
		node.value="";//这里表明，其实原生的js更好,目前支持火狐，chrome
		return false;
	});	
	$("#uploadBt").click(function  () {
		creWin();
		function cancel () {
			$("#uparea").detach();
			$(document).unbind("keydown");
		}
		$("#cancel").click(cancel);
		$(document).keydown(function  () {
			if(window.event.keyCode == 27)
				cancel();
		});
	})
});
function getThumb (userId) {

}
function creThumb (id,name) {
	var a = document.createElement("a");
	$(a).attr("href",base_url+"upload/"+name);
	$(a).append("<img src = '"+base_url+"thumb/"+name+"' class = 'thumb block'/>");
	return a;
}
function creWin () {
	var div = document.createElement("div");
	var div2 = document.createElement("div");
	$(div2).attr("id","inner");
	$(div).attr("id","uparea");//uploadarea
	$(div2).append("<iframe src = '"+site_url+"/chome/upload"+"' scrolling = 'No' frameborder = 'no' name = 'load'></iframe>");
	$(div2).append("<img id = 'cancel' src = '"+base_url+"bgimage/cancel.jpg"+"'/>");
	$(div).append(div2);
	$("body").append(div);
}
//window.onscroll=autoload;
function autoload() {
	//这里是进行自动加载的，根据用户的鼠标而改变
	/*id表示当前浏览的图片的id.size，
	*/
	var height=$(window).scrollTop()+$(window).height();
	if((height+download_height)>document.height){//不能到底部的时候才开始加载，提前一些才好，这里是100，在前面设置
		var father=$("#commentUl");
		create(page_num,father);
		page_num++;
	}
}
function create (pageNum,father,time,content) {
	//page_num表示当前浏览到的页数,该函数是生成评论的li,代码很搓，有待优化
}
function getGifName (name) {//通过传入的url获得其中隐藏的图片名称
	var reg = /(\d+).gif$/;
	return reg.exec(name)[1];
}
function nowTime () {//获得本地的时间"2013-4-6 20:27:32"的形式
	var time=new Date();
	return time.getFullYear()+"-"+(time.getMonth()+1)+"-"+time.getDate()+" "+time.getHours()+":"+time.getMinutes()+":"+time.getSeconds();
}
function faceAdd () {
	$("#face").delegate("img","click",function(){
		var temp=getGifName(this.src);
		var content=document.getElementById("commentContent");
		content.value=content.value+"[face:"+temp+"]";
	});
}

