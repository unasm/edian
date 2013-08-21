<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style type="text/css">
        table{
            table-layout: fixed;
            width: 100%;
            border-top: 1px solid #ccc;
            text-align:center;
        }
        a{
                text-decoration:none;
        }
        .mail-box th{
            font-size: 20px;
            color: #4bbdfd;
            border-bottom: 1px solid #ccc;
        }

        .mail-box td{
            border-bottom: 1px solid #ccc;
        }
        .user,.who{
            width: 55px;
        }
        .action{
                width:75px;
        }
        .userName{
            width:120px;
        }
        </style>

    </head>
        <!--  S - body -->
    <body>
    <table cellspacing="0" class="mail-box">
        <tr>
            <th class="user">用户id</th>
            <th class = "who">身份</th>
            <th class = "userName">用户名</th>
            <th >详细</th>
            <th class = "who">状态</th>
            <th class = "action">操作</th>
        </tr>
<?php
    $len = count($userall);
?>
        <?php for($i = $len-1;$i >=0;$i--):?>
<?php
    $temp = $userall[$i];
?>
        <tr>
            <td class="user"><?php echo $temp["user_id"]?></td>
            <td class = "who">
<?php
    if($temp["user_type"] == $SELLER){
        echo "<span style = 'color:green'>商店</span>";
    }else if($temp["user_type"] == $BUYER){
        echo "买家";
    }else if($temp["user_type"] == $ADMIN){
        echo "<span style = 'color:red'>管理员</span>";
    }
?>
           </td>
            <td class="userName">
            <?php
               echo $temp["user_name"];
            ?>
           </td>
            <td >
<p>
            联系方式: <?php echo $temp["contract1"] ?>
</p>
            <?php
                if($temp["contract2"]){
                    echo "<p>QQ:".$temp["contract2"]."</p>";
                }
                if($temp["addr"]){
                    echo "<p>地址:".$temp["addr"]."</p>";
                }
                if($temp["email"]){
                    echo "<p>邮箱:".$temp["email"]."</p>";
                }
                if($temp["work"]){
                    echo "<p>经营范围:".$temp["work"]."</p>";
                }
            ?>
            <p>注册时间: <?php echo $temp["reg_time"] ?></p>
            </td>
            <td class = "who">
                <?php
                    if ($temp["block"]) {
                            "冻结中..";
                    }else{
                        echo "正常";
                    }
                ?>
            </td>
            <td class="action">
                <a href="<?php echo site_url("bg/userlist/userDel")."/".$temp["user_id"]?>">删除</a>
                |<a href="<?php echo site_url("bg/userlist/userBlock")."/".$temp["user_id"]?>">冻结</a>
            </td>
        </tr>
    <?php endfor?>
    </table>
    </body>
        <!--  E - body -->
</html>
