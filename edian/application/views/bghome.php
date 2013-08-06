<!DOCTYPE html>
 <html lang = "en">
     <head>
<?php
$baseUrl = base_url();
$siteUrl = site_url();
?>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="author" content="Chomo" />
 <title>后台管理页面</title>
<link rel="stylesheet" type="text/css" href="<?php echo  base_url("css/bghome.css")?>"/>
 </head>
 <body>
    <div class="top">
        <h2 ><span>E点,悠闲生活</span>这里是管理员页面 ,欢迎吐槽</h2>
    </div>
<div class="side" id = "side">
<!--这里是art的开始------>
    <ul id = "order" class = "order">
        <a href = "<?php echo site_url('/bg/order/index') ?>" target = "content"><li>待处理订单</li></a>
        <a href = "<?php echo site_url('/bg/order/Today') ?>" target = "content"><li>今日订单</li></a>
        <a href = "<?php echo site_url('/bg/order/hist') ?>" target = "content"><li>历史订单</li></a>
    </ul>
    <ul class = "art" id = "art" >
        <a href ="<?php  echo $siteUrl.('/bg/home/itemlist')?>" target="content">
            <li>
                商品管理
            </li>
        </a>
        <!--商品管理其实分两个部分，一个是用户自己看的，一个是网站工作人员看的-->
        <a href = "<?php  echo $siteUrl.('/bg/home/itemCom')?>" target="content"><li>商品评论</li></a>
        <!-- 评论分为店家看的和管理员可以修改的部分-->
        <a href = "<?php  echo $siteUrl.('/bg/home/itemadd')?>" target="content">
            <li>添加商品</li>
        </a>
        <a href="" target="content"><li>商城信息管理</li></a>
        <!--个人信息，直接将之前的那个页面拿过来,这里和dit打印机绑定-->
    </ul>
<!--这里是art的结束------>
<!--这里是img的开始------>
    <ul id = "img" class = "img">
        <a href="<?php echo site_url('bg/imglist/index')?>" target="content"><li>图片管理</li></a>
        <a href="<?php echo site_url('bg/imglist/add')?>" target="content"><li>上传图片</li></a>
    </ul>
    <!--这里是user的开始------>
    <ul id="user" class="user">
        <a href="<?php  echo site_url('bg/userlist')?>" target="content"><li >用户列表</li></a>
        <a href="<?php echo site_url('bg/newreg')?>" target="content"><li >新增用户</li></a>
        <a href="<?php echo site_url('bg/blocklist/index')?>" target="content"><li>冻结用户</li></a>
        <a href="<?php echo site_url('bg/bgUser/admin')?>" target="content"><li>管理员列表</li></a >
    </ul>
    <ul id = "info" class = "info">
        <a href = " <?php echo site_url('bg/info/index') ?>" target = "content"><li>查看公告</li></a>
        <a href = " <?php echo site_url('bg/info/add') ?>" target = "content"><li>添加公告</li></a>
        <a href = " <?php echo site_url('bg/info/mange') ?>" target = "content">管理公告</a>
    </ul>
    <ul id = "sec" class = "sec">
        <a href = " <?php echo site_url('bg/sec/index') ?>" target = "content">二手管理</a>
        <a href = " <?php echo site_url("bg/sec/judge") ?>"><li>二手评论</li></a>
    </ul>
    <!--这里是user的结束------>
</div>
<div id = "frameCon">
    <iframe id = "main" frameborder="0" name="content" src=" <?php echo site_url('bg/order/index') ?>"></iframe>
</div>
     </body>
 </html>
