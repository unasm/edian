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
    public function sec()
    {
    }
    function index(){
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
        $freeTxt = "\ne点工作室竭诚为您服务\n" .
                        "订单时间：".date("Y-m-d H:i:s")."\n".
                        "订单号码：112233445566\n" .
                        "顾客："."长夜漫漫失眠了"."\n" .
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
        if($client->changeurl()){
            $freeTxt = "\ne点工作室竭诚为您服务\n" .
                            "订单时间：".date("Y-m-d H:i:s")."\n".
                            "订单号码：112233445566\n" .
                            "顾客："."长夜漫漫失眠了"."\n" .
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
            //打印字符串，此处修改为用户名下对应的在线的且连接打印机的dtuid。
            echo $client->printtxt('308001300434',$freeTxt,60,"\x1B\x76");
        }
    }
    public function receive()
    {
    }
}
?>
