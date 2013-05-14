<!--
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "utf-8">
	<title>E点</title>
	<base href="<?php echo base_url()?>"/>
	<link rel="stylesheet" href="<?php echo base_url('css/mainpage2.css')?>" type="text/css" charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url('css/seali.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="logo.png" type="text/css"> 
<meta http-equiv = "content-type" content = "text/html;charset =UTF-8">
</head>
<body>
<?php
$siteUrl = site_url();
$baseUrl = base_url();
?>
	<div id="dir" class = "leaft">
		<p class = "dire tt"></p>
<!----------------header------------------------>
		<div id="denter" class = "denter">
			<input class = "et" type="button" name = "showsub" value="登陆">
			<a href = "<?php echo site_url('reg/index')?>"><input class = "et" type="submit" name="reg" value="注册"></a>
		</div>
		<div id="ent">
			<form action="<?php echo site_url('reg/denglu')?>" method="post" accept-charset="utf-8">
				<input type="text"  class = "valTog" name="userName" id = "userName" value="用户名">
				<input type="password" class = "valTog"  name="passwd" id = "passwd" value="密码">
				<input  class = "et" type="submit" name="enter" value="登陆"/>
			</form>
		</div>
		<p id = "atten" class = "tt"></p>
		<form id = "seaform" action="" method="get" accept-charset="utf-8">
			<div id="searchField">
				<input type="text" name="sea" id="sea"/>
				<input type="submit" name="sub" id = "seabut" value = ""/>
				<label for = "sea"><span id = "seaatten">搜索<span class = "seatip">(请输入关键字)</span></span><label>
				<!--short for search-->
			</div>
		</form>
<!-------------/header------------------------>
		<ul id = "dirUl">
			<?php foreach($dir as $key => $value):?>
			<?php 
			if ($key==0) 
				echo "<a href = ".site_url("mainpage/index/0")."><li style = 'border-radius:5px 5px 0 0' class='dirmenu' >热点<span ></span></li></a>";
			else if($key == 12)
				echo "<a href = ".site_url("mainpage/index/12")."><li style = 'border-radius:0 0 5px 5px' class='dirmenu' >其他<span ></span></li></a>";
			else echo "<a href = ".site_url("mainpage/index/".$key)."><li class='dirmenu' >".$value."<span ></span></li></a>";
			?>
			<?php endforeach?>
		</ul>

	</div>
	<iframe src = "<?php echo $siteUrl.'/mainpage/mainCon'?>" scrolling = "No" frameborder = "no" id="content" name = "content" >
		<a name = "0">
		<ul id="ulCont" class="clearfix">
					<?php foreach($cont as $val):?>
					<li class = "mainli">
						<a class = "aImg" href = "<?php echo $siteUrl."/showart/index/".$val["art_id"]?>">
							<img class = "imgLi block" src = "<?php echo $baseUrl."thumb/".$val["img"]?>" alt = "商品缩略图"/>
						</a>
						<a href = "<?php echo $siteUrl."/showart/index/".$val["art_id"]?>">
							<p class = "detail"><?php echo $val["title"]?></p>
						</a>
						<p class = "user">
							<span class = "price"><?php echo "￥:".$val["price"]?></span>
							<a target = '_blank' href = "<?php echo $siteUrl."/space/index/".$val["author_id"]?>">
								<span class = "master tt"><?php echo $val["user"]["user_name"]?></span>
							</a>
						</p>
						<p class = "user tt">浏览:<?php echo $val["visitor_num"]?>/评论:<?php echo $val["comment_num"]?><span class = "time"><?php echo $val["time"]?></span>
						</p>
						<div class = "block userCon" style = "display:none">
							<p class = "utran"><p>
							<p class = "clearfix">
								<a target = '_blank' href = "<?php  echo $siteUrl.'/space/index/'.$val['author_id']?>">
									<img class = "imgLi block" src = "<?php echo $baseUrl."upload/".$val["user"]["user_photo"]?>">
								</a>
								<a class = "fuName tt" target = '_blank' href = "<?php echo $siteUrl."/space/index/".$val["author_id"]?>"><?php echo $val["user"]["user_name"]?></a>
								<a target = '_blank' href = "<?php echo $siteUrl."/message/write/".$val["author_id"]?>">站内信联系</a>
							</p>
							<p><span>联系方式:</span><?php echo $val["user"]["contract1"]?></p>
								<?php
									if((array_key_exists("addr",$val["user"]))&&(strlen($val["user"]["addr"]))){
										echo "<p><span>地址:</span>".$val["user"]["addr"]."</p>";
									}
								?>
						</div>
					</li>
				<?php endforeach?>
		</ul>
<!-----------谁能看出来content才是主要内容显示的-------------->
	</div>
<!------------罪恶的跳跃栏-------->
	<div id="bottomDir">
		<ul >
			<a href = "#0"><li class = "block botDirli">1</li></a>
		</ul>
	</div>
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/mainpage2.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo trim($this->session->userdata('user_name'))?>";
var	user_id="<?php echo trim($this->session->userdata('user_id'))?>";
var userPhoto = "<?php echo isset($user_photo)?$user_photo:null?>";
var mail = "<?php echo isset($mailNum)?$mailNum:null?>";
var com = "<?php echo isset($comNum)?$comNum:null?>";
var now_type ;
</script>
</body>
</html>
