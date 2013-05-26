<!DOCTYPE html>
<html lang = "en">
<head>
	<meta http-equiv = "content-type" content = "text/html;charset = utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />    
  
	<title>E点</title>
	<link rel="stylesheet" href="<?php echo base_url('css/mainpage2.css')?>" type="text/css" charset="UTF-8">
	<link rel="icon" href="favicon.ico"> 
	<meta http-equiv = "content-type" content = "text/html;charset =UTF-8">
</head>
<body>
<?php 
//这里显示的敌人的内容，独立成为一个新的文件了
		echo $this->load->view("dir");
?>
		<a name = "0"></a>
		<ul id="ulCont" class = "clearfix content" >
			<div id = "cont">
			<div class = "page clearfix">
<?php
	$siteUrl = site_url();
	$baseUrl = base_url();
?>
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
								<a class = "mess" target = '_blank' href = "<?php echo $siteUrl."/message/write/".$val["author_id"]?>">站内信联系</a>
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
			<p class = "pageDir np" id = "end">
				<button  id = "np" class = "butCol et" >下一页</button>
			</p>
		</ul>
<!-----------谁能看出来content才是主要内容显示的-------------->
<!------------罪恶的跳跃栏-------->
	<div id="bottomDir" class = "clearfix">
		<ul >
			<button id = "hiA" class = "et hiA">隐藏</button>
			<a href = "#0"><li class = "block botDirli">1</li></a>
		</ul>
	</div>
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/mainpage2.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/common.js')?>"> </script>
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

