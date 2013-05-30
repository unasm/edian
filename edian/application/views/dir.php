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
	<meta http-equiv = "content-type" content = "text/html;charset = utf-8">
	<title>E点</title>
	<link rel="stylesheet" href="<?php echo base_url('css/dir.css')?>" type="text/css" charset="UTF-8">
</head>
<body>
	<div id="dir" class = "dir">
		<p class = "dire tt"></p>
<!----------------header------------------------>
		<div id="denter" class = "denter">
			<input class = "butCol et" type="button" id = "showsub" name = "showsub" value="登录">
			<a href = "<?php echo site_url('reg/index')?>"><input class = "butCol et" type="submit" name="reg" value="注册"></a>
		</div>
		<form id = "ent" action="<?php echo site_url('reg/dc')?>" method="post" accept-charset="utf-8" style = "display:none">
			<input type="text"  class = "valTog" name="userName" id = "userName" value="用户名">
			<input type="password" class = "valTog"  name="passwd" id = "passwd" value="密码">
			<input  class = "butCol  et" type="submit" name="enter" value="登录"/>
			<p id = "atten" class = "tt"></p>
		</form>
		<form class = "clearfix" id = "seaform" action="" method="get" accept-charset="utf-8">
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
			<?php if ($key==0) 
				echo "<a href = ".site_url("mainpage/index/0")."><li style = 'border-radius:5px 5px 0 0' class='dirmenu' >热点</li></a>";
				else if($key == 12)
					echo "<a href = ".site_url("mainpage/index/12")."><li style = 'border-radius:0 0 5px 5px' class='dirmenu' >其他</li></a>";
				else echo "<a href = ".site_url("mainpage/index/".$key)."><li class='dirmenu' >".$value."</li></a>";
			?>
			<?php endforeach?>
		</ul>
	</div>
</body>
</html>
