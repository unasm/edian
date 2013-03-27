 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title?></title>
	<link rel="stylesheet" href="<?php echo base_url('css/write.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script> 
<script type="text/javascript" src="<?php echo base_url('js/xheditor.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/zh-cn.js')?>"></script>

<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var	PASSWD = "<?php echo $this->session->userdata("passwd")?>";
$(pageInit);
function pageInit()
{
	$.extend(XHEDITOR.settings,{shortcuts:{'ctrl+enter':submitForm}});
	$('#cont').xheditor({upImgUrl:"uploadthumb.php",upImgExt:"jpg,jpeg,gif,png"});
}
function insertUpload(arrMsg)
{console.log(arrMsg)
	var i,msg;
	for(i=0;i<arrMsg.length;i++)
	{
		msg=arrMsg[i];
		$("#uploadList").append('<option value="'+msg.id+'">'+msg.localname+'</option>');
	}
}
function submitForm(){$('#frmDemo').submit();}
</script>
<body class = "clearfix">
	<div id="dir" class = "leaft">
			<input class = "et" type="submit" name="enter" value="登陆">
			<input class = "et" type="submit" name="reg" value="注册">
		<div id="ent">
			<input type="text" class = "ip" name="userName" value="用户名">
			<input type="text" class = "ip" name="passwd" value="密码">
		</div>
		<p id = "atten" class = "tt"></p>
		<p class = "dire tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
		<p class = "dire"></p>
		<ul id = "dirUl">
			<li style = "border-radius:5px 5px 0px 0px" class="dirmenu" name="0" ><a>最新热门</a>
			<span ></span>
			</li>
			<li class="dirmenu" name="1" ><a>推荐</a>
			<span ></span>
			</li>
			<li class="liC" name="2" ><a>死亡笔记</a>
				<span class = "tran"></span>
			</li>
			<li class="dirmenu" name="3" >
				<a>新闻</a>
			<span ></span>
			</li>
			<li class="dirmenu" name="4" ><a>日记</a><span ></span></li>
			<li class="dirmenu" name="5" ><a>出游</a><span ></span></li>
		</ul>
	</div>
	<div id="content" class="contSpace">
		<form action="php" method="post" enctype = "multipart/form-data" accept-charset="utf-8">
			<textarea id="cont" name="elm4" style="width: 580px">&lt;p&gt;当前实例调用的Javascript源代码为：&lt;/p&gt;&lt;p&gt;$('#elm4').xheditor({upImgUrl:&quot;uploadthumb.php&quot;,upImgExt:&quot;jpg,jpeg,gif,png&quot;});&lt;/p&gt;&lt;p&gt;&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color:#fe2419;&quot;&gt;&lt;strong&gt;缩略图模式&lt;/strong&gt;&lt;/span&gt;仅可在“图片”按钮中使用，小图和大图链接之间用&lt;span style=&quot;color:#fe2419;&quot;&gt;&lt;strong&gt;“||”分隔&lt;/strong&gt;&lt;/span&gt;，例如：small.gif||big.html，大图链接可以是图片，也可以是URL网址。&lt;/p&gt;&lt;p&gt;缩略图模式可与多文件插入混合使用，例如：1.gif||1.htm	2.gif||2.html&lt;br /&gt;&lt;/p&gt;&lt;p&gt;特别说明：uploadthumb.php是静态内容，仅为演示用，无论上传了什么图片都返回内置的演示图片文件。&lt;/p&gt;
			</textarea>
		<p><input type="submit" value="发表"></p>
		</form>
	</div>

</body>
</html>
