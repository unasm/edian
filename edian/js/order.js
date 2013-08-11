/*************************************************************************
    > File Name :  ../../js/order.js
    > Author  :      unasm
    > Mail :         douunasm@gmail.com
    > Last_Modified: 2013-08-11 21:31:20
 ************************************************************************/
jQuery.alet = function (cont) {//给出各种提示的函数，和alert不同，这个过1s就消失
	var alet = document.createElement("div");
	var p = document.createElement("p");
	var css = {
		width:'200px'
	};
	$(alet).css(css);
	css = {
		position:'absolute',
		padding:'15px',
		background:'#000',
		top:$(window).scrollTop()+100+"px",
		left:$(document).width()/2-100+"px",
		margin:'0 auto',
		"border-radius":"5px",
		color:"white",
		"z-index":"20"
	}
	$(p).css(css);
	$(p).text(cont);
	$(alet).append(p);
	$("body").append(alet);
	setTimeout(function  () {
		$(alet).detach();
	},3999);
}
var cal = Array(),price = Array();
var calAl = $("#calAl");//这里是总价格的表示node
$(document).ready(function(){
    init();
    click();
    add();
    $("#sub").click(function(event){
        var val = $("#addr").val();
        console.log(val);
        if(val == ""){
            $.alet("请选择/添加收货地址");
            return false;
        }
    })
    sub();//提交的时候的操作
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
            var url = site_url+"/order/addr/";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {"addr":addr,"geter":geter,"phone":phone},
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    if(data["flag"]){
                        console.log(data["atten"]);
                        var str = "<div class = 'fir'><span>"+geter+"</span>(收)<span>"+phone+"</span></div><div>"+addr+"</div><span class = 'aten'>收货地址</span>";
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
            //删除所选的物品
            var href = $(this).attr("href");
            var node = this.parentNode;
            $.ajax({
                url: href,
                type: 'get',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    if(data){
                        $.alet("删除成功");
                        var cls = $(node).attr("name");//从name中读取店家的id,在父节点的tr中有
                        node = node.parentNode;//现在node是tr
                        $(node).detach();//删除tr
                        var cls = $("."+cls);//cls 作为class 是该table的class
                        console.log(cls);
                        var temp = cls.find("tr");//在table内查找店家的商品是否还有
                        if(temp.length == 0){
                            $.alet("删除");
                            cls.detach();
                            temp = $(cls).attr("name");//以name作为css，再次删除
                            $("."+temp).detach();
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $.alet("删除失败");
                }
            });
            event.preventDefault();
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
function sub(){
    $("#sub").click(function(event){
        var chose = $("input[name = 'chose']"),tr,temp,buyNum,choseId,more;
        for (var i = 0, l = chose.length; i < l; i ++) {
            temp = chose[i];
            if($(temp).attr("checked")){
                tr = parFind(temp);
                var now = $(tr).find(".buyNum");
                if(i == 0){
                    buyNum = $(tr).find(".buyNum").val();
                    choseId = $(temp).attr("id");
                    more = $.trim($(tr).find("textarea").val());
                }else{
                    buyNum += "&"+$(tr).find(".buyNum").val();
                    choseId += "&"+$(temp).attr("id");
                    more += "&"+$.trim($(tr).find("textarea").val());
                }
            }
        }
        $("#orderId").val(choseId);
        $("#buyNums").val(buyNum);
        $("#more").val(more);
    })
}
