<!DOCTYPE html>
<?php
    $baseUrl = base_url();
    $siteUrl = site_url();
?>
<html lang = "en">
<head>
    <meta http-equiv = "content-type" content = "text/html;charset = utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="<?php echo $baseUrl.'css/test.css' ?>" type="text/css" media="all" />

    <base href="<?php echo base_url()?>" >
<body>
    <ul id = "order">
        <li> <input type="text"  value="10" /></li>
    </ul>
    <input type="button" name="test" id="test" value = "点击" />
</body>
    <script type="text/javascript" charset="utf-8" src = " <?php echo $baseUrl.'js/jquery.js' ?>"></script>
    <script type="text/javascript" charset="utf-8">
    order = $("#order");
    $("#test").click(function(){
        var num = 0;
        order.append("<li> <input type='text' value='10' /></li>");
        var input = order.find("input");
        for(var i = input.length - 1;i >=0 ;i --){
            console.log($(input[i]).val());
            num += parseInt($(input[i]).val());
        }
        console.log(num);
    })
    </script>
</html>
