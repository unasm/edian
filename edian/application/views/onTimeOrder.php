<?php
/*************************************************************************
    > File Name :     ../../views/onTimeOrder.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-06 10:20:23
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
    <title>E点</title>
    <link rel="icon" href="<?php echo $baseUrl.'favicon.ico' ?>">
    <link rel="stylesheet" href="<?php echo $baseUrl.('css/timeorder.css') ?>" type="text/css" media="all" />
<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var base_url = "<?php echo base_url()?>";
var user_name="<?php echo trim($this->session->userdata('user_name'))?>";
var user_id="<?php echo trim($this->session->userdata('user_id'))?>";
</script>
</head>
<body>
<table >
    <tr>
        <th class = "oid">订单号</th>
        <th>商品名</th>
        <th>购买量</th>
        <th>买家信息</th>
        <th>下单时间</th>
        <th class = "oper">操作</th>
<!--操作分为两种，一个已发货，一个是举报-->
    </tr>
    <tbody>
        <tr>
            <td>12</td>
            <td>
                <p><a href = "#">红烧鸡爪(泡椒)（散装）注:到了就发个短信</a></p>
            </td>
            <td>
                ￥13.00 x 12 = 156(元)
            </td>
            <td class = "addr">
               <p>田乙的世界</p>
                <p>手机:1238320992</p>
                <p>地址:
                    清远街北巷404040号清远街北巷404040号清远街北巷404040号清远街北巷404040号清远街北巷404040号清远街北巷404040号
                </p>
            </td>
            <td>2012-2-12 12:12:12</td>
            <td>
                <a href = "#">发货</a>
                <a href = "#">拒绝</a>
                <a href = "#">举报</a>
            </td>
        </tr>
        <tr>
            <td>13</td>
            <td>
                <a href = "#">
                    红烧鸡爪(泡椒)（散装）注:免费送我可以送好评哦
                </a>
            </td>
            <td >
                ￥13.00 x 12 = 156(元)
            </td>
            <td class = "addr">
               <p>田乙的世界</p>
                <p>手机:1238320992</p>
                <p>地址:
                    清远街北巷404040号清远街北巷404040号清远街北巷404040号清远街北巷404040号清远街北巷404040号清远街北巷404040号
                </p>
            </td>
            <td>2012-2-12 12:12:12</td>
            <td>
                <a href = "#">发货</a>
                <a href = "#">拒绝</a>
                <a href = "#">举报</a>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
