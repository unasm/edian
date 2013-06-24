/*************************************************************************
    > File Name :  ../js/msea.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-06-24 23:41:16
 ************************************************************************/
$(document).ready(function  () {
	//mapInit();
})
function mapInit () {
	var map = new BMap.Map("allmap");
	map.enableScrollWheelZoom();                            //启用滚轮放大缩小
	map.enableInertialDragging();
	map.enablePinchToZoom();//双指缩放
	map.enableAutoResize();
	var lat = "30.757588",lny = "103.93707";
	console.log(lat);
	var point = new BMap.Point(lny,lat);
	map.centerAndZoom(point,14);//默认开始定位在科大附近
	/*
	var icon = new BMap.Icon(base_url+"favicon.ico",new BMap.Size(24,24));//站点图标logo
	var markeOpt = {//标注的样式和属性初始化
		icon:icon,
		enableDragging:true,
		raiseOnDrag:true
	}
	var locinit = {
		locationIcon:icon,
	}
	*/
}
