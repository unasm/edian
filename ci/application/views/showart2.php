 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>测试页面</title>
	<link rel="stylesheet" href="<?php echo base_url('css/art2.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/art.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var	PASSWD = "<?php echo $this->session->userdata("passwd")?>";
var now_type = 0;
var partId = new Array(1,1,1,1,1);//这个用作板块吧
</script>
</head>
<body  class = "clearfix">
	<div id="dir" >
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
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
	<p id = "title"><?php echo $title ?></p>
	<p id = "info">评价:3/浏览<span>2012:2:3 3:3:23</span></p>
		<ul id="ulCont" class="clearfix">
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/".$user_photo)?>"/>
				<p class = "info"><?php echo $content?></p>
			</li>
			<li>
				<a><img  class = "thumb" src = "<?php echo base_url("upload/".$user_photo)?>"/></a>
				<p><?php echo $content?></p>
				<span class = 'time'>楼主2013-04-06 19:40:19</span>
			</li>
		</ul>
	</div>	
	<div id="judge" class = "clearfix sli">
		<form action="<?php echo site_url('showart/addCom/'.$artId)?>" method="post"  accept-charset="utf-8">
			<textarea id = "comcon" name="com" class = "sli"></textarea>
			<span class = "pholder"><span class = "color">评论<span>.....</span>
			<input id ="subcom" type="submit" name="sub" value="提交">
			<input id ="giveup" type="button" name="sub" value="下次">
		</form>
			<div id="face" class = "clearfix">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
			</div>
	</div>

</body>
</html>
