<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<title><?php echo $name?></title>
	<link rel="stylesheet" href="<?php echo base_url('css/info.css')?>" type="text/css" media="screen" charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.js')?>"> </script>
	<script type="text/javascript" src="<?php echo base_url('js/space.js')?>"> </script>
</head>
<body>
	<!------------------header开始---------------------->
	<div id="header">
		<div class="content">
			<ul class = "clearfix">
			<a href = "<?php echo site_url('mainpage/index')?>">
				<li>首页</li>
			</a>
			<a href = "<?php echo site_url('space/index/'.$masterId)?>">
				<li>空<span class="direc">间</span></li>
			</a>
			<a href ="<?php echo site_url('spacePhoto/index/'.$masterId)?>">
				<li >相册</li>
			</a>
			<a href = "<?php echo site_url("info/index/".$masterId)?>"><li class = "index">我的<span class="direc">名</span>片</li></a>
			<img class = "liImg block"src = "<?php echo base_url('upload/'.$photo)?>"/>	
			</ul>	
		</div>
	</div>
	<!---------------------结束------------------------>
	<div id="cont" class = "content clearfix">
		<p>我的名字:<span><?php echo $res["user_name"]?></span></p>
		<p>地址:<span><?php echo $res["addr"]?></span></p>
		<p>联系方式:<span><?php echo $res["contract1"]?></span></p>
		<p>联系方式2:<span><?php echo $res["contract2"]?></span></p>
		<p>邮箱:<span><?php echo $res["email"]?></span></p>
		<p>注册时间:<span><?php echo $res["reg_time"]?></span></p>
		<p>最后登陆:<span><?php echo $res["last_login_time"]?></span></p>
		<textarea name="cont"><?php echo $res["intro"]?></textarea>
		<?php if($user_id)
			echo "<p  style = 'border:none' id = 'sub'><a href = ".site_url('info/change')."><input type='button' value='修改'/></a></p>";
		?>
	</div>
</body>
</html>
