<?php
//require_once 'print.php';
require_once 'dsprint.class.php';
require_once 'dsconfig.class.php';
class Test extends MY_Controller{
    var  $user_id="",$partmap;
    function __construct(){
        parent::__construct();
        $this->user_id = $this->user_id_get();
    }
    function index(){
        //require_once 'dsprint.class.php';
        //require_once base_url("dsprint.class.php");
        //utf-8格式
        header("Content-Type:text/html;charset=UTF-8");

        //测试打印
        $this->testSendFreeMessage();

        //测试更改URL
        //$this->testChangeURL();
        //die;
    }
    function testSendFreeMessage(){
        /*
        $freeTxt = "\n**订餐网\n" .
                        "订单时间：".date("Y-m-d H:i:s")."\n".
                        "订单号码：112233445566\n" .
                        "送餐员："."李**"."\n" .
                        "\x1B\x21\x08".#打印机粗体指令
                        "姓名："."冯先生"."\n" .
                        "电话："."1391111111"."\n" .
                        "发货店面："."永和豆浆 1店 "."\n" .
                        "送餐地址："."测试地址456"."\n" .
                        "单位："."测试地址123"."\n" .
                        "会员积分："."1210"."\n" .
                        "特殊要求："."不要红烧肉 带瓶可乐"."\n" .
                        "\x1B\x21\x00".#取消打印机粗体指令
                        "            "."订餐明细\n".#每行16个汉字，32个字符，可以以此来判断空行
                        "商品名称"."        "." 单价"." 份数"."  合计"."\n" .
                        "土豆丝"."          "."    8"."    2"."   16"."\n" .
                        "\n" .
                        "\x1B\x21\x10".  #打印机汉字高度放大2倍指令
                        "支付方式："."现金/积分消费/签单"."\n" .
                        "本次消费："."50.00"."\n" .
                        "本次积分："."50"."\n" .
                        "\x1B\x21\x00".                     #取消打印机粗体
                        "订餐电话："."11111111"."\n" .
                        "订餐QQ："."11111111"."\n" .
                        "营业时间："."7:00---20:00"."\n" .
                        "365天天天为你服务"."\n" .
                        "\n" .
                        "------------------------------\n" .
                        "订单号码：111111\n" .
                        "       请您评价我们的服务"."\n".
                        "非常满意|基本满意|不满意|"."\n"."\n"."\n".
                        "客户签名_______________\n" .
                        "\n\n\n";                       #多走三行，便于撕纸
        */

        $freeTxt = "\ne点工作室竭诚为您服务\n" .
                        "订单时间：".date("Y-m-d H:i:s")."\n".
                        "订单号码：112233445566\n" .
                        "顾客："."豆家敏"."\n" .
                        "\x1B\x21\x08".#打印机粗体指令
                        "总价："."￥12.00"."\n" .
                        "菜品："."\t红烧狮子头"."\n" .
                        "\t"."棒打高丽棒子"."\n" .
                        "\t"."预想茄子"."\n" .
                        "\t"."凤姐姐"."\n" .
                        "特殊要求："."狮子头要非洲三岁雄狮子，棒子要打痛"."\n" .
                        "\x1B\x21\x00".  #取消打印机粗体指令
                        "\n\n\n";

        //此处修改为用户的密码以及appid。
        $client = new DsPrintSend('1e13cb1c5281c812','2050');
        //$client = new DsPrintSend('your_password','your_appid');
        //$client = new DsPrintSend();
        //打印字符串，此处修改为用户名下对应的在线的且连接打印机的dtuid。
        echo $client->printtxt('308001300434',$freeTxt,60,"\x1B\x76");
        //echo $client->printtxt('your_dtuid',$freeTxt,60);
        //查询打印机状态
        //echo $client->printtxt('your_dtuid');
    }
    function testChangeURL(){
        $client = new DsPrintSend('1e13cb1c5281c812','2050');
        //更改URL
        echo $client->changeurl();
    }
    public function receive()
    {
        var_dump($receivephp);
        //file_get_contents("php://input") 接收POST原始数据
        $data = file_get_contents("php://input");
        //$errorlog = isset($errorlog)?$errorlog:'';
        if($errorlog)
            file_put_contents($dtupath."errlog.txt", "dsreceive	,data:	".$data.",	data len:".strlen($data)."\n", FILE_APPEND);
        if($data and strlen($data)>36){
            $reqTime = time();
            $re = unpack ('a16mac/a16dtu/Ntime/H*result', $data);
            $dtuid = $re['dtu'];
            if(strlen($dtuid)!=12)
            {
                if($errorlog)
                    file_put_contents($dtupath."errlog.txt", "$reqTime".",dsreceive	,dtu id len(12) error:	".$dtuid."\n", FILE_APPEND);
                return;
            }
            $filename = $dtupath.$dtuid;
            if(!file_exists ($dtupath))
                mkdir($dtupath);
            if($errorlog)
                file_put_contents($dtupath."errlog.txt", "$reqTime".",dsreceive	,filename:	".$filename.",	result:".$re['result']."\n", FILE_APPEND);
            $farray = file($filename);
            $newfp = $farray;
            $lines = count($farray);
            $newfp = '';
            $del = $lines-$dtutmplines;
            for($Tmpa=0;$Tmpa<$lines;$Tmpa++)
            {
                if($Tmpa<$del)
                    continue;
                $newfp.=$farray[$Tmpa];
            }
            $filenum = @fopen($filename, 'w');
            @fputs($filenum,$newfp.$reqTime.",".$re['result']."\n");
            fclose($filenum);
        }
    }
}
?>
