/*************************************************************************
    > File Name :  ../js/msea.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-06-28 02:22:32
 ************************************************************************/
$(document).ready(function  () {
	//tran(0.002);
	//mapInit();
	subkey();
})
function subkey () {
	var sea = $("#sea");
	$("#sub").submit(function  (event) {
		var key = encodeURI($.trim(sea.val()));
		var lat = 30.757588,lng = 103.93707;//可以的话，就更大体定位吧,这种方式不好
		var latm = lat+0.3;
		var lngm = lng+0.3;
		var dis = Math.max(lng,lngm)+"|"+Math.max(lat,latm)+"|"+Math.min(lng,lngm)+"|"+Math.min(lat,latm);
		console.log(site_url+"/map/keyd?k="+key+"&p="+dis);
		$.getJSON(site_url+"/map/keyd?k="+key+"&p="+dis,function  (data,textStatus) {
			if(textStatus  == "success"){
			}
		})
		var split = location.href;
		split  = split.split("#");
		location.href = split[0]+"#"+key;
		event.preventDefault();
	})
}
function tran (dis) {
	/*
	var opts = {
		strokeColor:"#8F8F8F",
		strokeWeight:1,
		strokeOpacity:0.5,
		enableMassClear:true
	}
	var st = new BMap.Point(op.lng+dis,op.lat+dis);
	var en = new BMap.Point(op.lng-dis,op.lat-dis);
	var poly = new BMap.Polygon([
		new BMap.Point(st.lng,st.lat),
		new BMap.Point(en.lng,st.lat),
		new BMap.Point(en.lng,en.lat),
		new BMap.Point(st.lng,en.lat),
	],opts);
	map.addOverlay(poly);
	*/
	var map = new BMap.Map("allmap");
	var pStart = new BMap.Point(116.236106,39.994579);
	var pEnd = new BMap.Point(116.58508,39.857356);
	map.centerAndZoom(pEnd,11);
	var polygon = new BMap.Polygon([
		  new BMap.Point(pStart.lng,pStart.lat),
		    new BMap.Point(pEnd.lng,pStart.lat),
		  new BMap.Point(pEnd.lng,pEnd.lat),
		    new BMap.Point(pStart.lng,pEnd.lat)
	], {strokeColor:"blue", strokeWeight:6, strokeOpacity:0.5});
	map.addOverlay(polygon);
}
function mapInit () {
	var map = new BMap.Map("allmap");
	map.enableScrollWheelZoom();                            //启用滚轮放大缩小
	map.enableInertialDragging();
	map.enablePinchToZoom();//双指缩放
	map.enableAutoResize();
	var lat = "30.757588",lny = "103.93707";//可以的话，就更大体定位吧,这种方式不好
	var point = new BMap.Point(lny,lat);
	//map.centerAndZoom(point,14);//默认开始定位在科大附近
	var icon = new BMap.Icon(base_url+"favicon.ico",new BMap.Size(24,24));//站点图标logo
	var markeOpt = {//标注的样式和属性初始化
		icon:icon,
		enableDragging:true,
		raiseOnDrag:true
	}
	var locinit = {
		locationIcon:icon,
		anchor:BMAP_ANCHOR_TOP_LEFT
	}
	var loc = new BMap.GeolocationControl(locinit);
	map.addControl(loc);
	loc.addEventListener("locationSuccess",success);
	loc.addEventListener("locationError",error);
function success(opt) {
	console.log(opt.point);
	var opts = {title:"<i style = 'font-size:10px'>贴心小提示:可以右键修改位置哦</i>"}
	var info = new BMap.InfoWindow("就以这点为中心开始找东西喽",opts);
	point = new BMap.Point(opt.point.lng,opt.point.lat);
	map.openInfoWindow(info,point);
	map.centerAndZoom(point,18);//定位成功之后，将图片放到到比较大的位置，即使失败，也按照一般来说放大
	tran(0.002,point);
}
function error (StatusCode) {
	//其实应该是大体定位的，这里
	var lat = "30.757588",lny = "103.93707";
	point = new BMap.Point(lny,lat);
	map.centerAndZoom(point,18);
	$.alet("很遗憾，定位失败,请手动添加");
}

}
