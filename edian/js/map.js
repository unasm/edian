/*************************************************************************
    > File Name :  ../js/map.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-06-19 21:57:50
 ************************************************************************/
/*
 * 地图的宽度不能太小，就li的宽度吧，放缩的比例值为18
 */
var map = new BMap.Map("allmap");            // 创建Map实例
map.enableScrollWheelZoom();                            //启用滚轮放大缩小
map.enableInertialDragging();
map.enablePinchToZoom();//双指缩放
map.enableAutoResize();
/*************变量的初始化*********************/
var icon = new BMap.Icon(base_url+"favicon.ico",new BMap.Size(24,24));//站点图标logo
var markeOpt = {//标注的样式和属性初始化
	icon:icon,
	enableDragging:true,
	raiseOnDrag:true
}
var locinit = {
	locationIcon:icon,
	enableAutoLocation:true
}//默认从开始就定位,网站性质使然
/************定位**************/
var loc = new BMap.GeolocationControl(locinit),point;
function success(opt) {
	var opts = {title:"<i style = 'font-size:10px'>贴心小提示</i>"}
	var info = new BMap.InfoWindow("您的店在这里.不准确的话可以右键<b>修改</b>哦",opts);
	map.openInfoWindow(info,opt.point);
	point = new BMap.Point(opt.point.lny,opt.point.lat);
	map.centerAndZoom(point,18);//定位成功之后，将图片放到到比较大的位置，即使失败，也按照一般来说放大
}
function error (StatusCode) {
	var lat = "30.757588",lny = "103.93707";
	point = new BMap.Point(lny,lat);
	map.centerAndZoom(point,18);
	$.alet("很遗憾，定位失败,请手动添加");
}
loc.addEventListener("locationSuccess",success);
loc.addEventListener("locationError",error);
map.addControl(loc);
/*************关于右键定位******************/
var marker = 0;
map.addEventListener("rightclick",function  () {
	//右键单击添加标注，之所以是右键，因为需要移除之前添加的那些
	var menu = new BMap.ContextMenu();
	var textItem = [{
			text:'我的店在这里',
			callback:function  (p) {
				map.clearOverlays();//将之前的的自动定位之类，手动添加全部清除
				overlay(p);//
				map.removeContextMenu(menu);
			}
	}];
	console.log(textItem[0].text);
	var item = new BMap.MenuItem(textItem[0].text,textItem[0].callback);
	menu.addItem(item);
	map.addContextMenu(menu);
})
function overlay (po) {
	if(marker)map.removeOverlay(marker);
	marker = new BMap.Marker(po,markeOpt);
	map.addOverlay(marker);
	marker.setAnimation(BMAP_ANIMATION_BOUNCE);
	setTimeout(function  () {
		marker.setAnimation(null);
	},800);//一直跳觉得有点讨厌，这里跳两下停止
}
