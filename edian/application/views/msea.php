<?php
/*************************************************************************
    > File Name :     views/msea.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-06-24 15:31:48
 ************************************************************************/
//这个是地图搜索的部分，算是第三个页面了
$baseUrl = base_url();
$siteUrl = site_url();
?>
<html lang = "en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"0>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />    
	<link rel="stylesheet" href="<?php echo $baseUrl.('css/msea.css')?>" type="text/css" media="screen" charset="utf-8"/>
	<link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>"> 
	<title>地图</title>
<script type="text/javascript" >
	var base_url = "<?php echo $baseUrl;?>";
	var site_url = "<?php echo $siteUrl;?>";
</script>
	<script type="text/javascript" src = "<?php echo $baseUrl.('js/jquery.js')?>"></script>
</head>
<body>
	<div id="seabox" class = "seabox">
		<div id="sf">
			<input type="text" name="sea" />
		</div>
		<input type="button" name="sub" class = "sub" value="搜索"/>
	</div>
	<div id="allmap" class = "clearfix"></div>
	<div id="info" class = "info clearfix">
	</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d"></script>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/msea.js')?>"></script>
</body>
</html>
