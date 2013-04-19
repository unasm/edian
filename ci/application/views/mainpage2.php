 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>E点</title>
	<link rel="stylesheet" href="<?php echo base_url('css/mainpage2.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/mainpage2.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var now_type ;
window.onload = init;
function  init(){
	if((user_id !="")&&("<?php echo strlen($this->session->userdata("passwd"))?>" != "0")){
		cre_zhuxiao();//既然已经存在了，就没有必要再次登陆了吧
	}
	else {
		var id = $.cookie("user_id");
		var password = $.cookie("passwd");
		if((id !="")&&(password != "")&&(id != null)&&(password != null)){
			$.ajax({
				//第一次通信，检查用户名和密码是否相同
				url:site_url+"/reg/dc/"+id+"/"+password,
				success:function  (data) {
					if(data !="0"){
						ALogin(name,id,password);
					}
				},
			});
		}
	}
};
</script>

</head>
<body>
	<div id="dir" class = "leaft">
			<input class = "et" type="button" name = "showsub" value="登陆">
			<a href = "<?php echo site_url('reg/index')?>"><input class = "et" type="submit" name="reg" value="注册"></a>
		<div id="ent">
		<form action="<?php echo site_url('reg/denglu')?>" method="post" accept-charset="utf-8">
			<input type="text"  class = "valTog" name="userName" value="用户名">
			<input type="text" class = "valTog"  name="passwd" value="密码">
			<input  class = "et" type="submit" name="enter" value="登陆"/>
		</form>
		</div>
		<p id = "atten" class = "tt"></p>
		<p class = "dire tt"></p>
		<form id = "seaform" action="" method="get" accept-charset="utf-8">
			<div id="searchField">
				<input type="text" name="sea" id="sea" style = "border-radius:15px 0 0 15px;width:165px"/>
				<label for = "sea"><span id = "seaatten">搜索<span class = "seatip">(请输入关键字)</span></span><label>
				<!--short for search-->
			</div>
			<input type="submit" name="sub" id = "seabut" value = ""/>
		</form>
		<p class = "dire"></p>
		<ul id = "dirUl">
			<a href = "<?php echo site_url("mainpage/index/0")?>"><li style = "border-radius:5px 5px 0 0" class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/1")?>"><li class="dirmenu" >日记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/2")?>"><li class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/3")?>"><li class="dirmenu" >死亡笔记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/4")?>"><li style = "border-radius:0 0 5px 5px" class="dirmenu" >旅行<span ></span></li></a>
		</ul>
	</div>
	<div id="content" >
		<ul id="ulCont" class="clearfix">
<!--
		<div class = "page">
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦"><a href = "www.baidu.com">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user infoLi tt">最新:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user infoLi tt">评论:3/浏览:6<span class = "time">2012-3-23</span></p>
				</li>
			<li class = "block">
				<img  class = "imgLi block"  title = "楼主:李天一">
				<p class = "detail infoLi" title = "here is a test"><a href = 'http://www.baidu.com'>我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user infoLi tt">最新:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user infoLi tt">评论:3/浏览:6<span class = "time">2012-3-23</span></p>
			</li>
		</div>
-->
		</ul>
	</div>
	<div id="bottomDir">
		<ul>
			<li class="botDirli">1</li>
			<li class ="botDirli">2</li>
			<li class="botDirli">3</li>
			<li class="botDirli">4</li>
			<li class="botDirli">5</li>
		</ul>
	</div>
</body>
</html>
