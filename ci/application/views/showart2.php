 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>测试页面</title>
	<link rel="stylesheet" href="<?php echo base_url('css/art2.css')?>" type="text/css" charset="UTF-8">
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
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
		<p class = "dire"></p>
		<ul>
			<li style = "border-radius:5px 5px 0px 0px" class="dirmenu" name="0" ><a>最新热门</a></li>
			<li class="dirmenu" name="1" ><a>推荐</a></li>
			<li class="liC" name="2" ><a>死亡笔记</a>
				<span class = "tran"></span>
			</li>
			<li class="dirmenu" name="3" >
				<a>百科</a>
			</li>
			<li class="dirmenu" name="4" ><a>日记</a></li>
			<li class="dirmenu" name="5" ><a>出游</a></li>
		</ul>
	</div>
	<div id="content" class="contSpace">
		<p id = "title">国际上对钓鱼岛事件的看法</p>
		<ul id="ulCont" class="contSpace clearfix">
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p class = "info">对钓鱼岛事件的看法asdfas asdlfjlasjd;j 阿斯的开发接口阿斯克地方叫阿瑟的解放卡斯蒂芬；卡斯的解放军阿瑟丹枫林科技阿斯的；发卡斯大街法快速地方卡斯地方叫阿瑟丹菲卡散大夫阿斯离开的风景啊三对方卡斯的军阀角色的风景啊斯大林分类及阿斯地方  阿斯的离开房间阿斯的风景阿斯克地方阿斯蒂芬阿斯蒂芬啊的开锁法阿斯蒂芬阿斯蒂芬散大夫阿斯的饭 asdfasd asdflkj阿斯的弗兰克 的司法所地方 阿斯的饭 阿斯蒂芬阿斯蒂芬</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>
			<li>
				<img  class = "thumb" src = "<?php echo base_url("upload/mouse.jpg")?>"/>
				<p>呵呵，抢沙发</p>
				<span class = "time">2012-2-1 2:3: 20</span>
			</li>	
<!--
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
-->
		</ul>
	</div>
</body>
</html>
