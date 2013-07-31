/*************************************************************************
    > File Name :  ../../js/order.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-07-31 16:28:46
 ************************************************************************/
var cal = Array(),price = Array();
var calAl = $("#calAl");//这里是总价格的表示node
$(document).ready(function(){
    init();
    click();
    add();
})
function add(){
//跟收件人地址和通讯方式有关的都在这里
    var adiv = $("#adiv"),addr = $("#addr");
    adiv.delegate(".addr","click",function () {
        adiv.find(".addCse").removeClass("addCse");
        $(this).addClass("addCse");
        val = $(this).attr("name");
        addr.val(val);
    })
    var nad = $("#nad");
    $("#adsub").click(function(){
        var geter = nad.find("input[name = 'geter']").val();
        var addr = nad.find(".naddr").val();
        var phone = nad.find("input[name = 'phone']").val();
        if(geter && addr && phone){
            nad.find("input[name = 'geter']").val("");
            nad.find(".naddr").val("");
            nad.find("input[name = 'phone']").val("");
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: $.param( $('') ),
                success: function (data, textStatus, jqXHR) {
                    if(data["flag"]){
                        var str = "<div class = 'fir'><span>"+geter+"</span>(收)<span>"+phone+"</span></div><div>"+addr+"</div>";
                        nad.empty().append(str);
                    }else{
                        $.alet(data["atten"]);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $.alet("添加地址失败,请联系客服");
                }
            });
        }else{
            $.alet("请补全地址信息");
            return false;
        }
        console.log(geter);
        console.log(addr);
        console.log(phone);
    })
}
function init(){
    var pri = $(document).find(".pri");
    var bNum = $(document).find(".buyNum");
    for (var i = 0, l = pri.length; i < l; i ++) {
        price[i] = parseFloat($(pri[i]).text());
        cal[i] = parseInt($(bNum[i]).val())*price[i];
    }
    calTot();
}
function click() {
    //对table各种click进行操作，删除，加减，数目要加上change事件
    var dir,node;
    $("body").delegate(".clk","click",function(event){
        dir = $(this).attr("name");
        if(dir == "chose"){
            console.log($(this).val());
            node = parFind(this);
            if(!node)alert("没有找到tr");
            dir = $(node).attr("name");
            if($(this).attr("checked")){
                var num = $(node).find(".buyNum").val();
                cal[dir] = num * price[dir];
            }else{
                cal[dir] = 0;
            }
            calTot();
        }else if(dir == "inc"){
            node = this.parentNode;
            node = $(node).find(".buyNum");
            var num =  parseInt($(node).val()) + 1;
            $(node).val(num);
            dain(this,num);
        }else if(dir == "dec"){
            node = this.parentNode;
            node = $(node).find(".buyNum");
            var num =  Math.max(parseInt($(node).val()) - 1,1);
            $(node).val(num);
            dain(this,num);
        }else if(dir == "del"){
            var href = $(this).attr("href");
        }
    }).delegate(".buyNum","change",function(){
        var num = Math.max(parseInt($(this).val()),1);
        dain(this,num);
    })
    function dain(node,num) {
        //加减操作时候都需要进行的重新计算总数
        node = parFind(node);
        if(!node)alert("没有找到tr");
        var dir = $(node).attr("name");
        cal[dir] = price[dir]*num;
        calTot();
    }
    $("#allChe").click(function(){
        //allchecked 全选，并计算价格
        var chose = $(document).find("input[name = 'chose']");
        var dir = cal[0]?false:true;
        for (var i = 0, l = chose.length;  i< l;  i++) {
            $(chose[i]).attr("checked",dir);
            if(dir){
                var fa = parFind(chose[i]);
                cal[i] = $(fa).find(".buyNum").val()*price[i];
            }else{
                cal[i] = 0;
            }
        }
        calTot();
    })
}
function calTot() {
    //计算总价格的函数
    var ans = 0;
    for (var i = 0, l = cal.length; i < l; i ++) {
        ans += cal[i];
    }
    console.log(ans);
    calAl.text(ans);
}
function parFind(node) {
    node = node.parentNode;
    console.log($(node).attr("tagName"));
    while((node)&&$(node).attr("tagName") != "TR"){
        node = node.parentNode;
    }
    return node;
}
