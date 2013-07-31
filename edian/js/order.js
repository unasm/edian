/*************************************************************************
    > File Name :  ../../js/order.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-07-31 14:07:05
 ************************************************************************/
var cal = Array(),price = Array();
var calAl = $("#calAl");//这里是总价格的表示node
$(document).ready(function(){
    init();
    click();
})
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
