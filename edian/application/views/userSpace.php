<!DOCTYPE html>
<html lang = "en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />
    <title><?php echo $user_name?>的空间</title>
    <base href="<?php echo base_url()?>" >
<?php
    $siteUrl = site_url();
    $baseUrl = base_url();
?>
    <link rel="stylesheet" href="<?php echo $baseUrl.('css/userSpace.css')?>" type="text/css" media="screen" charset="utf-8">
    <link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>">
</head>
<body>
    <!------------------header开始---------------------->
    <div id="header" class = "header" >
            <ul class = "clearfix">
                <a href = "<?php echo $siteUrl?>"><li class = "st">e点</li></a>
                <a href = "#"><li class = "st">名片</li></a>
                <a href = "">
                    <li class = "st index">清单</li>
                </a>
                <li class = "st">
                    <input type="text" name="sea" id="sea"  />
                 </li>
            </ul>
    </div>
    <!---------------------结束------------------------>
    <!--这里显示的是店家的一些信息-->
    <div id = "info" class = "block">
        <p>经验范围:服装，视频，致力与服务顾客</p>
        <p>营业时间:12:00-12:00</p>
    </div>
    <!--信息结束-->
<!-- 这里是最近动态，包括邮箱，图片，还有帖子,如果有动态，则显示，否则不显示，邮箱在前，帖子其次，其他看情况-->

<div id="recent">
    <p class="partT"><span>商品清单</span></p>
        <ul class = "clearfix content">
<?php
    $flag = strpos($work,"外卖");
?>
        <?php for($i = 0,$len = count($cont);$i < $len;$i++):?>
<?php
    $temp = $cont[$i];
?>
            <li class = "block">
                <a href = "<?php echo $siteUrl.('/item/index/').$temp['id']?>">
                    <img class = "block liImg" src = "<?php echo $baseUrl.('thumb/'.$temp['img'])?>" alt = "<?php echo "商品图"?>" />
                </a>
                <a class = "detail" href = "<?php echo $siteUrl.('/item/index/').$temp['id']?>">
                    <?php echo $temp["title"]?>
                </a>
                <p class = "user st">
                    ￥<em><?php echo $temp["price"] ?></em>
                    <span>订单数:<?php echo $temp["order_num"] ?><span>
                    <?php
                        if($temp["comment_num"]){
                            $now = 100*($temp['judgescore']/$temp['comment_num']);
                            echo "<span>评分:".(floor($now)/100)."</span>";//保留两位整数
                        }
                    ?>
                </p>
                <p class = "user st">
                    评价:<?php echo $temp["comment_num"]?>/浏览:<?php echo $temp["visitor_num"]?>
                    <?php
                        if($flag){
                            echo "<span class = 'item'>加入购物车</span>";
                        }
                    ?>
                     <span class = "time"></span>
                </p>
            </li>
        <?php endfor?>
        </ul>
</div>
<script type="text/javascript" src="<?php echo $baseUrl.('js/jquery.js')?>"> </script>
    <script type="text/javascript" src="<?php echo $baseUrl.("js/space.js")?>"></script>
<script type="text/javascript" >
    var user_id = "<?php echo $this->session->userdata('user_id')?>";
    var site_url = "<?php echo site_url()?>";
    var base_url = "<?php echo base_url()?>";
</script>
<!--the end of the recent-->
<!-----------join在这里由js生成-------------->
<!--这里显示的是空间主人的朋友的动态，按照value排序吧,没有顺序，随意排-->
</body>
</html>
