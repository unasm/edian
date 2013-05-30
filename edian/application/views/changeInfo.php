<!DOCTYPE html>
<html lang = "en">
<head>
	<title>修改资料</title>
	<meta http-equiv = "content-type" content = "text/html;charset = utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />    
	<link rel="stylesheet" href="<?php echo base_url('css/reg.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 

</head>
<body>
<!--
	<div id="header" class = "leaft" >
	</div>
-->
	<div id="dir" class = "leaft">
		<p class = "dire tt" style = "visibility:hidden"></p>
<!--
		<input id = "search" type = "text" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
		<p class = "dire"></p>
		<ul id = "dirUl">
			<a href = "<?php echo site_url("mainpage/index/0")?>"><li style = "border-radius:5px 5px 0 0" class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/1")?>"><li class="dirmenu" >日记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/2")?>"><li class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/3")?>"><li class="dirmenu" >死亡笔记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/4")?>"><li style = "border-radius:0 0 5px 5px" class="dirmenu" >旅行<span ></span></li></a>
		</ul>
-->
	</div>
	<div id="content"  class = "clearfix">
		<form action="<?php echo site_url("reg/change")?>" method="post" enctype = "multipart/form-data" accept-charset="utf-8">
			<p>用户名：<input type="text" name="userName" value = "<?php echo $user_name?>"/><span id = "name"></span></p>
			<p>联系方式：<input type="text" name="contra" value = "<?php echo $contract1?>"/><span id = "contra"></span></p>
			<p>联系方式2(可选)：<input type="text" name="contra2" value = "<?php echo $contract2?>"/></p>
			<p>地址(可选)：<input type="text" name="add" value = "<?php echo $addr?>" /><span id = "add"></span></p>
			<p>头像(可选)：<input type="file" name="userfile" /><span id = "photo">本次未上传则采用之前的头像</span></p>
			<p>邮箱(可选)：<input type="text" name="email" value = "<?php echo $email?>"/><span id = "email"></span></p>
			<p>吹牛有益于身体^.^(可选):</p> 
			<p><textarea name="intro" rows="8" cols="40"><?php echo $intro?></textarea></p>
			<p class = "center"><input type="submit" name="sub" value="提交"/></p>
		</form>
	</div>
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/change.js')?>"></script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
</script>

</body>
</html>
