/*************************************************************************
    > File Name :  ../../js/item.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-07-28 16:36:06
 ************************************************************************/
$(document).ready(function(){
    pg();//集中了页面切换的操作
    det();
    comment();
})
function pg() {
    //pg切换有关的操作
    var temp,pg = $("#pg");//pg 页面切换的ul
    var des = $("#des"),dcom = $("#dcom");
    var last = des;//决定下面那个首先显示
    $("#judge").click(function () {
        var lis = pg.find("li");
        for (var i = lis.length - 1; i >= 0; i --) {
            temp = $(lis[i]).attr("class");//不知道所个class的时候，会不会出错呢
            if(temp == "cse")$(lis[i]).removeClass("cse");
            temp = $(lis[i]).attr("name");
            if(temp == "comment"){
                $(lis[i]).addClass("cse");
                last.css("display","none");
                last = dcom;
                last.fadeIn();
            }
        }
    });
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
        //进入thumb则切换主图片
        var mImg = $("#mImg");
        $("#thumb").delegate("img","mouseenter",function () {
            mImg.attr("src",$(this).attr("src"));
        })
    }();
    void function(){
        //对attr进行处理
        nodeAttr = $(".attr");
        var temp,price = $("#price"),tStore = $("#tS"),len = Array();
        var info = attr.split(";");
        for (var i = 0, l = nodeAttr.length; i < l; i ++) {
            //对第一个进行选择,在接下来的地方修改数值参数
            temp = $(nodeAttr[i]).attr("name",i).find(".atv");
            len[i] = temp.length;
            $(temp[0]).addClass("atvC");
        }
        console.log(len);
        if(nodeAttr.length == 1){
            var locx = 0;
            for (var i = 0; i < len[0]; i ++) {
                info[i] = info[i].split(",");
            }
            total = info[locx][0];//修改总的值
            tStore.text(info[0][0]);
            price.text(info[0][1]);
            nodeAttr.delegate(".atv","click",function(){
                locx = $(this).attr("name");
                var par = this.parentNode;
                $(par).find(".atvC").removeClass("atvC");
                $(this).addClass("atvC");
                console.log(info[locx]);
                tStore.text(info[locx][0]);
                total = info[locx][0];//修改总的值
                price.text(info[locx][1]);
            });
        }else if(nodeAttr.length == 2){
            var loc = Array();
            loc[0] = 0,loc[1] = 0;
            var cnt = 0;
            temp = Array();
            for(var i = 0;i < len[0];i++){
                temp[i] = new Array();
                for(var j = 0;j < len[1];j++){
                    temp[i][j] = info[cnt].split(",");
                    cnt++;
                }
            }
            info = temp;
            tStore.text(info[0][0][0]);//修改第一个对应的库存和价格
            total = info[0][0][0];
            price.text(info[0][0][1]);
            nodeAttr.delegate(".atv","click",function(){
                var par = this.parentNode;
                $(par).find(".atvC").removeClass("atvC");
                $(this).addClass("atvC");
                loc[$(par).attr("name")] = $(this).attr("name");//修改坐标
                tStore.text(info[loc[0]][loc[1]][0]);
                total = info[loc[0]][loc[1]][0];//修改总的数值
                price.text(info[loc[0]][loc[1]][1]);
            })
        }
        function change(){

        }
    }();

}
function comment(){
    //集中了和评论有关的操作，包括隐藏，添加，上传等等
    $("#com").delegate(".reCom","click",function(event){
        console.log(event.srcElement);
        if(!user_id){
            $.alet("请首先登录");
            return false;
        }
        var ftr = this;
        var node = event.srcElement;
        var name = $(node).attr("name");
        console.log(name);
        if(name == "comRe"){
            $(ftr).find("form").slideToggle();//.slideDown();
        }else if(name == "sub"){
            //这里是提交
            var cont = $.trim($(ftr).find("textarea").val());
            var action = $.trim($(ftr).find("form").attr("action"));
            if(cont.length < 2){
                $.alet("呵呵,这么短，合适吗");
                return false;
            }
            var id = $(node).attr("id");
            upCom(action,cont,appcom,id);
            event.preventDefault();
        }else if(name == "context"){
            $(node).animate({
                height:"80px"
            })
        }
    })
    $("#comForm").submit(function(){
        console.log("开始处理上传之前的事情");
        var context = $.trim($("#context").val());
        if(context.length < 5){
            $.alet("字数少，显示不出诚意嘛");
            return false;
        }
        var score = $("#score").val();
        upCom(site_url+"/item/newcom/"+itemId,context,newComBack,score);
        event.preventDefault();
    })
    $("#context").focus(function(){
        $(this).animate({
            height:"100px"
        })
    })
}
function newComBack(context,score) {
    var tar = $("#com li").first();
    var str = "<li><p class = 'cp'><span>评分:</span><span class = 'sp'>"+score+"</span><span>"+user_name+"</span><span>"+date()+"</span></p><blockquote>"+context+"</blockquote><div class = 'reCom' ><span name = 'comRe' class = 'comRe'>回复</span><form action="+site_url+'/item/appcom/'+itemId+" method='post' accept-charset='utf-8' enctype = 'multipart/form-data' style = 'display:none'><textarea  name = 'context' placeholder = '评论...' ></textarea><input type='submit' name='sub'  value='回复' /></form></div></li>";
    $(tar).before(str);
    console.log(str);
    $("#context").animate({
        "height":"33px"
    })
}
function date() {
//获得本地的时间"2013-4-6 20:27:32"的形式
    var time=new Date();
    return time.getFullYear()+"-"+(time.getMonth()+1)+"-"+time.getDate();
}
function appcom(cont,id){
    var node = document.getElementById(id);
    node = node.parentNode;
    $(node).slideUp();//将form隐藏
    node = node.parentNode;//插入到recom之前
    var str = "<div class = 'reCom'><p>"+cont+"</p><span>"+user_name+"</span><span>"+date()+"</span></div>";
    $(node).before(str);
    var area = $(node).find("textarea");
    $(area).val("");
}
function upCom(href,con,callback,score) {
    $.ajax({
        url: href,
        type: 'POST',
        dataType: 'json',
        data:{"context":con,"score":score},
        complete: function (jqXHR, textStatus) {
            console.log(textStatus);
        },
        success: function (data, textStatus, jqXHR) {
            //success callback;
            if(data["flag"] == -1){
                $.alet($data["atten"]);
            }else{
                $.alet("评论成功");
                callback(con,score,data["flag"]);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.alet("评论失败");
            // error callback
        }
    });
}
