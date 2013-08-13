<?php
require_once 'dsprint.class.php';
require_once 'dsconfig.class.php';
/*************************************************************************
    > File Name :     ../controllers/order.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-29 10:06:13
 ************************************************************************/
/*
 * 关于下单，是这么处理的，因为打印机的滞后性和不确定性，现在决定在用户下单的同时，发起两个http请求
 * 一个负责向数据库添加数据，完成后修改为完成下单，之后setPrint 完成打印的功能，完成状态为订单打印完毕,发货中
 */
class Order extends My_Controller{
    var $user_id,$user_name;
    function __construct(){
        parent::__construct();
        $this->load->model("morder");
        $this->load->model("user");
        $this->user_id = $this->user_id_get();
    }
    public function index($ajax = 0)
    {
        //同时对应ajax请求和页面请求两种，由ajax控制
        //这个，是浏览购物车的时候的列表页面，要和淘宝京东很像，但是不能点两次，一个页面，将价格，送货地址之类的全部搞定，不要设置推荐，
        //这个时候，就让用户安静的，无打扰的，迅速的下单，我们方便收钱
        //备注的信息，按照店家进行分组,每组一个
        if(!$this->user_id){
            if($ajax){
                echo json_encode(0);
            }else{
                $this->nologin(site_url()."/order/index");
            }
            return;
        }
        $data["cart"] = $this->morder->getCart($this->user_id);
        $this->load->model("mitem");
        $seller = Array();
        if($data["cart"]){
            for ($i = 0,$len = count($data["cart"]); $i < $len; $i++) {
                /**************分解info，得到其中的各种信息****************/
                $cart = $data["cart"][$i];//保存起来，方便更快的查找
                $seller[$i] = $cart["seller"];//这个操作是为下面的排序进行准备
                $temp = $cart["info"];//对info的的风格
                $data["cart"][$i]["info"] = $cart["info"];
                /************取得卖家的名字**************************/
                $data["cart"][$i]["selinf"] = $this->user->getPubById($cart["seller"]);
                /****搜索现在商品的价格 图片和库存,用于显示，而非之前保存的,一旦下单完成，这些信息就固定了**************/
                $data["cart"][$i]["item"] = $this->mitem->getOrder($cart["item_id"]);
                /******************/
            }
            array_multisort($seller,SORT_NUMERIC,$data["cart"]);//对店家进行排序,方便分组
            $len = count($data["cart"]);
        }
        $data["buyer"] = $this->addrDecode($this->user->ordaddr($this->user_id));
        if($ajax){
            echo json_encode($data);
        }else{
            $this->load->view("order",$data);
        }
    }
    private function formCart($data)
    {
        //就算是为买家准备的，早晚也需要另一个页面,历史订单
    }
    private function addrDecode($buyer)
    {
        $res = Array();
        //对地址的解码，对之前定义的规则的反解释
        $tmp = explode("&",$buyer["addr"]);
        $cntAddr = 0;
        for($i = 0,$length = count($tmp);$i < $length; $i++){
    //这里的规则很重要，因为将来解地址的时候，也是必须遵守同样的规则
            if($tmp[$i] == "") continue;
            $now = explode("|",$tmp[$i]);
            $len = count($now);
            if(($i == 0) && ($len == 1)){
                $res["0"]["phone"] = $buyer["contract1"];
                $res[0]["addr"] = $now[0];
                $res[0]["name"] = $this->session->userdata("user_name");
                $cntAddr++;
            }else if($len == 3){
                $res[$cntAddr]["phone"] = $now[1];
                $res[$cntAddr]["addr"] = $now[2];
                $res[$cntAddr]["name"] = $now[0];
                $cntAddr++;
            }
        }
        return $res;
    }
    private function nologin($url)
    {
        $data["url"] = $url;
        $this->load->view("login",$data);
    }
    public function add($itemId){
        //这里更多对应的应该是ajax请求，可以的话，设置成双重的,因为只有在具体页面或者是列表页才可以加入购物车，总之，不会在这个页面的index加入，不会通过具体页面加入
        //加入购物车
        $res["flag"] = 0;
        if(!$this->user_id){
            $res["atten"] = "请首先登录，或手机验证后下单";
            echo json_encode($res);
            return;
        }
        $this->load->model("mitem");
        $data = $this->mitem->getMaster($itemId);//查找当前的id信息,这个等这是下单的时候再说
        if(!$data){
            $res["atten"] = "没有找到该商品";
            echo json_encode($res);
            return;
        }
        $data["info"] = $this->input->post("info");//这里的info是款式信息,这些和备注混合在一起,他们就是备注
        $data["orderNum"] = $this->input->post("buyNum");//数据信息涉及到对比和倍乘，比较重要
        $data["price"] = $this->input->post("price");
        //对比下订单的数目和库存的关系
        //算了，这点没有意义，因为如果加上信息的话，就会分得很细，只是比较总的库存没有太大意义，看店家处理吧
        //$data["info"] = $data["title"].";".$data["img"].";".$data["price"].";".$data["orderNum"].";".$data["info"];
        //$data["info"] = $data["orderNum"]."&".$data["info"]."&".$data["price"];
        $data["itemId"] = $itemId;
        $data["ordor"] = $this->user_id;
        $id = $this->morder->insert($data);
        if($id){
            $res["flag"] = $id;
            echo json_encode($res);
        }else{
            $res["atten"] = "加入购物车失败";
            echo json_encode($res);
        }
    }
    public function del($orderId  = -1){
        if($orderId == -1){
            echo json_encode(0);
        }
        if(!$this->user_id){
            echo json_encode(0);
            //将来要不要报一个没有登录呢？不过，可以没有登录删除的，应该是黑客吧
        }
        $flag = $this->morder->setFive($orderId,$this->user_id);
        //并不真正删除，而是设置成5，表示假死吧，将来分析数据用
        if($flag) echo json_encode(1);
        else echo json_encode(0);
    }
    public function addr()
    {
        //处理上传的地址信息,通过ajax提交
        $res["flag"] = 0;
        if(!$this->user_id){
            //其实没有什么意义了，因为是ajax提交的
            $res["atten"] = "请首先登录";
            echo json_encode($res);
            return;
        }
        $phone = $this->input->post("phone");
        $addr = $this->input->post("addr");
        $geter = $this->input->post("geter");
        $ans = "&".$geter."|".$phone."|".$addr;
        if($this->user->appaddr($ans,$this->user_id)){
            $res["flag"] = 1;
            $res["atten"] = $ans;
        }
        echo json_encode($res);
    }
    private function showArr($array)
    {
        foreach($array as $index => $value){
            var_dump($index);
            echo "   =>   ";
            var_dump($value);
            echo "<br>";
        }
    }
    public function set($ajax  = 0)
    {
        $res["flag"]  = 0;
        if(!$this->user_id){
            $res["atten"] = "没有登录";
        }
        $addr = trim($this->input->post("addr"));
        $orderId = trim($this->input->post("orderId"));
        $buyNum = trim($this->input->post("buyNums"));
        $more = trim($this->input->post("more"));
        $orderId = explode("&",$orderId);
        $buyNum = explode("&",$buyNum);
        $more = explode("&",$more);
        $failed = 0;
        for($i = 0,$len = count($orderId);$i < $len;$i ++){
            $id = $orderId[$i];
            $more[$i] = addslashes($more[$i]);
            $info = $this->morder->getChange($id);
            if($info){
                //一般情况下都是有
                $temp = explode("&",$info["info"]);
                $info = $buyNum[$i]."&".$temp[1]."&".$temp[2]."&".$more[$i];
                $flag = $this->morder->setOrder($addr,$id,$info);
                if(!$flag){
                    $failed = 1;
                    $res["atten"] = "有商品下单失败";
                    //这个情况必须进行了解,坚决报告管理员
                }
            }
        }
        if($failed){
            if($ajax)echo json_encode($res);
            else echo $res["atten"];
        }else{
            if($ajax){
                $res["flag"] = 1;
                echo json_encode($res);
            }
            else{
                echo "订单成功";
            }
        }
    }
    public function setPrint()
    {
        $res["flag"]  = 0;
        //$choseState = $this->input->post("buyNum");
        if(!$this->user_id){
            $res["atten"] = "没有登录";
            echo json_encode($res);
            return false;
        }
        header("Content-Type:text/html;charset=UTF-8");
        $addr = trim($this->input->post("addr"));
        $orderId = trim($this->input->post("orderId"));
        $buyNum = trim($this->input->post("buyNums"));
        $more = trim($this->input->post("more"));
        $orderId = explode("&",$orderId);
        $buyNum = explode("&",$buyNum);
        $more = explode("&",$more);
        $failed = 0;
        //下单的时候，格式控制，只发送一次就好，不然的会重复下单，也会多打印的
        $ordInfo = Array();
        $seller = Array();
        $cnt = 0;
        for($i = 0,$len = count($orderId);$i < $len;$i++){
            $id = $orderId[$i];//将所有的进行打印
            //$more[$i] = addslashes($more[$i]);
            $ordInfo[$cnt]= $this->morder->getChange($id);
            if($ordInfo[$cnt]){
                //一般情况下都是有
                $temp = explode("&",$ordInfo[$cnt]["info"]);
                $seller[$cnt]["seller"] = $ordInfo[$cnt]["seller"];
                $ordInfo[$cnt]["buyNum"] = $buyNum[$i];
                $ordInfo[$cnt]["more"] = $more[$i];
                $ordInfo[$cnt]["price"] = $temp[2];
                $ordInfo[$cnt]["info"] = $temp[1];
                $cnt++;
            }else{
                //向管理员报告，检查原因和结果,目前检测到重复下单
            }
        }
        //要先放到数据库之中，然后才打印，之所以是这样，因为数据库可靠性更高，打印成功之后，再设置成为全部发货状态
        $this->load->model("mitem");
        $quoto = "e点工作室竭诚为您服务";
        $tim = date("Y-m-d H:i:s");
        $user = $this->getUser($addr);//取得用户的信息，$user中有名字，地址和联系方式，
        for($i = 0;$i < $cnt;){
            $nowSeller = $ordInfo[$i]["seller"];
            $list = "";
            $cntAl = 0;
            while(($i < $cnt) && ($ordInfo[$i]["seller"] == $nowSeller)){
                $temp = $ordInfo[$i];
                $title = $this->mitem->getTitle($temp["item_id"]);
                if($title){
                    $inf = $this->spInf($temp["info"]);
                    $list.=$title["title"].$inf." ".$temp["buyNum"]." x ".$temp["price"]."\n";
                    $cntAl +=$temp["buyNum"]*$temp["price"];
                    if($temp["more"]){
                        $list.="\t备注:".$temp["more"]."\n";
                    }
                }else{
                    //呵呵，告诉管理员
                }
                $i++;
            }
            //获取店家的名字
            $sellerName = $this->user->getNameById($temp["seller"]);
            $text = "\n顾客: ".$user["name"]."\n";
            $text.= "手机号: ".$user["phone"]."\n";
            $text.= "地址: ".$user["addr"]."\n";
            $text.= "店家: ".$sellerName["user_name"]."\n";
            $text.="清单:\n".$list;
            $text.="合计: \t￥\x1B\x21\x08".$cntAl."\x1B\x21\x00(元)\n";
            $text.="下单时间: ".$tim."\n";
            $text.="\t".$quoto."\n\n\n\n";
        //    echo $text;
            $client = new DsPrintSend('1e13cb1c5281c812','2050');
             $client->printtxt('308001300434',$text,30,"\x1B\x76");
        }
    }
    private function getUser($adIdx)
    {
        //通过用户的id取得用户下单地址的函数
        $user = $this->user->ordaddr($this->user_id);
        $user = $this->addrDecode($user);
        return $user[$adIdx];
        //获取用户的地址，名字和联系方式的函数
    }
    private function spInf($info)
    {
        //这个函数是将info的具体解析出来，然后供打印使用的，目前的格式为inf|inf 的格式
        $res = "";
        $info = explode("|",$info);
        for($i = 0,$len = count($info);$i < $len; $i++){
            $res.="(".$info[$i].")";
        }
        return $res;
    }
    public function ontime()
    {
        //为买家量身定做的
        if(!$this->user_id){
            $this->nologin(site_url()."/order/ontime");
            return;
        }
        $data["order"] = $this->morder->getOntime($this->user_id);
        //$this->showArr($data["order"]);
        $data["order"] = $this->formData($data["order"]);
        $this->load->view("onTimeOrder",$data);
    }
    public function hist()
    {
        if(!$this->user_id){
            $this->nologin(site_url()."/order/ontime");
            return;
        }
        $data["order"] = $this->morder->hist($this->user_id);
        if($data["order"])
            $data["order"] = $this->histForm($data["order"]);
        $this->load->view("histOrder",$data);
    }
    private function histForm($arr)
    {
        //历史的操作和即时的操作不同，
        $ordor = Array();
        $this->load->model("mitem");
        //将info 格式化，组成数组，返回，
        for($i = 0,$len = count($arr);$i < $len ;$i++){
            $temp = $arr[$i];
            $now = $this->mitem->getTitle($temp["item_id"]);
            if($now){
                $now["ordorInfo"] = $this->formOrdor($temp["addr"],$temp["ordor"]);//获得买家的信息
            }else{
                $now['title'] = "该商品已经下架";
                $arr[$i]["item_id"] = "-1";
            }
            $arr[$i] = array_merge($arr[$i],$now);
        }
        return $arr;
    }
    private function formData($arr)
    {
        $ordor = Array();
        $this->load->model("mitem");
        //将info 格式化，组成数组，返回，
        for($i = 0,$len = count($arr);$i < $len ;$i++){
            $temp = $arr[$i];
            $now = $this->mitem->getTitle($temp["item_id"]);
            //$now["info"] = $this->formInfo($temp["info"]);//将info消息分解整理
            $now["ordorInfo"] = $this->formOrdor($temp["addr"],$temp["ordor"]);//获得买家的信息
            $arr[$i] = array_merge($arr[$i],$now);
            $ordor[$i] = $temp["ordor"];
        }
        array_multisort($ordor,SORT_NUMERIC,$arr);//对买家进行排序
        return $arr;
    }
    private function formOrdor($addrNum,$userId)
    {
        $res = Array();
        //查找下订单的人的信息，地址，电话
        $inf = $this->user->ordaddr($userId);
        $temp = $this->addrDecode($inf);//用户保存的地址id中记录的就是addrdecode 生成的地址列表中的下标号码
        return $temp[0];
    }
    function change(){
        require_once 'dsprint.class.php';
        require_once $_SERVER["DOCUMENT_ROOT"].'/dsconfig.class.php';
        $client = new DsPrintSend('1e13cb1c5281c812','2050');
        echo $client->changeurl();
    }
}
?>
