<?php
/*************************************************************************
    > File Name :     ../views/header.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-15 00:29:53
 ************************************************************************/

?>
<!DOCTYPE html>
<html lang = "en">
<head>
<?php
$siteUrl = site_url();
$baseUrl = base_url();
?>
    <meta http-equiv = "content-type" content = "text/html;charset = utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />
    <link rel="stylesheet" href=" <?php echo $baseUrl."css/header.css" ?>" type="text/css" media="all" />
</script>
</head>
<body>
    <div class = "top">
        <div class = "body">
            <a class = "rit" target="_blank" href="http://wpa.qq.com/msgrd?V=1&uin=1264310280&site=qq&menu=yes">客服</a>
            <a  class = "rit" href = "#">帮助</a>
            <a href = "#">田乙</a>
            <a href = "<?php echo $siteUrl.'/order/myorder' ?>">订单</a>
            <a href=" <?php echo $siteUrl.'/order/index/' ?>">我的购物车</a>
            <img border="0" SRC=http://wpa.qq.com/pa?p=1:1264310280:10 alt="qq图片">
        </div>
    </div>
    <div class = "header body clearfix">
        <div class = "dl">
            <img src = "http://images.wunme.com/a01/chyeajender1/chyea/fimages/3722/sevdswbyp.jpg"  class = "logo"/>
            <span>点</span>
        </div>
        <form class = "sea" method = "get" accept-charset = "utf-8">
            <div id = "inpt">
                <input type="text" name="sea" id="sea"  autofocus = "autofocus"/>
            </div>
            <input type="submit" name="sub" id="sub" value = "搜索" />
        </form>
    </div>
</body>
</html>

