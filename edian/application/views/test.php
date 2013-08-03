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
<body class = "clearfix" >
<table border = "1">
    <tr>
        <td>
            属性A
        </td>
        <td>
        <table >
            <tr >
                <th class = "attrA">属性 </th>
                <th>库存量</th>
                <th>价格</th>
            </tr>
        </table>
    </tr>
    <tr>
        <td>
            A
        </td>
        <td>
            <table >
                <tr>
                    <td class = "attrA">B </td>
                    <td class = "tdNum">123</td>
                    <td class = "tdNum">1323</td>
                </tr>
                <tr>
                    <td class = "attrA">B </td>
                    <td class = "tdNum">123</td>
                    <td class = "tdNum">1323</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            A
        </td>
        <td>
            <table >
                <tr >
                    <td class = "attrA">B </td>
                    <td class = "tdNum">123</td>
                    <td class = "tdNum">1323</td>
                </tr>
                <tr>
                    <td class = "attrA">B </td>
                    <td class = "tdNum">123</td>
                    <td class = "tdNum">1323</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
