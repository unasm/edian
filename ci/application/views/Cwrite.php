 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title?></title>
	<link rel="stylesheet" href="<?php echo base_url('css/write.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="logo.png" type="text/css"> 
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script> ;
<script type="text/javascript" >
	var admin = "<?php echo $this->adminMail?>";
</script>
<body class = "clearfix">
	<div id="dir" >
<!--
		<p id = "atten" class = "tt"></p>
		<input id = "search" class = "ip" value = "搜索" name = "search">
		<img src = "<?php echo base_url("bgimage/search.png")?>">
-->
		<p class = "dire"></p>
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
		<p class = "dire tt"></p>
	</div>
	<div id="content" class="contSpace">
		<form action="<?php echo site_url('write/cadd')?>" method="post" enctype = "multipart/form-data" accept-charset = "utf-8">
		<table border="0">
			<tr class = "part col">
				<td><span class = "item">类型:</span></td>
				<td>
					<input type="radio" name="part" value="1" checked/><span>服装</span>
					<input type="radio" name="part" value="2"/><span>鞋帽配饰</span>
					<input type="radio" name="part" value="3"/><span>数码</span>
					<input type="radio" name="part" value="4"/><span>美食特产</span>
					<input type="radio" name="part" value="5"/><span>日用百货</span>
					<input type="radio" name="part" value="6"/><span>文化玩乐</span>
					<input type="radio" name="part" value="7"/><span>美容护发</span>
					<input type="radio" name="part" value="8"/><span>本地生活</span>
					<input type="radio" name="part" value="9"/><span>母婴用品</span>
					<input type="radio" name="part" value="10"/><span>家具建材</span>
					<input type="radio" name="part" value="11"/><span>二手交易</span>
					<input type="radio" name="part" value="12" id = "sorry"/><span>其他</span>
				</td>
			</tr>
<!--td tr的本质区别-->
			<tr class = "det col">
				<td><span class = "item">商品价格:(元)</span><input type="text" name="price"/><span id = "patten"></span></td>
			</tr>	
			<tr class = "col">
				<td><span class = "item">商品图片:</span><input type="file" name="userfile" size = "14"/></td>
				<td id  = "imgAtten">请用200*200以下图片,超过标准会压缩</td>
			</tr>
			<tr class = "col">
				<td  class = "tit">
				<div>
					<input type="text" name="title" id = "title" class = "title" />
				</div>
				<input type="submit" name = "sub" class = "button" value="发表" />
				<label for = "title">标题<span>(请用简短的描述商品,尽量包含名称和特点，尽量50字以内哦)</span></label>
<!----------------title太差劲了。,学习以下taobao了-------->
				</td>
			</tr>
			<tr id = "tcont">
				<td><textarea name="cont" id = "cont" style = "width:580px"></textarea></td>
			</tr>
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
