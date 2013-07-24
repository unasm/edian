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
            <h3>
                美好的明天还需要兄弟一起创造
            </h3>
            <p><span class = "item">价格:</span>￥<em class = "sp">12</em></p>
            <p><span class = "item">评分:</span>9.5</p>
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
         <div id="user" class = "user">
            <div id="allmp">
            </div>
        </div>
        <div class="pdc">
            <!-- short for product 就是介绍商品内容的页面-->
            <ul class="pg clearfix">
                <li>详情</li>
                <li class = "cse">评价</li>
            </ul>
            <div class="des" id = "des">
                <!-- short for descript-->
            </div>
            <div class = "dcom" >
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
</body>
</html>

