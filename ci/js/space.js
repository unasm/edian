function getmast () {
	var reg = /[\d]+$/;
	var mastId = reg.exec(window.location.href)[0];
	if(mastId)return mastId;
	if((user_id  == "")||(user_id == null))return false;
	return user_id;
}
$(document).ready(function  () {
	var mastId = getmast();
});
