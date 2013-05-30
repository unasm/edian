<!DOCTYPE html>
<html lang = "en">
<head>
<?php
	$siteUrl = site_url();
	$baseUrl = base_url();
?>
	<title><?php echo $cont["title"]?></title>
	<link rel="stylesheet" href="<?php echo $baseUrl.('css/art2.css')?>" type="text/css" charset="UTF-8">
	<link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>"> 
</head>
<body  class = "clearfix">
	<div id="dir" >
<!--
		<p class = "dire tt"></p>
		<input type = 'text' id = "search" class = "valTog ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
-->
		<p class = "dire"></p>
		<ul id = "dirUl">
			<a href = "<?php echo site_url("message/index")?>">
				<?php if($get == "index") echo "<li style = 'border-radius:5px 5px 0px 0px' class = 'liC'>收件箱<span class = 'tran'></span></li>";else echo "<li style = 'border-radius:5px 5px 0px 0px' class='dirmenu'>收件箱<span ></span></li>"?>
			</a>
			<a href = "<?php echo site_url('message/sendbox')?>">
				<?php if($get == "sendbox") echo "<li style = 'border-radius:0 0 5px 5px' class = 'liC'>发件箱<span class = 'tran'></span></li>";else echo "<li class='dirmenu'>发件箱<span ></span>"?>
				</li>
			</a>
		</ul>

	</div>
	<div id="content" >
	<p id = "title"><?php echo $cont["title"] ?></p>
	<p id = "info"><?php echo $cont["time"]?></p>
		<ul id="ulCont" class="clearfix">
			<li>
				<a href = "<?php echo site_url('space/index/'.$cont["senderId"])?>" target = "_blank">
					<img title = "<?php echo $sender["user_name"]?>"  class = "thumb" src = "<?php echo base_url("upload/".$sender["user_photo"])?>"/>
				</a>
				<p class = "info" style = "margin:0"><?php echo $cont["body"]?></p>
			</li>
			<?php foreach($reply as $key):?>
			<li>
				<?php 
					if($key["senderId"] == $cont["senderId"])
						echo "<a href = ".site_url("space/index/".$cont['senderId'])." target = '_blank'><img title = 'name' class = 'thumb' src =".base_url("upload/".$sender["user_photo"])." /></a>";
					else  
						echo "<a href = ".site_url("space/index/".$cont['geterId'])." target = '_blank'><img title = 'name' class = 'thumb' src =".base_url("upload/".$geter["user_photo"])." /></a>";
				?>
				<p><?php echo $key["body"]?></p>
				<span class = "time"><?php echo $key["time"]?></span>
			</li>
			<?php endforeach?>
		</ul>
		<div id="judge" class = "clearfix sli">
			<form id = "comform" action="<?php echo site_url('message/quickAdd/'.$messId)?>" method="post"  accept-charset="utf-8">
				<textarea id = "comcon" name="com" ></textarea>
				<label for = "comcon"><span class = "pholder">吐槽吗.....</span></label>
			<div id="face" class = "clearfix">
				<div class = "but">
					<input  id ="subcom" type="submit" value="提交"/>
					<input  id ="giveup" type="button" value="下次"/>				
				</div>
<!---------------所有的图片都必须是\d+.gif的格式------------------------------------------>
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
			</div>
			</form>
		</div>
	</div>	
<script type="text/javascript" src = "<?php echo $baseUrl.('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/messout.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var now_type = "<?php echo $messId?>";
var sPhoto = "<?php echo $sender['user_photo']?>";
</script>
</body>
</html>
