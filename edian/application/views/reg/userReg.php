<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv = "content-type" content = "text/html;charset = utf-8">
    <title>注册</title>
    <link rel="stylesheet" href="<?php echo base_url('css/reg.css')?>" type="text/css" charset="UTF-8">
<?php
    $baseUrl = base_url();
?>
    <link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>">
<link rel="icon" href="logo.png" type="text/css">
<script type="text/javascript" src = "<?php echo $baseUrl.('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo $baseUrl.('js/reg.js')?>"></script>
<script type="text/javascript">
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
</script>
</head>
<body>
    <div id="content"  class = "clearfix">
        <form action="<?php echo site_url("reg/regSub")?>" method="post" enctype = "multipart/form-data" accept-charset="utf-8">
            <p>用户名<span class = "xx">*</span>：<input type="text" name="userName" /><span id = "name"></span></p>
            <p>密码<span class = "xx">*</span>：<input type="password" name="passwd" /><span id = "pass"></span></p>
            <p>确认密码<span class = "xx">*</span>：<input type="password" name="repasswd" /></p>
            <div id = "map">
                <input type="hidden" name="pos" id = "pos" value=""/>
                <div id = "allmap"></div>
            </div>
            <p>联系方式(手机)<span class = "xx">*</span>：<input type="text" name="contra" /><span id = "contra"></span></p>
            <p>QQ(可选)：<input type="text" name="contra2" /></p>
            <p>地址(可选)：<input type="text" name="add" /><span id = "add"></span></p>
            <p>头像(可选)：<input type="file" name="userfile" /><span id = "photo">小于5M的jpg,gif,png格式图片</span></p>
            <!--头像上传完之后即时显示-->
            <p>邮箱(可选)：<input type="text" name="email" /><span id = "email"></span></p>
            <p>图片验证码<span class = "xx">*</span>：<input type = "text" id = "incheck" name = "checkcode"/><img id = "check" src="<?php echo site_url('checkcode/index')?>"><span id = "spanCheck"></span></p>
            <p>短信验证码<span class = "xx">*</span>：<input type = "text" name = "smschk"/> <button id = "smschk">点击发送验证码</button></p>
            <p class = "tip">标有<span class = "xx">*</span>为必填内容，其他可选</p>
            <p class = "center"><input type="submit" name="sub" value="提交"/></p>
        </form>
    </div>
<!--
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d"></script>
-->
</body>
</html>
