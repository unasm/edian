<!DOCTYPE html>
<html lang = "en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />    
	<title><?php echo $name?>的空间</title>
	<base href="<?php echo base_url()?>" >
<?php
	$siteUrl = site_url();
	$baseUrl = base_url();
?>
	<link rel="stylesheet" href="<?php echo $baseUrl.('css/userSpace.css')?>" type="text/css" media="screen" charset="utf-8">
	<link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>"> 
</head>
<body>
	<!------------------header开始---------------------->
	<div id="header" class = "header" >
			<ul class = "clearfix">
				<a href = "<?php echo site_url('mainpage/index')?>"><li class = "st">首页</li></a>
				<a href = "<?php echo site_url('space/index/'.$masterId)?>">
					<li class = "st index">空<span class="direc">间</span></li>
				</a>
				<a href ="<?php echo site_url('spacePhoto/index/'.$masterId)?>">
					<li class = "st">相册</li>
				</a>
				<a href = "<?php echo site_url("info/index/".$masterId)?>"><li class = "st">我的<span class="direc">名</span>片</li></a>
				<li>
					<img class = "himg liImg block"src = "<?php echo $baseUrl.('upload/'.$photo)?>"/>	
				</li>
			</ul>	
	</div>
	<!---------------------结束------------------------>
<!-- 这里是最近动态，包括邮箱，图片，还有帖子,如果有动态，则显示，否则不显示，邮箱在前，帖子其次，其他看情况-->
<div id="recent">
	<p class="partT"><span>我的<span class="direc">动态</span ></span></p>
		<ul class = "clearfix content">
		<?php foreach($cont as $temp):?>
			<li class = "block">
				<a href = "<?php echo site_url("showart/index/".$temp["art_id"])?>"><img class = "block liImg" src = "<?php echo $baseUrl.('upload/'.$temp['img'])?>" alt = "<?php echo "商品图"?>" title = "<?php echo $temp["title"]?>"/></a>	
				<a class = "detail" href = "<?php echo site_url('showart/index/'.$temp['art_id'])?>">
					<?php 
						if($temp["new"]&&($masterId == $userId))
						echo "<strong>".$temp["title"]."</strong>";
						else echo $temp["title"];
					?>
				</a>
					<p class = "user st clearfix">
					<?php  
						if($temp["name"]!=null){
							echo "<span class = 'price'>￥:".$temp["price"]."</span><a href = ".site_url("space/index/".$temp["commerId"]).">最新回复:".$temp["name"]."</a>";
						}else echo "<span class = 'price'>￥:".$temp["price"]."</span>";
					?></p>
				<p class = "user st">评价:<?php echo $temp["comment_num"]?>/浏览:<?php echo $temp["visitor_num"]?><span class = "time"><?php echo $temp["time"]?></span></p>
			</li>
		<?php endforeach?>
		</ul>
</div>
<script type="text/javascript" src="<?php echo $baseUrl.('js/jquery.js')?>"> </script>
	<script type="text/javascript" src="<?php echo $baseUrl.("js/space.js")?>"></script>
<script type="text/javascript" >
	var user_id = "<?php echo $this->session->userdata('user_id')?>";
	var site_url = "<?php echo site_url()?>";
	var base_url = "<?php echo base_url()?>";
</script>
<!--the end of the recent-->
<!-----------join在这里由js生成-------------->
<!--这里显示的是空间主人的朋友的动态，按照value排序吧,没有顺序，随意排-->
</body>
</html>
