var download_height,page_num;
function construct () {
	//初始化的函数
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
					content=content.replace(/\[face:(\(?[0-9]+\)?)]/g,"<img src="+baseUrl+"/face/$1.gif"+" />");
					//只允许一个的（），读取其中的序号，然后添加，自己增加其他的地址之类的
					create(page_num++,$("#commentUl"),nowTime(),content);
				}
				else {
					alert("出错了，登录状态,若没有错误，请联系管理员douunasm@gmail.com，谢谢了");
				}
			},
			error:function(xml){

			}
		});
		node.value="";//这里表明，其实原生的js更好,目前支持火狐，chrome
		return false;
	});
}
//window.onscroll=autoload;
function autoload() {
	//这里是进行自动加载的，根据用户的鼠标而改变
	/*id表示当前浏览的图片的id，
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
	var li=document.createElement("li");
	if(pageNum%2) 	$(li).addClass("odd");
	$(father).append(li);
	var divfa=document.createElement("div");
	$(li).append(divfa);
	$(divfa).addClass("content");
	var div=document.createElement("div");
	$(divfa).append(div)
		$(div).addClass("block userInfo");
	$(div).append("<img class='block' src='http://c1.neweggimages.com.cn/neweggpic2/neg/P380/A28-105-0AR.jpg?v=810D7695D98A46CF81E2'/>");
	$(div).append("<p>用户名:<span>"+"将来添加用户名"+"</span></p>");
	$(div).append("<p>在线:<span>"+"是/否"+"</span></p>");
	$(div).append("<p>时间:"+time+"</p>");
	div=document.createElement("div");
	$(div).addClass("commentInfo");
	$(divfa).append(div);
	$(div).append(content);
}
function nowTime () {
	//获得本地的时间"2010-2-23"的形式
	var time=new Date();
	var res="";
	res+=time.getFullYear();
	res+="-"+(time.getMonth()+1);
	res+="-"+time.getDate();
	return res;
}
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
function faceAdd () {
	$("#face img").click(function(){
		var temp=getGifName(this.src);
		var content=document.getElementById("commentContent");
		content.value=content.value+"[face:"+temp+"]";
	});
}
function getsize (path) {
		var size=path.files[0].size/1000;
		var span = document.getElementById("showsize");
		if(size>2000){
				span.innerHTML = size+"KB"+" 超过2M的文件会导致上传失败".fontcolor("red");
		}
		else {
				span.innerHTML=size+"KB";
		}
}
