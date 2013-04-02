$(document).ready(function  () {
	$("#face").hide();
	$("#judge input").hide();
	comconstru(site_url+"/showart/addCom/35");
	com();
	var reg = /([0-9]+)$/;
	var messId = (reg.exec(window.location.href))[0];
	console.log(site_url+"/message/jsonsend/"+messId);
	$.ajax({
		url:site_url+"/message/jsonsend/"+messId,
		dataType:"json",
		success:function  (data,textStatus) {
			console.log(textStatus);
			console.log(data);
		},
		error:function  () {
			console.log("cuowu");
		}
	});
});
function comconstru (url) {
	//初始化的函数
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
