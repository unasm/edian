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
        $mk=mkdir('dtulog');
        var_dump($mk);
        //或者绝对路径文件名，例如COMWAY云打印的PHP空间路径：/home/vhosts/comway.freetzi.com/dtulog/123
        $filenum = @fopen("dtulog/123", 'w');
        var_dump($filenum);
        @fputs($filenum,"123123\n");
        fclose($filenum);
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
                        "\n\n";
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
        $client->changeurl();
    }
    public function path()
    {
        foreach ($_SERVER as $idx => $val) {
            echo $idx."=>".$val."<br/>";
        }
    }
    public function receive(){
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
