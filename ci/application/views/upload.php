<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"0>
		<link rel="stylesheet" href="<?php echo base_url("css/upload.css")?>" type="text/css" media="screen" charset="utf-8"/>
	<title>上传</title>
	<script type="text/javascript"src = "<?php echo base_url("js/jquery.js")?>" ></script>
	<script type="text/javascript"src = "<?php echo base_url("js/upload.js")?>" ></script>
</head>
<body>
	<?php echo $this->load->view("m-spaceHeader")?>
	<div id="upload">
	<form action="<?php echo site_url('reg/ans_upload')?>" method="post"  enctype="multipart/form-data">
		<p><input type="file" name="userfile" size="4" onchange="getsize(this)"></p>
		简要:<textarea name="intro"></textarea>
		<p><input type="submit" name="sub" value="上传图片"><span id="showsize">请小于2M</span></p>
	</form>
	</div>
</body>
</html>
