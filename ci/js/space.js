function getmast () {
	var reg = /[\d]+$/;
	var mastId = reg.exec(window.location.href)[0];
	if(mastId)return mastId;
	if((user_id  == "")||(user_id == null))return false;
	return user_id;
}
$(document).ready(function  () {
	var mastId = getmast();
	getInfo(mastId);
});
function getInfo () {
	//通过ajax获取数据,在space页面申请用户参与的帖子的数据申请，一来数据比较大，而来用户关心程度降低，而且，加快下载
	var reg = /info/;
	var href = window.location.href;
	if(reg.exec(href)){
		console.log("这里是明信片");	
	}
}
