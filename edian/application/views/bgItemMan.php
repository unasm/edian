<?php
/*************************************************************************
    > File Name :     ../../views/bgItemMan.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-17 01:29:38
 ************************************************************************/
$baseUrl = base_url();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>商品管理</title>
<link rel="stylesheet" href="<?php echo $baseUrl.'css/bgItemMan.css' ?>" type="text/css" media="all" />
</head>
<body>
    <table border = "1">
        <tr>
            <th>标题</th>
            <th>库存</th>
            <th>价格(元)</th>
            <th>状态</th>
            <th class = "oper">操作</th>
        </tr>
        <?php for($i = 0,$len  = count($item);$i < $len;$i++):?>
<?php
$now = $item[$i];
?>
        <tr>
            <td><?php echo $now["title"] ?></td>
            <td><?php echo $now["store_num"] ?></td>
            <td>￥<?php echo $now["price"] ?></td>
            <td>
<?php
    if($now["state"] == 0 )echo "在售中..";
    else if($now["state"] == 1)echo "下架..";
    else if($now["state"] == 2)echo "预备中..";
?>

</td>
            <td class = "oper">上架/下架</td>
        </tr>
        <?php endfor?>
    </table>
</body>
</html>
