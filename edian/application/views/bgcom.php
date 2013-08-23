<?php
/*************************************************************************
    > File Name :     ../../views/bgcom.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-23 03:37:34
 ************************************************************************/
$siteUrl = site_url();
if($com)$len = count($com);
else $len = 0;
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>后台评论查看页面</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>评分</th>
                <th>详情</th>
                <th>主题</th>
            </tr>
            <tbody>
                <?php for($i = 0;$i < $len;$i++):?>
                <tr>
                    <td style = "text-align:center;font-size:1.6em;color:#B90101;">
                        <?php
                        $comi = $com[$i];
                        echo $comi["score"];
                        ?>
                    </td>
                    <td>
                    <?php
                        $lenj = count($comi["context"]);
                        $cont = $comi["context"];
                        for($j = 0;$j < $lenj;$j++){
                            $str = "<p><span>".$cont[$j]["user_name"]."</span><span>".$cont[$j]["context"]."</span><span>".$cont[$j]["time"]."</span>";
                            if($type == $ADMIN){
                                $str.="<span class = 'oper'>修改</span>";
                            }
                            $str.="</p>";
                            echo $str;
                        }
                    ?>
                    </td>
                    <td>
                        <a href = "<?php echo $siteUrl.'/item/index/'.$comi["item_id"] ?>"> <?php echo $comi["title"] ?></a>
                    </td>
                </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </body>
<style type="text/css" media="all">
    table{
        width:100%;
        border-spacing:0;
        border-color:#fff;
    }
    .oper{
        float:right;
    }
    td span{
        margin-right:20px;
    }
</style>
</html>
