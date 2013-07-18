<!DOCTYPE html>
<html lang = "en">
<head>
    <meta http-equiv = "content-type" content = "text/html;charset = utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.8 ,maximum-scale= 1.2 user-scalable=yes" />
    <title><?php echo $title?></title>
<?php
    $baseUrl = base_url();
?>
    <base href="<?php echo base_url()?>" >
    <link rel="stylesheet" href="<?php echo base_url('css/bgItemAdd.css')?>" type="text/css" charset="UTF-8">
    <link rel="icon" href="favicon.ico">
<script type="text/javascript" src = "<?php echo base_url('js/jquery.js')?>"> </script>
<script type="text/javascript" src = "<?php echo base_url('js/cookie.js')?>"> </script>
<script type="text/javascript" >
    var admin = "<?php echo $this->adminMail?>";
    var dir = <?php  echo json_encode($dir)?>;
</script>
<body class = "clearfix">
    <div id="content" class="contSpace">
        <form action="<?php echo site_url('write/cadd')?>" method="post" enctype = "multipart/form-data" accept-charset = "utf-8">
        <table border="0">
            <p class = "part" id = "part">
                    <span class = "item">类别<span class = "X">*</span>:</span>
<?php
    $count = 1;
?>
<!--js控制选择-->
            <input type = "radio" name = "part" value = "1" checked = "checked"><span>外卖</span>
            <?php foreach ($dir as $key => $value):?>
                <input type="radio" name="part" value="<?php echo $count++?>" <?php if($userType == 2){ if($key == "二手交易") echo "checked='ehecked'"; else echo "disabled";}else if($key == "食品") echo "checked='checked'"?>/><span><?php echo $key?></span>
            <?php endforeach?>
                <input type="radio" name="part" value="<?php echo $count?>" <?php if($userType == 2) echo "disabled"?>/><span>其他</span>
            </p>
            <p>
                <span class = "item">商品价格<span>*</span>:(元)</span><input type="text" name="price" value=""/><span id = "patten"></span>
                <span class = "item">促销价格:(元)</span><input type="text" name="sale" value=""/><span id = "patten"></span>
            </p>
            <p >
                <span class = "item">商品主图<span>*</span>:</span><input type="file" name="userfile" size = "14"/>
                <span id = "imgAtten">请用800*800以下图片,超过标准会压缩</span>
            </p>

            <p class = "label">
                <span class = "item">关键词<span>*</span></span>
                <input type="text" class = "title" name="key" id = "key" value=""/>
                <label for="key">查找更准确,请空格断开如:水果 苹果 青苹果 送货</span></label>
            </p>
            <p><span class = "item">商品属性:</span><span>可以在下面灰色框添加至多两组属性,如颜色,重量,规格,口味等，右边添加黄色,绿色,或者是选用图片 </span></p>
            <div id = "pro" class = "pro">
                <div class="proBl clearfix">
                    <ul class = "proK">
                        <li><input type = "text" name = "proKey"></li>
                    </ul>
                    <ul class = "proVal">
                    <!--将来添加js禁止标点哦-->
                        <li class = "liVal"><input type = "text" name = "proVal"></li>
                    </ul>
                    <ul class = "ulPi">
                        <li>
                            <span class = "choseImg" href = "javascript:javascript">选择图片</span>
                            <span class = "uploadImg" href = "javascript:javascript">上传图片</span>
                            <img class = "chosedImg" src = ""/>
                        </li>
                    </ul>
                </div>
            </div>
            <div id = "ifc" style = "display:none">
                <iframe id = "uploadImg"  name = "img" src = " <?php echo site_url('chome/upload') ?>"></iframe>
            </div>
            <div id="ichose" style = "display:none">
                <div>
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/real.png">
                    <img src = "http://www.edian.cn/upload/191374150239.jpg">
                </div>
            </div>
            <p>
                <span class = "item">库存量<span >*</span>:</span>
                <input type = "text" name = "storeNum">
            </p>
            <div id = "oimg">
                <p><span class = "item">其他图片</span><span class = "atten">请不要超过6张图片</span></p>
                <div class = "moreImg">
                    <a class = "choseImg" href = "javascript:javascript">选择图片</a>
                    <input type = "file" name = "proImg">
                </div>
            </div>
            <p class = "clearfix label">
                <span class = "item">标题<span>*</span></span>
                <input type="text" name="title" id = "title" class = "title" />
                <label for = "title">请用简短的描述商品,尽量包含名称和特点，尽量50字以内哦</label>
<!----------------title太差劲了。,学习以下taobao了-------->
            </p>
            <tr id = "tcont">
                <td><textarea name="cont" id = "cont" style = "width:100%"></textarea></td>
            </tr>
        </table>
         <input type="submit" name = "sub" class = "button" value="发表" />
        </form>
    </div>
<script type="text/javascript" src = "<?php echo base_url('js/xheditor.min.js')?>"></script>
<script type="text/javascript" src = "<?php echo base_url('js/zh-cn.js')?>"></script>

<script type="text/javascript" >
var site_url = "<?php echo site_url()?>";
var user_name="<?php echo $this->session->userdata('user_name')?>";
var user_id="<?php echo $this->session->userdata('user_id')?>";
var PASSWD = "<?php echo $this->session->userdata("passwd")?>";
$(pageInit);
function pageInit()
{
    $.extend(XHEDITOR.settings,{shortcuts:{'ctrl+enter':submitForm}});
    $('#cont').xheditor({upImgUrl:site_url+"/write/imgAns?immediate=1",upImgExt:"jpg,jpeg,gif,png"});
}
function insertUpload(arrMsg)
{
    var i,msg;
    for(i=0;i<arrMsg.length;i++)
    {
        msg=arrMsg[i];
        $("#uploadList").append('<option value="'+msg.id+'">'+msg.localname+'</option>');
    }
}
function submitForm(){$('#frmDemo').submit();}
</script>
<script type="text/javascript" src = "<?php echo base_url('js/mBgItemAdd.js')?>"> </script>
</body>
</html>
