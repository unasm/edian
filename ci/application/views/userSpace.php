<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<title><?php echo $name?>的空间</title>
	<link rel="stylesheet" href="<?php echo base_url('css/userSpace.css')?>" type="text/css" media="screen" charset="utf-8">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.js')?>"> </script>
	<script type="text/javascript" src="<?php echo base_url("js/space.js")?>"></script>
</head>
<body>
<?php echo $this->load->view("m-spaceHeader")?>
<!-- 这里是最近动态，包括邮箱，图片，还有帖子,如果有动态，则显示，否则不显示，邮箱在前，帖子其次，其他看情况-->
<div id="recent">
	<div class="partTitle">	
		<p class="content">我的<span class="direc">动态</span ></p>
	</div>
	<div class="content">
		<ul id = "recom" class = "clearfix">
<!--
			<li class="block">
				<img class="block liImg" src="http://www.kukud.net/meinv/UploadFiles_3657/200907/20090723091813561.jpg"/>
				<a><strong><p class = 'detail'>关于我的最新的动态,不过，或许你没有兴趣知道，不是吗asdfkja=lksdfjlka kadjflk aslkdf akldsjflkds  aslkdfjlkasd s dflk sdfjlks  sdfkj  alksdjflaksjd kjskdlf sd k=sdf </p></strong></a>
				<p class = "user st"><a>最新评价:<span class="author st">田乙的世界田乙的世界</span></a><span class="time">电子商务</span></p>
				<p class = "user st">评价:3/浏览:6<span class="time">2012-02-30</span></p>
			</li>
-->
		<?php foreach($cont as $temp):?>
			<li class = "block">
				<a href = "<?php echo site_url("space/index/".$temp["commer"])?>"><img class = "block liImg" src = "<?php echo base_url('upload/'.$temp['userPhoto'])?>" alt = "<?php echo $temp["name"]?>" title = "<?php echo $temp["name"]?>"/></a>	
				<a href = "<?php echo site_url('showart/index/'.$temp['art_id'])?>"><p class = "detail">
					<?php 
						if($temp["new"])
						echo "<strong>".$temp["title"]."</strong>";
						else echo $temp["title"];
					?>
					</p></a>
				<p class = "user st">最新回复:<?php  echo $temp["name"]; ?></p>
				<p class = "user st">评价:<?php echo $temp["comment_num"]?>/浏览:<?php echo $temp["visitor_num"]?><span class = "time"><?php echo $temp["time"]?></span></p>
			</li>
		<?php endforeach?>
		</ul>
	</div>
</div>
<!--the end of the recent-->
<!--这里显示的是空间主人的朋友的动态，按照value排序吧,没有顺序，随意排-->
</body>
</html>
