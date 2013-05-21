<!DOCTYPE html>
<html lang = "en">
<head>
	<title><?php echo $title?></title>
	<link rel="stylesheet" href="<?php echo base_url('css/art.css')?>" type="text/css" charset="UTF-8">
<!--
	<link rel="stylesheet" href="<?php echo base_url('css/seali.css')?>" type="text/css" charset="UTF-8">
-->
	<link rel="icon" href="favicon.ico" > 

</head>
<body  >
<?php
	echo $this->load->view("dir");
?>
	<div id="content" >
		<ul id="ulCont"  class = "clearfix">
			<h2 id = "title"><?php echo $title ?></h2>
			<p id = "info"><span class = "tt">评价:<?php echo $comment_num?>/浏览:<?php echo $visitor_num?><span><?php echo $time?></span></span></p>
			<li class = "mast alire">
				<div class = "clearfix">
					<img class = "block" src = "<?php echo base_url('upload/'.$img)?>"/>
					<p class = "mprice">￥:<?php echo $price?>元
					<?php
						if($author_id == $this->session->userdata("user_id"))
						echo "<a id = 'change' href = ".site_url("write/change/".$artId).">修改</a>"
					?>
					</p>
					<p><a href = "<?php echo site_url('space/index/'.$author_id)?>"><b>卖家</b>：<em><?php echo $user_name?></em></a>  --> <a id = "msg" name = "<?php echo $user_name?>" href = "<?php echo site_url('message/write/'.$author_id)?>"><span id = "msgatten">站内信</span>联系</a></p>
					<div id = "msgA" class = "block" style = "display:none">
						<!------发送站内心的框------>
						<form action="<?php echo site_url('message/add')?>" method="post" accept-charset="utf-8">
							<input type="text" name="title" id = "msgt" />
							<input type="button" name="cc" value="取消"/>
							<p class = "plab"><label for = "msgt">标题</label></p>
							<input type="text" name="geter" value="<?php echo $user_name."(".$author_id.")"?>"/>
							<input type="submit" name="sub" value="发送"/>
							<textarea id = "cont" name="cont"></textarea>
						</form>
					</div>
					<p><em><b>联系方式</b></em>：<?php echo $contract1?></p>
					<?php if($contract2 != "") echo "<p><em><b>联系方式2</b></em>：".$contract2."</p>";?>
					<?php if($email != "") echo "<p><em><b>邮箱</b></em>：".$email."</p>";?>
					<?php if($addr != "") echo "<p><b><em>地址</em></b>：".$addr."</p>";?>
				</div>
				<blockquote class = "info"><?php echo $content?></blockquote>
			</li>
		</ul>
		<div id="judge" class = "clearfix sli">
			<form id = "denglu" class = "clearfix block" action = "<?php echo site_url('reg/denglu');?>" method = 'post' accept-charset = "utf-8">
				<span>用户名:<input type = "text" name = "userName" class = "valTog" /></span>
				<span>密码:<input type = "password" class = "valTog" name = "passwd" /></span>
				<input  class = "et butCol" type = "submit" name = "enter"  value = "登陆"/>
			</form>
			<form class = "block clearfix" id = "comform" action="<?php echo site_url('showart/addCom/'.$artId)?>" method="post"  accept-charset="utf-8">
				<div class = "but">
					<input class = "ji" id ="subcom" type="submit" value="提交"/>
					<input  class = "ji" id ="giveup" type="button" value="下次"/>				
					<button title="控制目录显隐" id = "hiA" class = "hiA et">隐藏</button>	
				</div>
				<textarea id = "comcon" name="com" ></textarea>
				<label for = "comcon"><span class = "pholder">吐槽吗.....</span></label>
			<div id="face" class = "clearfix">
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
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/art.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/common.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var now_type = "<?php echo $part_id?>",layer=1;
</script>
</body>
</html>
