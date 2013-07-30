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
        "testing"
    </div>
<?php
$len = count($cart);
?>
    <?php for($cnt = 0;$cnt < $len;):?>
    <table border="0" class = "ordlist">
<?php
    $nows = $cart[$cnt]["seller"];
?>
        <?php while(($cnt < $len) && ($nows == $cart[$cnt]["seller"])):?>
            <tr>
                <td class = "tmb"><img src = "http://www.edian.cn/upload/191374150239.jpg"></td>
                <td class = "til">
                    <?php echo $cart[$cnt]["info"][0] ?>
                </td>
                <td class="num">
                    <input type="text" name="buyNum"  value="1" />
                    <input type = "button" class = 'inc' value = "+" />
                    <input type = "button" class = 'dec' value = "-" />
                </td>
                <td class="price">￥12.00</td>
                <td class = "note" title = "给店家的备注留言"> <textarea name="note" placeholder = "备注"></textarea></td>
            </tr>
            <?php $cnt++;?>
        <?php endwhile ?>
    </table>
    <?php endfor?>
</body>
</html>

