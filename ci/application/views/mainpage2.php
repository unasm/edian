 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>测试页面</title>
	<link rel="stylesheet" href="<?php echo base_url('css/mainpage2.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/mainpage2.js')?>"> </script>


</head>
<body>
	<div id="header" class = "leaft" >
<!--
		<div id="zhuxiao" class = "headLeft">
			<p><a src = "<?php echo site_url('destory/zhuxiao')?>">注销<a/></p>
		</div>
		<div id="denglu" class = "headLeft">
			<input type="button" class="butDenglu">	
			<input type="button" class="butDenglu">	
			<form  method="post"  accept-charset="utf-8" id="loginform" action="<?php echo site_url('reg/denglu_check')?>" class="block" enctype="multipart/form-data">
				<input type="text" name="user_name" class="block text" >
				<input type="text" name="passwd" class="block text" >
				<input type="submit" name="sub" value="提交" class="lsub">
				<span id="atten"></span>
			</form>
		</div>
-->
	</div>
	<div id="dir" class = "leaft">
		<input class = "et" type="button" name="enter" value="登陆">
		<input class = "et" type="button" name="reg" value="注册">
		<div id="ent">
			<input type="text" class = "ip" name="userName" value="用户名">
			<input type="text" class = "ip" name="passwd" value="密码">
		</div>
		<p id = "atten" class = "tt"></p>
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
		<p class = "dire"></p>
		<ul>
			<li style = "border-radius:5px 5px 0px 0px" class="dirmenu" name="0" ><a>最新热门</a></li>
			<li class="dirmenu" name="1" ><a>推荐</a></li>
			<li class="liC" name="2" ><a>店铺</a>
				<span class = "tran"></span>
			</li>
			<li class="dirmenu" name="3" >
				<a>新闻</a>
			</li>
			<li class="dirmenu" name="4" ><a>校内部门</a></li>
			<li class="dirmenu" name="5" ><a>公交出行</a></li>
		</ul>
	</div>
	<div id="content" class="contSpace">
		<ul id="ulCont" class="contSpace clearfix">
		<div class = "page">
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</p>
				<p class = "user infoLi tt">最新:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user infoLi tt">评论:3/浏览:6<span class = "time">2012-3-23</span></p>
				</li>
			<li class = "block">
				<img  class = "imgLi block"  title = "楼主:李天一">
				<p class = "detail infoLi" title = "here is a test">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</p>
				<p class = "user infoLi tt">最新:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user infoLi tt">评论:3/浏览:6<span class = "time">2012-3-23</span></p>
			</li>
			<li class = "block">
				<img  class = "imgLi block">
			</li>
			<li class = "block">
				<img  class = "imgLi block" >
			</li>
			<li class = "block">
				<img  class = "imgLi block" >
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title="我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错哦">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</p>
				<p class = "user infoLi tt">最新:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user infoLi tt">评论:3/浏览:6<span class = "time">2012-3-23</span></p>
				</li>
			<li class = "block">
				<img  class = "imgLi block" src = "<?php echo base_url('upload/mouse.jpg')?>">
				<p class = "detail infoLi" title = "here is a test">我们都有一个家，名字叫中国，兄弟姐妹都很多，样子也不错</p>
				<p class = "user infoLi tt">最新:李天一最asdfasdfasdfasdfasdf近sd asdfda asdf 嘿嘿</p>
				<p class = "user infoLi tt">评论:3/浏览:6<span class = "time">2012-3-23</span></p>
			</li>
			<p class="pageDir">第1页</p>
		</div>
		<div class = "page">
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>	
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>		
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>			
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>	
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>		
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>				
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<li class = "block">
				<img  class = "imgLi block" src = "./mouse.jpg">
			</li>
			<p class="pageDir">第2页</p>
		</div>
		</ul>
	</div>
	<div id="bottomDir">
		<ul>
			<li class="botDirli">1</li>
			<li class ="botDirli">2</li>
			<li class="botDirli">3</li>
			<li class="botDirli">4</li>
			<li class="botDirli">5</li>
		</ul>
	</div>
</body>
</html>
