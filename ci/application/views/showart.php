<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo base_url('css/spacePhoto.css')?>" type="text/css" media="screen" charset="utf-8">
	<title><?php echo $title?>的相册</title>
	<base href="<?php echo site_url('')?>" target="">
	<script type="text/javascript" src = "<?php echo base_url("js/art.js")?>"></script>
	<script type="text/javascript" src = "<?php echo base_url("js/jquery.js")?>"></script>
<script type="text/javascript" >
window.onload = init;
var art_id,site_url;
function init () {
	getFace();
	art_id = "<?php echo $art_id?>";
	site_url = "<?php echo site_url()?>";
	getCom(art_id);
	subCom(art_id);
}
</script>
</head>
<body>
<?php
echo $this->load->view("m-spaceHeader");
?>

	<div id="comment">
		<ul id="commentUl">
			<li class = "clearfix" >
				<p class="content" style="color:#C253B0; font-size:24px"><span><a href = "<?php echo site_url("mainpage/index")?>">首页</a>>><span><a href = "<?php echo site_url("mainpage/index/".$part_id)?>"><?php echo $part?></a>>></span></span><?php echo $title;?></p>
				<div class="content">
					<div class="block userInfo">
						<img class="block thumb" src="<?php echo  base_url('upload/'.$user_photo);?>">
						<p>用户名:<span><?php echo $user_name;?></span></p>
						<p>在线:<span>是</span></p>
						<p>时间:<?php echo $reg_time?></p>
					</div>
				</div>
				<div class="commentInfo">
					<p><?php echo $content; ?><p>
					<p class = "time">发表于:<?php echo $time;?><p>
				</div>
			</li>
			<li class="odd">
				<div class="content clearfix">
					<div class="block userInfo">
<!--
						<img class="block thumb" src="http://m1.img.libdd.com/farm5/2012/0913/20/CAB0222A7A3AA4D0FCAFDA95FAD9851A7E25E4A8ABB4_64_64.jpg">;
-->
						<p>用户名:<span>失意的时候不要伤心</span></p>
						<p>在线:<span>是</span></p>
						<p>时间:2010-02-03 23-23</p>
					</div>
					<div class="commentInfo">
						<p>
zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK asdfasdfasdflkasdjflkajsdflkjaskdlfjaflkasdjflkajsdflkjaskdlfja;sdkfjka;lsdjf;laksdfjlk;asjdf lk岁的发送的卡夫卡了阿斯克里的风景卡拉斯的风景啊就是地方卢卡觉得苏菲利卡角色的分类科技啊的斯拉夫  阿斯的离开房间啊斯大林疯狂的阿斯历代封建               立刻就离开岁的  阿斯的离开房间阿兰克第三  萨拉克的飞机离开  岁的分类卡三的分类阿斯蒂芬阿斯的法泗列岛附近快乐的阿斯的发送的发丝东方 阿斯蒂芬阿斯地方阿斯蒂芬 萨的发送地方阿斯蒂芬啊第三法岁的岁的法岁的阿斯的饭阿斯的阿斯的法三地方阿斯的法的司法的司法阿斯的法的司法阿斯蒂芬阿斯的法三地方阿斯蒂芬啊地方阿斯蒂芬阿斯的法地方阿斯蒂芬啊第三法三地方啊地方阿斯的法岁的阿斯蒂芬阿斯的法岁的啊地方阿斯的阿斯蒂芬啊的法三地方啊的司法啊的法的司法阿斯蒂芬啊地方阿斯地方阿斯蒂芬啊第三法三地方阿斯的三大风啊的法三地方阿斯蒂芬啊第三</p>
						<p>我顶以下，阿列克等级分类卡斯蒂封建卡拉大三faksdjfakdsfjadslfkjaskdlfjalkdsjflakd阿斯兰快点放假阿列克就打算饭卡就四道口路放假啊两道三科积分阿克萨的房间阿喀琉斯的剑法的积分阿斯顿李开复阿列克江东父老卡带机富利卡京东方kajsdfkadsfaksldjflakjdsfkla，卡斯江东父老卡的算法卡的所肩负看lajdfkadsfkasdf ，阿斯顿没法卡斯蒂饭卡几点思考封建asdjfajsdfjaksdfja，阿迪所开发克里斯蒂发，摩卡打扫房间卡拉第三届法大赛开发sdfjaksdjfklajdsfajdsf， 阿斯顿麻烦了卡及的算法几点思考发jdskfjaklsdjfajdsflkajdsflkadsfadf的算法阿迪发来阿的算法卡拉打扫房间莱卡的算法拉阿得分飒飒的发阿迪算法阿迪法大赛发 我用力顶一下，我使用力气的顶一下</p>
						<p class = "time">发表于:<?php echo $time;?><p>
					</div>
				</div>
			</li>
			<li >
				<div class="content">
					<div class="block userInfo">
<!--
						<img class="block thumb" src="http://m1.img.libdd.com/farm4/2012/1209/11/947D3B4BEAA6110B10EDC8FBCD98E7D06D10ECAAFF323_500_752.jpg">
-->
						<p>用户名:<span>失意的时候不要伤心</span></p>
						<p>在线:<span>是</span></p>
						<p>时间:2010-02-03 12-32</p>
					</div>
				</div>
			</li>
			<li class="odd" >
				<div class="content">
					<div class="block userInfo">
<!--
						<img class="block thumb" src="http://c1.neweggimages.com.cn/neweggpic2/neg/P380/A28-105-0AR.jpg?v=810D7695D98A46CF81E2">	
-->
						<p>用户名:<span>失意的时候不要伤心</span></p>
						<p>在线:<span>是</span></p>
						<p>时间:2010-02-03 12-23</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div id="judge" class="odd clearfix">
		<div class="content">
			<form class="judgeInfo block" method="post">
				<textarea name="content" id="commentContent" placeholder="添加回复内容" class="block"></textarea>			
<!--//还不可以在回复中添加图片
					<input type="file" size="9" name="judgeupload" id="upload" >
-->
					<input type="submit" name="sub" value="发表" id="submit">
					<span class="stayline"></span>
			</form>
			<div id="face" class="block">
				<img src="<?php echo base_url('face/15.gif')?>" title="不要嘛，人家会害羞的">
<!--
				<img src="http://bbs.stuhome.net/images/post/smile/yang/41.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/42.gif" title="嘿嘿嘿....先拿钱来">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/45.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/46.gif" title="让人家得瑟一会嘛">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/5.gif" title="这个....呵呵.....汗.....">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/47.gif" title="嘿嘿嘿嘿......">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/48.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/50.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/51.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/40.gif" title="饱饱的，很贴心">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/52.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/30.gif" title="汗.....">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/55.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/56.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/10.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/11.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/tuerkong/29.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/16.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/15.gif" >
				<img src="http://bbs.stuhome.net/images/post/smile/yang/17.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/18.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/19.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/30.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/61.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/34.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/24.gif" title="耶...........">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/35.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/8.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yellow%20face/(20).gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/19.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/1.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/2.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/3.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/4.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/6.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/9.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/13.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/17.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/1.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/28.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/43.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/31.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/too/32.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yellow%20face/(14).gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/38.gif">
				<img src="http://bbs.stuhome.net/images/post/smile/yang/59.gif">
-->
			</div>	
		</div>
	</div>
</body>
</html>
