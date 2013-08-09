function getmast () {
    var reg = /[\d]+$/;
    var mastId = reg.exec(window.location.href)[0];
    if(mastId)return mastId;
    if((user_id  == "")||(user_id == null))return false;
    return user_id;
}
$(document).ready(function  () {
    var mastId = getmast();
    if(mastId == user_id){
        getJoin(user_id);
    }
    if(user_id){
        alogin();
        order();//这个，还是采用的之前的，E键下单
        spSendOrd();//发送订单的功能，登录之后才可以
    }
});
function spSendOrd(){
    var  cartHref,price,itemId;
    $("#recent").delegate(".item","click",function(){
        itemId = $(this).attr("name");
        price = $(this).attr("title");
        cartHref = site_url+"/order/add/"+itemId;
        $.ajax({
            url: cartHref,
            type: 'POST',
            data: {"buyNum":1,"price":price},//呵呵，特殊情况下，不能这里添加数目
            dataType:'json',
            success: function (data, textStatus, jqXHR) {
                console.log(data);//目前就算了吧，不做删除的功能,返回的id是为删除准备的
                if(data["flag"]){
                    var str = "<li class = 'clearfix'><a href = '"+site_url+"/item/index/"+itemId+"'><img src = '"+img+"' /></a><div>"+attr+"</div><span>￥"+price+"</span>x<input type = 'text' name = 'ordNum' value = '1'  class = '"+data["flag"]+"'/><a href = '"+site_url+"/item/del/"+data['flag']+"' >删</a></li>"
                    console.log(str);
                    $("#order").append(str);
                    $.alet("成功加入购物车");
                }else{
                    $.alet(data["atten"]);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.alet("加入购物车失败");
            }
        });
    })
}
function getJoin (userId) {
    //获得我参与的板块的数据，因为考虑到隐私？服务器，数据量等问题，用户只允许看自己参与的帖子动态
    $.getJSON(site_url+"/space/getJoin/"+userId,function  (data,status){
        if(status == "success"){
            console.log(data);
            var div = document.createElement("div");
            $(div).attr("id","join").append("<p class = 'partT'><span>我<span class = 'direc'>参</span>与的</span></p>")
            var ul = document.createElement("ul");
            $(ul).addClass("clearfix content");
            for (var i = 0; i < data.length; i++) {
                $(ul).append(creLi(data[i]));
            };
            $(div).append(ul);
            $("body").append(div);
        }else console.log(xhr);
    });
}
function creLi (data) {
    var li = document.createElement("li");
    $(li).addClass("block").append("<a title = "+data["title"]+" href = "+site_url+"/showart/index/"+data["art_id"]+"><img class = 'block liImg' src = "+base_url+"upload/"+data["img"]+" /></a>");
    $(li).append("<a class = 'detail' href = "+site_url+"/showart/index/"+data["art_id"]+">"+data["title"]+"</a>");
    $(li).append("<p class = 'user clearfix'><span class = 'part'>￥:"+data["price"]+"</span><a href = "+site_url+"/space/index/"+data["author_id"]+"><span class = 'master tt'>店主:"+data["name"]+"</span></a></p>");
    $(li).append("<p class = 'user'>浏览:"+data["visitor_num"]+"/回复:"+data["comment_num"]+"<span class = 'time'>"+data["time"]+"</span></p>");
    return li;
}
