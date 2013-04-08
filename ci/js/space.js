function getmast () {
	var reg = /[\d]+$/;
	var mastId = reg.exec(window.location.href)[0];
	console.log(mastId);
	if(mastid)return mastid;
	if((user_id  == "")||(user_id == null))return false;
	return user_id;
}
$(document).ready(){
	console.log("testing");
	var mastId = getmast();
	getInfo(mastId);
};
function getInfo () {
	//通过ajax获取数据,算了，不要了吧,这样，就好像滥用了
}
