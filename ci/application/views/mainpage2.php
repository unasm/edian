 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>测试页面</title>
	<link rel="stylesheet" href="<?php echo  base_url('css/mainpage2.css')?>" type="text/css" charset="UTF-8">
<link rel="icon" href="./edian/logo.png" type="text/css"> 
<script type="text/javascript" src="<?php echo base_url('js/mainpage.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/cookie.js')?>"></script>
<script type="text/javascript">
/*now_type表示当前表示的显示的版块，热门消息算是0，part_id，表示显示的页数，已经表示到了第几页
 */
var partId=new Array(1,1,1,1,1);
var download_height=100;
var now_type=0;
var url,total;//now_type 表示当前显示的版块，download_height表示距离底部开始加载的距离，part_id,表示显示的页数，url表示向那个页面申请数据，total表示版块的数据总数
var site_url,PASSWD,user_name,user_id;//将php中的site_url变成js的值
window.onload= init;
function init(){
	url="mainpage/infoDel/";
	site_url="<?php echo site_url()?>";
	getInfo(now_type);
	//使用ci自带的获得用户信息
	user_name="<?php echo $this->session->userdata('user_name')?>";
	user_id="<?php echo $this->session->userdata('user_id')?>";
	PASSWD = "<?php echo $this->session->userdata("passwd")?>";

	if("<?php echo $this->session->userdata('user_id')?>" != ""){//控制登陆
		ALogin(user_name,"<?php echo $this->session->userdata("user_id")?>",PASSWD);
	}
	else loginAuto();

	$("#dir ul li").click(function(){
		var parent=$("#dir  li");
		for(var i=0;i<parent.length;i++){
			parent[i].className="dirmenu";
		}
		this.className="dirClick";
	});
	getUserId();
	changePart();
}

function changePart(node){
	getTotal(now_type,"<?php echo site_url('mainpage/getTotal')?>"+"/"+now_type);
}
window.onscroll=init_scroll;
function init_scroll()
{
	autload(now_type);
}
</script>
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
		<input id = "search" name = "search">
		<p></p>
		<ul>
			<li class="dirmenu" name="0" >最新热门</li>
			<li class="dirmenu" name="1" >推荐</li>
			<li class="dirClick" name="2" >店铺</li>
			<li class="dirmenu" name="3" >新闻</li>
			<li class="dirmenu" name="4" >校内部门</li>
			<li class="dirmenu" name="5" >公交出行</li>
		</ul>
	</div>
	<div id="content" class="contSpace">
		<ul id="ulCont" class="contSpace">
<!--
			<p class="pageDir">第一页</p>
-->
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
