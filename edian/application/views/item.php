<!DOCTYPE html>
<html lang = "en">
<head>
<?php
$siteUrl = site_url();
$baseUrl = base_url();
?>
    <meta http-equiv = "content-type" content = "text/html;charset = utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />
    <title>E点</title>
    <link rel="stylesheet" href=" <?php echo $baseUrl."css/item.css" ?>" type="text/css" media="all" />
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var user_name="<?php echo trim($this->session->userdata('user_name'))?>";
var user_id="<?php echo trim($this->session->userdata('user_id'))?>";
var attr = "<?php echo $attr[1]?>";
var itemId = "<?php echo $itemId?>";
</script>
</head>
<body>
    <div class = "header">
    </div>
    <div id="body"  class = "clearfix">
        <div class = "clearfix imgA">
    <!--集中了对图片的显示-->
            <img id = "mImg" src = " <?php echo $baseUrl.'upload/'.$img[0]?>" />
            <ul id = "thumb" class = "thumb">
                <?php for($i = 0,$l = count($img);$i< $l;$i++):?>
                <li> <img src = " <?php echo $baseUrl."upload/".$img[$i] ?>" /></li>
                <?php endfor?>
            </ul>
        </div>
        <div class = "det clearfix">
            <form action = "<?php echo $siteUrl.'/order/add/'.$itemId ?>" enctype = "multipart/form-data" method = "post" class = "info" accept-charset = "utf-8" id = "fmIf">
    <!--这里将来修改成为快速购买的action -->
                <h3>
                <?php echo $title ?>
                </h3>
                <p><span class = "item">价格:</span>￥<em class = "sp" id = "price"> <?php echo $price ?></em></p>
                <p><span class = "item">评分:</span><span class = "sep"> <?php echo $judgescore ?></span></p>
                <p>
                    <span class="ht"><span class = "item">销量:</span> <span class = "sep">-1</span></span>
                    <span class="ht"><span class = "item">评价:</span><span class = "sep"> <a id = "judge" href = "#tojudge" >-1</a></span></span>
                    <span class="ht"><span class = 'item'>浏览:</span><span class = "sep"> <?php echo $visitor_num ?></span></span>
                </p>
                <p><span class = "item">营业起止时间:</span> <?php echo $operst ?>-- <?php echo $opered ?></p>
                <?php
                    if($attr){
                        echo $attr[0];
                    }
                ?>
                <input type="hidden" name="info"  id = "info" value="红色|18号鞋子" />
                <p id = "num">
                    <span class = "item">购买数量:</span>
                    <input type="text" name="buyNum" id="buyNum" value="1" />
                    <span id = "storeNum">库存: <span id = "tS"><?php echo $store_num ?></span></span>
                        <!--totol store-->
                    <span id = "numCon">
                        <button class="inc">+</button>
                        <button  class="dec">-</button>
                    </span>
                </p>
                <p>
                    <input type = "submit" name = 'inst' class = "bton ba" value = "e点购买" />
                    <input type = "submit" name = "cart" class = "bton" href = "userId/itemId" value = "加入购物车">
                </p>
                <p> <span class="item">承诺:</span> <?php echo $promise ?></p>
            </form>
            <div id="allmap">
            </div>
        </div>

         <div id="user" class = "user">
            <p><a href = "<?php echo $siteUrl."/space/index/".$author_id?>">店主: <?php echo $user_name ?></a></p>
            <p><a href = "<?php echo $siteUrl."/message/index/".$author_id?>">站内联系</a></p>
            <p>联系方式:<?php echo $contract1 ?></p>
            <?php
                //将来去掉这些赋值
                $contract2 = "1264310280";
                if ($contract2) {
                    echo "<p>QQ:<a href = 'http://wpa.qq.com/msgrd?v=3&uin=".$contract2."&site=qq&menu=yes' target = '_blank'>".$contract2."</a></p>";
                }
                $addr = "西源大道2006号电子科大科B258";
                if($addr){
                    echo "<p>地址:".$addr."</p>";
                }
            ?>
        </div>
        <div class="pdc">
            <!-- short for product 就是介绍商品内容的页面-->
            <ul class="pg clearfix" id = "pg">
                <li class = "cse" name = "more">详情</li>
                <li name = "comment">评价</li>
                <li name = "rec">推荐</li>
            </ul>
            <div class="des" id = "des" >
                <!-- short for descript-->
                <?php echo $content ?>
            </div>
            <div class = "dcom" id = "dcom" style = "display:none">
                <p class = "coms"><a>全部(23)</a><a name = "h">超赞(18)</a><a name = "m">还不错(2)</a><a>勉强(1)</a><a>暴走(2)</a></p>
                <ul class = "com" id = "com">
                <!-- short for comment-->
                <?php for($i = count($comt)-1;$i >= 0;$i--):?>
                    <?php $temp = $comt[$i]?>
                    <li>
                        <p class = "cp">
                            <span >评分:</span><span class = "sp"> <?php echo $temp["score"] ?></span>
                            <span > <?php echo $temp["user_name"]?></span>
                            <span > <?php echo $temp["time"]?></span>
                        </p>
                        <blockquote>
                            <?php echo $temp["context"][0] ?>
                        </blockquote>
                        <?php
                            //对text进行拆解分化
                            $len = count($temp["context"]);
                            if($len > 1){
                                $reCom = "";
                                for($j = 1; $j < $len ;$j++){
                                    $re = explode("|",$temp["context"][$j]);
                                    $reCom.="<div class = 'reCom'><p>".$re[0]."</p><span>".$re[2]."</span><span>".$re[1]."</span></div>";
                                }
                                echo $reCom;
                            }
                        ?>
                        <div class = "reCom" >
                            <span name = "comRe" class = "comRe">回复</span>
                            <form action="<?php echo $siteUrl.'/item/appcom/'.$temp["id"]?>" method="post" accept-charset="utf-8" enctype = "multipart/form-data" style = "display:none">
                                <textarea  name = "context" placeholder = "评论..." ></textarea>
                                <input type="submit" name="sub" id="<?php echo $temp["id"] ?>" value="回复" />
                                <!--设置id方便插入-->
                            </form>
                        </div>
                    </li>
                <?php endfor?>
                </ul>
                <form action="<?php echo $siteUrl.'/item/newcom/'.$itemId?>" method="post" enctype = "multipart/form-data" accept-charset="utf-8" id = "comForm" class = "comForm">
                    <textarea name="context" id="context" placeholder = "评论..."></textarea>
                    评分:<input type="input" name="score" id="score" value = "9" />
                    <input type="submit" name="sub" value="评论" />
                </form>
            </div>
        </div>
        <ul id="order" class = "order bot">
            <li>
                <img src = "http://www.edian.cn/upload/191374326184.jpg">
                <p class = "ordet">欢乐够7天a 阿德发速度发阿德发阿德算法的</p>
                <p>12.00<span class = "add">X</span>4</p>
            </li>
            <!-- short for order detail-->
        </ul>
        <div id="footer">
        </div>
    </div>
    <script type="text/javascript" charset="utf-8" src = " <?php echo $baseUrl.'js/jquery.js' ?>"></script>
    <script type="text/javascript" charset="utf-8" src = " <?php echo $baseUrl.'js/cookie.js' ?>"></script>
    <script type="text/javascript" charset="utf-8" src = " <?php echo $baseUrl.'js/item.js' ?>"></script>
<!--
    <script type="text/javascript" charset="utf-8" src = "http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d"></script>
    <script type="text/javascript" charset="utf-8">
    window.onload = mapInit;
    function mapInit(){
        console.log("test");
        var map = new BMap.Map("allmap");
        map.enableScrollWheelZoom();                            //启用滚轮放大缩小
        map.enableInertialDragging();
        map.enablePinchToZoom();//双指缩放
        map.enableAutoResize();
        var lat = "<?php echo $lat ?>",lng = "<?php echo $lng ?>";//可以的话，就更大体定位吧,这种方式不好
        var point = new BMap.Point(lng,lat);
        map.centerAndZoom(point,17);//默认开始定位在科大附近
    }
    </script>
-->
</body>
</html>

