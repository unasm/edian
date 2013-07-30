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
    <link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>">
    <link rel="stylesheet" href=" <?php echo $baseUrl.'css/order.css' ?>" type="text/css" media="all" />
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var user_name="<?php echo trim($this->session->userdata('user_name'))?>";
var user_id="<?php echo trim($this->session->userdata('user_id'))?>";
</script>
</head>
<body>
    <div id = "header">
    </div>
    <table border = "0" class = "ordlist">
        <tr>
                <th class = "chose">选择</th>
                <th class = "tmb">图片</th>
                <th class = "til">商品</th>
                <th class = "num">库存</th>
                <th class="num">数量</th>
                <th class="price">单价</th>
                <th class = "note" title = "给店家的备注留言">
                    留言备注
                </th>
                <th class = "del">操作</th>
        </tr>
    </table>
<?php
$len = count($cart);
?>
    <?php for($cnt = 0;$cnt < $len;):?>
    <table border="0" class = "ordlist">
<?php
    $nows = $cart[$cnt]["seller"];
?>
        <?php while(($cnt < $len) && ($nows == $cart[$cnt]["seller"])):?>
<?php
$inf = "";
$img = "";//这里将 备注信息进行分割，文字的添加到备注中，图片的作为缩略图,
$info = $cart[$cnt]["info"];
for($j = count($info[4])-1;$j >= 0;$j--){
    if(preg_match("/\d+\.jpg/",$info[4][$j])){
        $img = $info[4][$j];
    }else{
        $inf.=$info[4][$j].",";
    }
}
if($img == ""){
    $img = $baseUrl."upload/".$info[1][0];
}
$item = $cart[$cnt]["item"];
?>
            <tr>
                <td class = "chose">
                    <input type="checkbox" name="chose" checked = "checked" />
                </td>
                <td class = "tmb">
                    <img src = "<?php echo $img ?>">
                </td>
                <td class = "til">
                    <a href = " <?php echo $siteUrl.'/item/index/'.$cart[$cnt]["item_id"] ?>">
                    <?php
                        echo $item["title"]."(".$inf.")";
                    ?>
                    </a>
                </td>
                <td class = "num">库存<span class = "tS"><?php echo $item["store_num"]?></span></td>
                <td class="num">
                    <input type = "button" name = 'dec' value = "-" />
                    <input type="text" name="buyNum"  value="<?php echo $info[3][0]?>" />
                    <input type = "button" name = 'inc' value = "+" />
                </td>
                <td class="price">￥<?php echo $item["price"]?></td>
                <td class = "note" title = "给店家的留言，说明你的特殊需求">
                    <textarea name="note" placeholder = "备注"></textarea>
                </td>
                <td class = "del"><a  name = "del" href = "<?php echo $siteUrl.'/order/del/'.$cart[$cnt]["item_id"] ?>">删除</a></td>
            </tr>
            <?php $cnt++;?>
        <?php endwhile ?>
    </table>
    <?php endfor?>

    <div class = "adiv clearfix">
        <div class = "addr">
            <div class = "fir">
                <span>豆家敏</span>(收)
                <span>13648044299</span>
            </div>
            <div>
                电子科大清水河校区23栋404房间
            </div>
        </div>
        <div class = "addr">
            <div class = "fir">
                <span>豆家敏</span>(收)
                <span>13648044299</span>
            </div>
            <div>
                电子科大清水河校区23栋404房间
            </div>
        </div>
       <div class = "addr">
            <div class = "fir">
                <span>豆家敏</span>(收)
                <span>13648044299</span>
            </div>
            <div>
                电子科大清水河校区23栋404房间
            </div>
        </div>
       <div class = "addr">
            <div class = "fir">
                <span>豆家敏</span>(收)
                <span>13648044299</span>
            </div>
            <div>
                电子科大清水河校区23栋404房间
            </div>
        </div>
    </div>
   <div class = "tBt">
        全选 <input type="checkbox" name="allChe" id="allChe" checked = "checked" />
        <span id = "dels"><a href = "javascript:javascript">删除所选</a></span>
        <span class = "money">总计:<span id = "calAl">￥312</span>(元)</span>
        <input type="submit" name="sub" id="sub" value="提交订单" />
    </div>
</body>
</html>

