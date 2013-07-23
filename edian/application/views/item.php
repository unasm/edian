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
        <div class = "det">
            <h3>
                美好的明天还需要兄弟一起创造
            </h3>
            <p><span class = "item">价格:</span>￥<em class = "sp">12</em></p>
            <p><span class = "item">评分:</span>9.5</p>
            <p>
                <span class="ht"><span class = "item">销量:</span> 23</span>
                <span class="ht"><span class = "item">评价:</span> 15</span>
                <span class="ht"><span class = 'item'>浏览:</span>230</span>
            </p>
        </div>
    </div>
</body>
</html>

