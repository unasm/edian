<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>邮箱</title>
	<link rel="stylesheet" href="<?php echo base_url('css/message.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var	PASSWD = "<?php echo $this->session->userdata("passwd")?>";
var now_type = 0;
var partId = new Array(1,1,1,1,1);//这个用作板块吧
</script>
</head>
<body>
<!--
	<div id="header" class = "leaft" >
	</div>
-->
	<div id="dir" class = "leaft">
		<p id = "atten" class = "tt"></p>
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<p class = "dire"></p>
		<ul id = "dirUl">
			<li style = "border-radius:5px 5px 0px 0px" class="liC" ><a>收件箱</a><span class = "tran"></span></li>
			<li class="dirmenu" ><a>发件箱</a><span ></span></li>
			<li class="dirmenu" ><a href = "<?php echo site_url('message/index')?>">写信</a><span ></span></li>
			<li class="dirmenu" ><a>最新热门</a>
			<span ></span>
			</li>
			<li class="dirmenu" ><a>推荐</a>
			<span ></span>
			</li>
			<li class="dirmenu" ><a>死亡笔记</a>
				<span ></span>
			</li>
			<li class="dirmenu" >
				<a>新闻</a>
			<span ></span>
			</li>
			<li class="dirmenu" ><a>日记</a><span ></span></li>
			<li class="dirmenu" ><a>出游</a><span ></span></li>
		</ul>
	</div>
	<div id="content" >
		<ul id="ulCont" class="clearfix">
		<div class = "page">
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦"><a href = "<?php echo site_url("showmess/")?>">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user tt">发件人:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user">2012-3-23</p>
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦"><a href = "www.baidu.com">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user tt">发件人:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user">2012-3-23</p>
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦"><a href = "www.baidu.com">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user tt">发件人:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user">2012-3-23</p>
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦"><a href = "www.baidu.com">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user tt">发件人:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user">2012-3-23</p>
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦"><a href = "www.baidu.com">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</a></p>
				<p class = "user tt">发件人:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user">2012-3-23</p>
			</li>
		</div>
		</ul>
	</div>
</body>
</html>
