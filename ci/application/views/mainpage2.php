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
var	user_name="<?php echo trim($this->session->userdata('user_name'))?>";
var	user_id="<?php echo trim($this->session->userdata('user_id'))?>";
var userPhoto = "<?php echo isset($user_photo)?$user_photo:null?>";
var now_type ;
</script>
</head>
<body>
	<div id="dir" class = "leaft">
		<p class = "dire tt"></p>
		<div id="denter" class = "denter">
			<input class = "et" type="button" name = "showsub" value="登陆">
			<a href = "<?php echo site_url('reg/index')?>"><input class = "et" type="submit" name="reg" value="注册"></a>
		</div>
		<div id="ent">
			<form action="<?php echo site_url('reg/denglu')?>" method="post" accept-charset="utf-8">
				<input type="text"  class = "valTog" name="userName" id = "userName" value="用户名">
				<input type="password" class = "valTog"  name="passwd" id = "passwd" value="密码">
				<input  class = "et" type="submit" name="enter" value="登陆"/>
			</form>
		</div>
		<p id = "atten" class = "tt"></p>
		<p class = "dire tt"></p>
		<form id = "seaform" action="" method="get" accept-charset="utf-8">
			<div id="searchField">
				<input type="text" name="sea" id="sea"/>
				<input type="submit" name="sub" id = "seabut" value = ""/>
				<label for = "sea"><span id = "seaatten">搜索<span class = "seatip">(请输入关键字)</span></span><label>
				<!--short for search-->
			</div>
		</form>
		<p class = "dire tt"></p>
		<ul id = "dirUl">
			<a href = "<?php echo site_url("mainpage/index/0")?>"><li style = "border-radius:5px 5px 0 0" class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/1")?>"><li class="dirmenu" >日记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/2")?>"><li class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/3")?>"><li class="dirmenu" >死亡笔记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/4")?>"><li style = "border-radius:0 0 5px 5px" class="dirmenu" >旅行<span ></span></li></a>
		</ul>
	</div>
	<div id="content" >
		<a name = "0">
		<ul id="ulCont" class="clearfix">
			<li>
				<a href = "http://www.edian.cn/thumb/1366428454.jpg" targte = "_blank">
					<img class = "block imgLi" src = "http://www.edian.cn/thumb/1366428454.jpg" title = "unasm">
				</a>
				<a><p class = "detail">我们明天的技术</p></a>
				<p class = "user"><span class = "master tt">店主:asdf阿斯的发送的发送的发送的发送的发送的发送的发第三</span><span class = "price"><strong>￥:20</strong></span></p>
				<p class = "user">评论:2/浏览100<span class = "time">2012-12-2</span></p>
				<!------这里给出用户的联系方式哦user contract---------------------->
				<div class = "block userCon">
					<p class = "utran"></p>
					<p><a href = "www.baidu.com">德川家康</a><p>			
					<p>联系方式:13789099899</p>
					<p><a href = "write/userId">站内信</a></p>
					<p>地址:西园大道2003号<p>
				</div>
			</li>
		</ul>
	</div>
<!------------罪恶的跳跃栏-------->
	<div id="bottomDir">
		<ul >
		</ul>
	</div>
</body>
</html>
