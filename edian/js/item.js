/*************************************************************************
    > File Name :  ../../js/item.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-07-24 16:22:51
 ************************************************************************/
$(document).ready(function(){
    console.log("hello");
    pg();//集中了页面切换的操作
})
function pg() {
    var temp,pg = $("#pg");//pg 页面切换的ul
    $("#judge").click(function () {
        var lis = pg.find("li");
        for (var i = lis.length - 1; i >= 0; i --) {
            temp = $(lis[i]).class();//不知道所个class的时候，会不会出错呢
            console.log(temp);
            if(temp == "cse")$(temp[i]).removeClass("cse");
            temp = $(lis[i]).attr("name");
            if(temp == "judge"){
                $(temp).addClass("cse");
            }
        }
    })
}
