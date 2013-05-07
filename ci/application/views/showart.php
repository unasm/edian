 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title?></title>
<base href="<?php echo base_url()?>"/>
	<link rel="stylesheet" href="<?php echo base_url('css/art.css')?>" type="text/css" charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url('css/seali.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/art.js')?>"> </script>
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var now_type = "<?php echo $part_id?>",layer=1;
</script>
</head>
<body  class = "clearfix">
	<div id="dir" >
		<p class = "dire"></p>
		<form id = "seaform" action="" method="get" accept-charset="utf-8">
			<div id="searchField">
				<input type="text" name="sea" id="sea"/>
				<input type="submit" name="sub" id = "seabut" value = ""/>
				<label for = "sea"><span id = "seaatten">搜索<span class = "seatip">(请输入关键字)</span></span><label>
				<!--short for search-->
			</div>
		</form>
		<ul id = "dirUl">
			<?php foreach($dir as $key => $value):?>
			<?php if ($key==0) 
				echo "<a href = ".site_url("mainpage/index/0")."><li style = 'border-radius:5px 5px 0 0' class='dirmenu' >热点<span ></span></li></a>";
				else if($key == 12)
					echo "<a href = ".site_url("mainpage/index/12")."><li style = 'border-radius:0 0 5px 5px' class='dirmenu' >其他<span ></span></li></a>";
				else echo "<a href = ".site_url("mainpage/index/".$key)."><li class='dirmenu' >".$value."<span ></span></li></a>";
			?>
			<?php endforeach?>
		</ul>

	</div>
	<div id="content" >
		<ul id="ulCont"  class = "clearfix">
			<h2 id = "title"><?php echo $title ?></h2>
			<p id = "info">评价:<?php echo $comment_num?>/浏览:<?php echo $visitor_num?><span><?php echo $time?></span></p>
			<li class = "mast alire">
				<div class = "clearfix">
					<img class = "block" src = "<?php echo 'upload/'.$img?>"/>
					<p class = "price">￥:<?php echo $price?>元
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
			<form id = "denglu" class = "block" action = "<?php echo site_url('reg/denglu');?>" method = 'post' accept-charset = "utf-8">
				用户名:<input type = "text" name = "userName" class = "valTog" value = "注册名,下格请输入密码"/>
				密码:<input type = "password" class = "valTog" name = "passwd" />
				<input type = "submit" name = "enter"  value = "登陆"/>
			</form>
			<form id = "comform" action="<?php echo site_url('showart/addCom/'.$artId)?>" method="post"  accept-charset="utf-8">
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


</body>
</html>
