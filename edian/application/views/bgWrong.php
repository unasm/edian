<?php
/*************************************************************************
    > File Name :     ../views/bgWrong.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-18 10:49:23
 ************************************************************************/
//这里处理的是后台的错误
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>错误处理</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>错误详情</th>
                <th>操作</th>
            </tr>
<?php
    if($wrong)$len = count($wrong);
    else $len = 0;
?>
            <?php for($i = 0;$i < $len;$i++): ?>
            <tr>
<?php
    $temp = $wrong[$i];
    var_dump($temp["content"]);
    echo "<br>";
    echo "<br>";
    if(array_key_exists("pntState",$temp["content"])){
        echo "<td>打印出错:".$temp["content"]->pntState."</td>";
    }else echo "<td>其他原因</td>";
?>
                <td>打印/联系店家/删除</td>
            </tr>
            <?php endfor ?>
        </table>
    </body>
<style type="text/css" media="all">
    table{
        border-spacing:0px;
        width:100%;
    }
    .del{
        color:#000;
    }
    .oper{
        width:170px;
    }
    td{
        text-align:center;
    }
    a{
        text-decoration:none;
    }
    a:hover{
        text-decoration:underline;
    }
</style>
</html>
