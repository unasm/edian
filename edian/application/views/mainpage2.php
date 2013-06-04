<!DOCTYPE html>
<html lang = "en">
<head>
<?php
	$siteUrl = site_url();
	$baseUrl = base_url();
?>
	<meta http-equiv = "content-type" content = "text/html;charset = utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />    
	<title>E点</title>
	<link rel="stylesheet" href="<?php echo $baseUrl.('css/mainpage2.css')?>" type="text/css" charset="UTF-8">
	<link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>"> 
	<meta http-equiv = "content-type" content = "text/html;charset =UTF-8">
</head>
<body>
<?php 
//这里显示的敌人的内容，独立成为一个新的文件了
		echo $this->load->view("dir");
?>
<!--[if lte IE 6]> 
 
<div id="ie7-warning">
您正在使用 Internet Explorer 7 或更低版本的IE浏览器，他们已经是10年前的浏览器了，为了您更好的浏览，体验更新更炫的效果，建议您将使用 <a href="http://windows.microsoft.com/zh-cn/internet-explorer/help/ie-9/9-reasons-to-get-internet-explorer-9" target="_blank">IE9</a> 或下列浏览器：<a href="https://www.google.com/intl/zh-CN/chrome/browser">Chrome(谷歌浏览器)</a>/<a href="http://www.firefox.com.cn/download/">Firefox(火狐)</a>/ <a href="http://www.apple.com.cn/safari/">Safari(苹果)</a> / <a href="http://www.Opera.com/">Opera(欧朋)</a>
</div> 	
 <![endif]-->
		<a name = "0"></a>
		<ul id="ulCont" class = "clearfix content" >
			<div id = "cont" class = "clearfix">
			<div class = "page">

				<?php foreach($cont as $val):?>
					<li class = "block">
						<a class = "aImg" href = "<?php echo $siteUrl."/showart/index/".$val["art_id"]?>">
							<img class = "imgLi block" src = "<?php echo $baseUrl."thumb/".$val["img"]?>" alt = "商品缩略图"/>
						</a>
						<a class = "detail" href = "<?php echo $siteUrl."/showart/index/".$val["art_id"]?>">
							<?php echo $val["title"]?>
						</a>
						<p class = "user tt">
							<span class = "time"><?php echo "￥:".$val["price"]?></span>
							<a target = "_blank" href = "<?php echo $siteUrl."/space/index/".$val["author_id"]?>">
								<span class = "master tt">店主:<?php echo $val["user"]["user_name"]?></span>
							</a>
						</p>
						<p class = "user tt"><span class = "time"><?php echo $val["time"]?></span><span class = "lifo">浏览:<?php echo $val["visitor_num"]?>/评论:<?php echo $val["comment_num"]?></span></p>
						<div class = "clearfix userCon" style = "display:none">
							<a target = '_blank' href = "<?php  echo $siteUrl.'/space/index/'.$val['author_id']?>"><img class = "block" src = "<?php echo $baseUrl."upload/".$val["user"]["user_photo"]?>"/></a>
							<p >
								<a class = "fuName tt" target = '_blank' href = "<?php echo $siteUrl."/space/index/".$val["author_id"]?>"><?php echo $val["user"]["user_name"]?></a>
								<a class = "mess" name = "<?php echo $val["user"]["user_name"]?>" target = '_blank' href = "<?php echo $siteUrl."/message/write/".$val["author_id"]?>">站内信联系</a>
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
				<p class = "pageDir">第<a name = "1">1</a>页</p>
			</div>
			</div>	
			<p class = "clearfix pageDir np" id = "end">
				<button  id = "np" class = "butCol et" >下一页</button>
			</p>
		</ul>
<!-----------谁能看出来content才是主要内容显示的-------------->
<!------------罪恶的跳跃栏-------->
	<div id="bottomDir" class = "clearfix">
		<ul >
			<button id = "hiA" class = "block et hiA butCol">隐藏</button>
			<a href = "#0"><li class = "block botDirli">1</li></a>
		</ul>
	</div>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/jquery.js')?>" > </script>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/cookie.js')?>" > </script>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/mainpage2.js')?>" > </script>
<!--
	<script type="text/javascript" src = "<?php echo $baseUrl.('js/common.js')?>" > </script>
-->
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

