<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>邮箱</title>
	<link rel="stylesheet" href="<?php echo base_url('css/message.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/message.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var get = "<?php echo $get?>";
</script>
</head>
<body>
<!--
	<div id="header" class = "leaft" >
	</div>
-->
	<div id="dir" class = "leaft">
		<p id = "atten" class = "tt"></p>
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<p class = "dire"></p>
		<ul id = "dirUl">
			<a class = "mail" href = "<?php echo site_url("message")?>"><li style = "border-radius:5px 5px 0px 0px" class="dirmenu" >收件箱<span ></span></li></a>
			<a class = "mail" href = "<?php echo site_url('message/sendbox')?>"><li class="dirmenu" >发件箱<span ></span></li></a>
			<a href = "<?php echo site_url('message/write')?>"><li  class="dirmenu" >写信<span></span></li></a>
			<a><li class="dirmenu" >推荐<span ></span></li></a>
			<a><li class="dirmenu" >日记<span ></span></li></a>
			<a><li class="dirmenu" >热点<span ></span></li></a>
			<a><li class="dirmenu" >死亡笔记<span ></span></li></a>
			<a ><li style = "border-radius:0 0 5px 5px" class="dirmenu" >旅行<span ></span></li></a>
		</ul>
	</div>
	<div id="content" >
	</div>
</body>
</html>
