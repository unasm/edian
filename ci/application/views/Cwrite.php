 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title?></title>
	<link rel="stylesheet" href="<?php echo base_url('css/write.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<!--
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script> ;
-->

<body class = "clearfix">
	<div id="dir" >
<!--
		<p id = "atten" class = "tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
-->
		<p class = "dire"></p>
		<ul id = "dirUl">
			<a href = "<?php echo site_url("mainpage/index/0")?>"><li style = "border-radius:5px 5px 0 0" class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/1")?>"><li class="dirmenu" >日记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/2")?>"><li class="dirmenu" >热点<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/3")?>"><li class="dirmenu" >死亡笔记<span ></span></li></a>
			<a href = "<?php echo site_url("mainpage/index/4")?>"><li style = "border-radius:0 0 5px 5px" class="dirmenu" >旅行<span ></span></li></a>
		</ul>
		<p class = "dire tt"></p>
	</div>
	<div id="content" class="contSpace">
		<form action="<?php echo site_url('write/add')?>" method="post" enctype = "multipart/form-data" accept-charset = "utf-8">
		<table border="0">
			<tr width = "500px">
				<td>类型:
		<!------貌似没有这些td，tr就会出现bug，所以不能删除，修改-------------------------->
					<input type="radio" name="part" value="1" checked/><span>服装</span>
					<input type="radio" name="part" value="2"/><span>饭店</span>
					<input type="radio" name="part" value="3"/><span>化妆品</span>
					<input type="radio" name="part" value="4"/><span>百货商店</span>
					<input type="radio" name="part" value="5"/><span>食品</span>
					<input type="radio" name="part" value="6"/><span>家电</span>
					<input type="radio" name="part" value="7"/><span>家具</span>
					<input type="radio" name="part" value="8"/><span>化妆品</span>
					<input type="radio" name="part" value="9"/><span>二手</span>
					<input type="radio" name="part" value="10" id = "sorry"/><span>其他</span>
		<!------选择其他，代表我们的分类工作没有做好，要道歉-------------------------->
				</td>
			</tr>
			<tr>
				<td>
				<?php if(!isset($tit)) $tit = "标题"?>
				<input type="text" name="title" class = "title" value = "<?php echo $tit?>">
<!----------------title太差劲了。,学习以下taobao了-------->
				</td>
				<td>
					<input type="submit" name = "sub" class = "button" value="发表">
				<!--发表的按钮太大了-->
				</td>
			</tr>
<!--td tr的本质区别-->
			<tr>
				<td>物品价格:<input type="text" name="price"/></td>
				<td>图片:<input type="file" name="userfile"/></td>
			</tr>	
			<tr><td class = "tdarea" style = "width:400px"><textarea name="cont" id = "cont" style = "width:580px">
			</textarea></td></tr>
		</table>
		</form>
	</div>
<script type="text/javascript" src = "<?php echo base_url('js/xheditor.min.js')?>"></script>
<script type="text/javascript" src = "<?php echo base_url('js/zh-cn.js')?>"></script>

<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var	user_name="<?php echo $this->session->userdata('user_name')?>";
var	user_id="<?php echo $this->session->userdata('user_id')?>";
var	PASSWD = "<?php echo $this->session->userdata("passwd")?>";
$(pageInit);
function pageInit()
{
	$.extend(XHEDITOR.settings,{shortcuts:{'ctrl+enter':submitForm}});
	$('#cont').xheditor({upImgUrl:site_url+"/write/imgAns?immediate=1",upImgExt:"jpg,jpeg,gif,png"});
}
function insertUpload(arrMsg)
{
	var i,msg;
	for(i=0;i<arrMsg.length;i++)
	{
		msg=arrMsg[i];
		$("#uploadList").append('<option value="'+msg.id+'">'+msg.localname+'</option>');
	}
}
function submitForm(){$('#frmDemo').submit();}
</script>
<script type="text/javascript" src = "<?php echo base_url('js/write.js')?>"> </script> 
</body>
</html>
