/*************************************************************************
    > File Name :  ../js/waimai.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-08-01 21:48:28
 ************************************************************************/
$(document).ready(function(){
    var sea = $("#sea");
    var user = $(".user");
    $(".sea").submit(function (event) {
        event.preventDefault();
        var key = $.trim(sea.val());
        for(var i = user.length-1;i>=0;i--){
            var val = $(user[i]).attr("name");
            if(val.indexOf(key) != -1){
                hide(user[i]);
                continue;
            }
            val = $(user[i]).text();
            if(val.indexOf(key) != -1){
                hide(user[i]);
            }
        }
    })
    function hide(node){
        node = fdShop(node);
        $(node).fadeOut();
    }
    function fdShop(node){
        console.log($(node).attr("class"));
        while(node && ($(node).attr("class") != "shop")){
            node = node.parentNode;
        }
        return node;
    }
})
