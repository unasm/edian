<?php
/*************************************************************************
    > File Name :     views/dir.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-05-20 15:54:31
 ************************************************************************/
?>
<!DOCTYPE html>
<html lang = "en">
<head>
<?php
    $siteUrl = site_url();
?>
    <meta http-equiv = "content-type" content = "text/html;charset = utf-8">
    <title>E点</title>
    <link rel="stylesheet" href="<?php echo base_url('css/dir.css')?>" type="text/css" charset="UTF-8">
</head>
<body>
    <div id="dir" class = "dir">
        <h1><span>E</span>点</h1>
<!----------------header------------------------>
        <div id="denter" class = "denter">
            <a id = "showsub" href = "<?php echo $siteUrl.'/reg/login'  ?>" target="__blank"><span  id = "lotip" class = "butCol et reg">登录</span></a>
            <a  href = "<?php echo $siteUrl.'/reg/index' ?>"><span class = "butCol et reg">注册</span></a>
        </div>
        <form id = "ent" action="<?php echo $siteUrl.('/reg/dc')?>" method="post" accept-charset="utf-8" style = "display:none">
            <input type="text"  class = "valTog" name="userName" id = "userName" value="用户名">
            <input type="password" class = "valTog"  name="passwd" id = "passwd" value="密码">
            <input  class = "butCol  et" type="submit" name="enter" value="登录"/>
            <p id = "atten" class = "tt"></p>
        </form>
        <form class = "clearfix" id = "seaform" action="<?php echo $siteUrl.('/search/res')?>" method="get" accept-charset="utf-8">
            <div id="sf"><!--searchField-->
                <input type="text" name="sea" id="sea"/>
                <!--short for search-->
            </div>
            <input type="submit" name="sub" id = "seabut" value = ""/>
            <label for = "sea"><span id = "seaatten">搜索<span class = "seatip">(请输入关键字)</span></span></label>
        </form>
<!-------------/header------------------------>
        <div id = "#allmap">
        </div>
        <ul id = "dirUl" >
    <!-- spg same page，表示不跳转的链接-->
            <li class = "diri"><a class = "part spg" href = "<?php echo $siteUrl.('/home/index/0')?>" name = "0">热点</a></li>
            <li class = "diri"><a href = "<?php echo $siteUrl.('/waimai/index/10')?>" target = "_blank">外卖</a></li>
            <?php foreach ($dir as $i => $vi):?>
                <li class = "diri">
                <a class = "part spg" name = "<?php echo $i ?>" href = "<?php echo $siteUrl.'/home/index/'.urldecode($i)?>"><?php echo $i?></a>
                    <div class = "dp clearfix" style = "display:none" >
                    <?php foreach ($vi as $j => $vj):?>
                        <ul>
                            <h2 class = "sTit"><?php echo $j?></h2>
                            <?php foreach($vj as $key):?>
                                <li class = "dirj"><a class = "spg" href = "<?php echo $siteUrl.'/home/index/'.urlencode($key)?>" name = "<?php echo  urlencode($key) ?>"><?php echo $key?></a></li>
                            <?php endforeach?>
                        </ul>
                    <?php endforeach?>
                    </div>
                </li>
            <?php endforeach?>
            <li class = "diri"><a class = "part" href = "<?php echo $siteUrl.('/secMkt/index/')?>" target = "_blank">二手市场</a></li>
            <li class = "diri"><a class = "part info" href = "<?php echo $siteUrl.('/pubInf/index/')?>" target = "_blank">通知公告</a></li>
        </ul>
    </div>

</body>
</html>
