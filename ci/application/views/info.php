<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<title><?php echo $name?></title>
	<link rel="stylesheet" href="<?php echo base_url('css/info.css')?>" type="text/css" media="screen" charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.js')?>"> </script>
</head>
<body>
<?php echo $this->load->view("m-spaceHeader")?>
	<div id="cont" class = "content clearfix">
		<p>我的名字:<span><?php echo $res["user_name"]?></span></p>
		<p>地址:<span><?php echo $res["addr"]?></span></p>
		<p>联系方式:<span><?php echo $res["contract1"]?></span></p>
		<p>联系方式2:<span><?php echo $res["contract2"]?></span></p>
		<p>邮箱:<span><?php echo $res["email"]?></span></p>
		<p>注册时间:<span><?php echo $res["reg_time"]?></span></p>
		<p>最后登陆:<span><?php echo $res["last_login_time"]?></span></p>
		<textarea name="cont"><?php echo $res["intro"]?></textarea>
	</div>
</body>
</html>
