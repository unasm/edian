 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>注册</title>
	<link rel="stylesheet" href="<?php echo base_url('css/reg.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/reg.js')?>"></script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
</script>
</head>
<body>
	<div id="dir" class = "leaft">
		<p class = "dire"></p>
		<ul id = "dirUl">
			<?php foreach($dir as $index => $name):?>
				<a href = "<?php echo site_url("mainpage/index/".$index)?>"><li class="dirmenu" ><?php echo $name?></li></a>
			<?php endforeach?>
		</ul>
	</div>
	<div id="content"  class = "clearfix">
		<form action="<?php echo site_url("reg/regSub")?>" method="post" enctype = "multipart/form-data" accept-charset="utf-8">
			<p>用户名：<input type="text" name="userName" value = "tianyi"/><span id = "name"></span></p>
			<p>密码：<input type="password" name="passwd" /><span id = "pass"></span></p>
			<p>确认密码：<input type="password" name="repasswd" /></p>
			<p>联系方式(手机,电话)：<input type="text" name="contra" /><span id = "contra"></span></p>
			<p>其他联系方式(可选)：<input type="text" name="contra2" /></p>
			<p>图片验证码：<input type = "text" id = "incheck" name = "checkcode"/><img id = "check" src="<?php echo site_url('checkcode/index')?>"><span id = "spanCheck"></span></p>
			<p>地址(可选)：<input type="text" name="add" /><span id = "add"></span></p>
			<p>头像(可选)：<input type="file" name="userfile" /><span id = "photo">小于5M的jpg,gif,png格式图片</span></p>
			<p>邮箱(可选)：<input type="text" name="email" /><span id = "email"></span></p>
			<p>自我介绍吗^.^(可选):</p> 
			<p><textarea name="intro" rows="8" cols="40"></textarea></p>
			<p class = "center"><input type="submit" name="sub" value="提交"/></p>
		</form>
	</div>
</body>
</html>
