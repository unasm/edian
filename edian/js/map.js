/*************************************************************************
    > File Name :  ../js/map.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-06-19 01:58:56
 ************************************************************************/
/*
 * 地图的宽度不能太小，就li的宽度吧，放缩的比例值为18
 */
var map = new BMap.Map("allmap");            // 创建Map实例
map.enableScrollWheelZoom();                            //启用滚轮放大缩小
map.enableInertialDragging();
map.enablePinchToZoom();//双指缩放
map.enableAutoResize();
var lat = "30.662229",lny = "104.073858";
var point = new BMap.Point(lny,lat);
map.centerAndZoom(point,18);
/************定位**************/
var loc = new BMap.GeolocationControl();
function success(opt) {
	console.log(opt);
	console.log(opt.point.lat);
	console.log(opt.point.lng);
}
function error(statusCode) {
	console.log(statusCode);
}
loc.addEventListener("locationSuccess",success);
loc.addEventListener("locationError",error);
map.addControl(loc);
/************热区**************/
var hot = new BMap.Hotspot(point);
map.addHotspot(hot);
/*************关于右键定位******************/
map.addEventListener("rightclick",right);
function  right(event) {
	//关于offsetx还有待考察，火狐和opera未必相同
	var p = {x:0,y:0};
	p.x = event.offsetX;
	p.y = event.offsetY;
	console.log(p);
	var po = map.pixelToPoint(p);
	console.log(po);
	var menu = new BMap.ContextMenu();
	var item = new BMap.MenuItem("我的店在这里",chose);
	menu.addItem(item);
	map.addContextMenu(menu);
	function chose () {
		map.removeContextMenu(menu);
	}
}

