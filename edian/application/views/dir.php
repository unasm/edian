<?php
/*************************************************************************
    > File Name :     views/dir.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-05-20 15:54:31
 ************************************************************************/
?>
<!DOCTYPE html>
<html lang = "en">
<head>
<?php 
	$siteUrl = site_url();
?>
	<meta http-equiv = "content-type" content = "text/html;charset = utf-8">
	<title>E点</title>
	<link rel="stylesheet" href="<?php echo base_url('css/dir.css')?>" type="text/css" charset="UTF-8">
</head>
<body>
	<div id="dir" class = "dir">
<!----------------header------------------------>
		<div id="denter" class = "denter">
<!--
			<input class = "butCol et" type="button" id = "showsub" name = "showsub" value="登录">
-->
			<a id = "showsub" href = "<?php echo $siteUrl.'/reg/login' ?>"><span  id = "lotip" class = "butCol et reg">登录</span></a>
<!--
			<a href = "<?php echo site_url('reg/index')?>"><input class = "butCol et" type="submit" name="reg" value="注册"></a>
-->
			<a  href = "<?php echo $siteUrl.'/reg/index' ?>"><span class = "butCol et reg">注册</span></a>
		</div>
		<form id = "ent" action="<?php echo $siteUrl.('/reg/dc')?>" method="post" accept-charset="utf-8" style = "display:none">
			<input type="text"  class = "valTog" name="userName" id = "userName" value="用户名">
			<input type="password" class = "valTog"  name="passwd" id = "passwd" value="密码">
			<input  class = "butCol  et" type="submit" name="enter" value="登录"/>
			<p id = "atten" class = "tt"></p>
		</form>
		<form class = "clearfix" id = "seaform" action="<?php echo $siteUrl.('/search/res')?>" method="get" accept-charset="utf-8">
			<div id="sf"><!--searchField-->
				<input type="text" name="sea" id="sea"/>
				<!--short for search-->
			</div>
			<input type="submit" name="sub" id = "seabut" value = ""/>
			<label for = "sea"><span id = "seaatten">搜索<span class = "seatip">(请输入关键字)</span></span></label>
		</form>
<!-------------/header------------------------>
		<ul id = "dirUl" >
			<?php foreach($dir as $key => $value):?>
				<a class = "dirmenu" href = "<?php echo $siteUrl.('/mainpage/index/'.$key)?>"><li ><?php echo $value?></li></a>
			<?php endforeach?>
		</ul>
	</div>
</body>
</html>
