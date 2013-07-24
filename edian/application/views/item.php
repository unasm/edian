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
</script>
</head>
<body>
    <div class = "header">
    </div>
    <div id="body"  class = "clearfix">
        <div class = "clearfix imgA">
    <!--集中了对图片的显示-->
            <img id = "mImg" src = "http://www.edian.cn/upload/191374150239.jpg" />
            <ul class = "thumb">
               <li> <img src = "http://www.edian.cn/upload/191374150239.jpg" /></li>
               <li> <img src = "http://www.edian.cn/upload/191374150239.jpg" /></li>
               <li> <img src = "http://www.edian.cn/upload/191374150239.jpg" /></li>
               <li> <img src = "http://www.edian.cn/upload/191374150239.jpg" /></li>
               <li> <img src = "http://www.edian.cn/upload/191374150239.jpg" /></li>
               <li> <img src = "http://www.edian.cn/upload/191374150239.jpg" /></li>
            </ul>
        </div>
        <div class = "det clearfix">
            <div>
                <h3>
                    美好的明天还需要兄弟一起创造
                </h3>
                <p><span class = "item">价格:</span>￥<em class = "sp">12</em></p>
                <p><span class = "item">评分:</span><span class = "sep">9.5</span></p>
                <p>
                    <span class="ht"><span class = "item">销量:</span> <span class = "sep">23</span></span>
                    <span class="ht"><span class = "item">评价:</span><span class = "sep"> <a id = "judge" href = "#tojudge" >15</a></span></span>
                    <span class="ht"><span class = 'item'>浏览:</span><span class = "sep">230</span></span>
                </p>
                <p><span class = "item">营业起止时间:</span>8:00-- 19:00</p>
                <p id = "num"><span class = "item">购买数量:</span><input type="text" name="buyNum" id="buyNum" value="1" /><span id = "storeNum">库存:234</span><button class="inc">+</button><button  class="dec">-</button></p>
                <p><a class = "bton ba" href = "buy/itemId">立即购买</a><a class = "bton" href = "userId/itemId">加入购物车</a></p>
                <p> <span class="item">承诺:</span>送货上门</p>
            </div>
            <div id="allmap">
            </div>
        </div>

         <div id="user" class = "user">
        </div>
        <div class="pdc">
            <!-- short for product 就是介绍商品内容的页面-->
            <ul class="pg clearfix" id = "pg">
                <li class = "cse" name = "more">详情</li>
                <li name = "comment">评价</li>
            </ul>
            <div class="des" id = "des">
                <!-- short for descript-->
                <p>testing</p>
            </div>
            <div class = "dcom" id = "dcom" style = "display:none" >
                <p class = "coms"><a>全部(23)</a><a name = "h">超赞(18)</a><a name = "m">还不错(2)</a><a>勉强(1)</a><a>暴走(2)</a></p>
                <ul class = "com" id = "com">
                <!-- short for comment-->
                    <li>
                        <p>
                            <span >评分:</span><span class = "sp">9</span>
                            <span >田乙的世界</span>
                            <span >2012-12-14</span>
                        </p>
                        <blockquote>
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                            东西不错，值得夸奖
                        </blockquote>
                    </li>
                    <li>
                        <p>
                            <span >评分:</span><span class = "sp">9</span>
                            <span >田乙的世界</span>
                            <span >2012-12-14</span>
                        </p>
                        <blockquote>
                            东西不错，值得夸奖,东西不错，值得夸奖
                        </blockquote>
                    </li>
                    <li>
                        <p>
                            <span >评分:</span><span class = "sp">3</span>
                            <span >田乙的世界</span>
                            <span >2012-12-14</span>
                        </p>
                        <blockquote>
                            东西不错，值得夸奖,东西不错，值得夸奖
                        </blockquote>
                    </li>
                    <li>
                        <p>
                            <span >评分:</span><span class = "sp">6</span>
                            <span >田乙的世界</span>
                            <span >2012-12-14</span>
                        </p>
                        <blockquote>
                            东西不错，值得夸奖,东西不错，值得夸奖
                        </blockquote>
                    </li>
                </ul>
            </div>
        </div>
        <div class = "bot">
            <a class = "top" href = "#top">顶部</a>
            <ul id="order">
                <p>订单</p>
            </ul>
        </div>
        <div id="footer">
        </div>
    </div>
    <script type="text/javascript" charset="utf-8" src = " <?php echo $baseUrl.'js/jquery.js' ?>"></script>
    <script type="text/javascript" charset="utf-8" src = " <?php echo $baseUrl.'js/item.js' ?>"></script>
    <script type="text/javascript" charset="utf-8" src = "http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d"></script>
<!--
    document.write('<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=672fb383152ac1625e0b49690797918d">\x3C/script>');
</script>
-->
<script type="text/javascript" charset="utf-8">
window.onload = mapInit;
function mapInit(){
    console.log("test");
    var map = new BMap.Map("allmap");
    map.enableScrollWheelZoom();                            //启用滚轮放大缩小
    map.enableInertialDragging();
    map.enablePinchToZoom();//双指缩放
    map.enableAutoResize();
    var lat = "30.757588",lny = "103.93707";//可以的话，就更大体定位吧,这种方式不好
    var point = new BMap.Point(lny,lat);
    map.centerAndZoom(point,17);//默认开始定位在科大附近
}
</script>
-->
<script type="text/javascript" charset="utf-8" id = "mapId"></script>
</body>
</html>

