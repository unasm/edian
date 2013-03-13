<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">

		<title>这里现在是用来的是移动图片的</title>
	</head>
<body>
			<form action="<?php echo site_url('chome/ans_upload')?>" method="post"  enctype="multipart/form-data">
					<input type="file" name="userfile" size="4" onchange="getsize(this)">
					<input type="submit" name="sub" value="上传">
					<span id="showsize">图片请小于2M</span>
				</form>
</body>
</html>
