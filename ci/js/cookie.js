/*
 * 2013/04/07 06:33:41 PM 添加了alet，函数，作用是弹出提示信息
大概的使用方法如下,已经作为库函数调用
example $.cookie('the_cookie', 'the_value');
设置cookie的值
example $.cookie('the_cookie', 'the_value', {expires: 7, path: '/', domain: 'jquery.com', secure: true});
新建一个cookie 包括有效期 路径 域名等
example $.cookie('the_cookie', 'the_value');
新建cookie
example $.cookie('the_cookie', null);
删除一个cookie
我想应该放到最后载入的库文件，或者是和jquery放到一起
*/

jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
		//貌似添加了这些之后，就没有办法保存cookie了,但是cookie的保存时间怎么办呢
        options = options || {};//什么意思
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
jQuery.alet = function (cont) {//给出各种提示的函数，和alert不同，这个过1s就消失
	var alet = document.createElement("div");
	var css = {
		position:'absolute',
		padding:'9px',
		background:"#729ECA",
		top:"40%",
		"border-radius":"5px",
		left:'45%'
	};
	$(alet).html("<p>"+cont+"</p>");
	$(alet).css(css);
	$("body").append(alet);
	setTimeout(function  () {
		$(alet).detach();
	},999);
}
jQuery.tse = function (){	
	var val;//控制页面点击消失提示字的函数
	$("input[type = 'text']").focus(function(){
		val = $(this).val();
		$(this).removeAttr("value");
	});
	$("input[type = 'text']").blur(function(){
		if($(this).val()==""){
			$(this).attr("value",val);
		}
	});
}
