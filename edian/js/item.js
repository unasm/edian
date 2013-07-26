/*************************************************************************
    > File Name :  ../../js/item.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-07-26 11:00:47
 ************************************************************************/
$(document).ready(function(){
    pg();//集中了页面切换的操作
    det();
    //$("#body").append('<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d">\x3C/script>');
    /*
    $("#mapId").attr("src","
                     http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d"
                    );
    setTimeout(function() {
        $("#mapId").onload = function(){
        console.log("test");
        var map = new BMap.Map("allmap");
        map.enableScrollWheelZoom();                            //启用滚轮放大缩小
        map.enableInertialDragging();
        map.enablePinchToZoom();//双指缩放
        map.enableAutoResize();
        var lat = "30.757588",lny = "103.93707";//可以的话，就更大体定位吧,这种方式不好
        var point = new BMap.Point(lny,lat);
        map.centerAndZoom(point,17);//默认开始定位在科大附近
    }

    }, 1000);
*/
})
function pg() {
    //pg切换有关的操作
    var temp,pg = $("#pg");//pg 页面切换的ul
    $("#judge").click(function () {
        var lis = pg.find("li");
        for (var i = lis.length - 1; i >= 0; i --) {
            temp = $(lis[i]).attr("class");//不知道所个class的时候，会不会出错呢
            if(temp == "cse")$(lis[i]).removeClass("cse");
            temp = $(lis[i]).attr("name");
            if(temp == "comment"){
                $(lis[i]).addClass("cse");
            }
        }
    });
    var des = $("#des"),dcom = $("#dcom");
    var last = des;
    pg.delegate("li","click",function(){
        var name = $(this).attr("name");
        pg.find(".cse").removeClass("cse");
        $(this).addClass("cse");
        last.fadeOut(function(){
            if(name == "more"){
                last = des;
                last.fadeIn();
            }else if(name == "comment"){
                last = dcom;
                last.fadeIn();
            }
        })
    })
}
function det() {
    var total = $.trim($("#storeNum").text());
    var reg = /\d+$/;
    total = reg.exec(total);
    total = total[0];
    var buyNum = $("#buyNum"),num;
    $("#numCon").delegate("button","click",function () {
        var dir = $(this).attr("class");
        num = parseInt(buyNum.val());
        if(dir == "inc"){
            num = Math.min(num+1,total);
            buyNum.val(num);
        }else if(dir == "dec"){
            num = Math.max(num-1,1);
            buyNum.val(num);
        }
    })
    void function(){
        var mImg = $("#mImg");
        $("#thumb").delegate("img","mouseenter",function () {
            mImg.attr("src",$(this).attr("src"));
        })
    }();
}
