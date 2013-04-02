 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>测试页面</title>
	<link rel="stylesheet" href="<?php echo base_url('css/art2.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/mainpage2.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var	PASSWD = "<?php echo $this->session->userdata("passwd")?>";
var now_type = 0;
var partId = new Array(1,1,1,1,1);//这个用作板块吧
</script>

</head>
<body  class = "clearfix">
	<div id="dir" >
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
		<p class = "dire"></p>
		<ul id = "dirUl">
			<li style = "border-radius:5px 5px 0px 0px" class="dirmenu" name="0" ><a>最新热门</a><span ></span></li>
			<li class="dirmenu" name="1" ><a>推荐</a><span ></span></li>
			<li class="liC" name="2" ><a>死亡笔记</a>
				<span class = "tran"></span>
			</li>
			<li class="dirmenu" >
				<a>百科</a>
				<span ></span>
			</li>
			<li class="dirmenu" name="4" ><a>日记</a><span ></span></li>
			<li class="dirmenu" name="5" ><a>出游</a><span ></span></li>
		</ul>

	</div>
	<div id="content" >
	<p id = "direc"></p>
	<p id = "title"><?php echo $title ?></p>
		<ul id="ulCont" class="clearfix">
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/".$user_photo)?>"/>
				<p class = "info"><?php echo $content?></p>
				<span class = "time">浏览:<?php echo $visitor_num?>/评论:<?php echo $comment_num."  "?><?php echo $time?></span>
			</li>
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>	
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>	
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>
		</ul>
	</div>	
	<div id="judge" class = "clearfix sli">
			<textarea id = "comcon" name="com" class = "sli"></textarea>
			<span class = "pholder">评论.....</span>
			<input id ="subcom" type="button" name="sub" value="提交">
			<input id ="giveup" type="button" name="sub" value="下次">
			<div id="face" class = "clearfix">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img  class = "thumb" src = "http://bbs.stuhome.net/images/post/smile/yang/11.gif">
			</div>
	</div>

</body>
</html>
