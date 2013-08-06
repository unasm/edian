<?php
/*************************************************************************
    > File Name :     ../controllers/order.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-29 10:06:13
 ************************************************************************/
/*
 * 追求速度中，很多数据就没有自己检查，很多符号是不允许输入的，留到后来做吧,分号|都是危险符号
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
        for ($i = 0,$len = count($data["cart"]); $i < $len; $i++) {
            /**************分解info，得到其中的各种信息****************/
            $cart = $data["cart"][$i];//保存起来，方便更快的查找
            $seller[$i] = $cart["seller"];//这个操作是为下面的排序进行准备
            $temp = explode(";",$cart["info"]);
            for($j = count($temp)-1;$j >= 0;$j--){
                $temp[$j] = explode("|",$temp[$j]);
            }
            $data["cart"][$i]["info"] = $temp;
            /************取得卖家的名字**************************/
            $data["cart"][$i]["selinf"] = $this->user->getPubById($cart["seller"]);
            /****搜索现在商品的价格 图片和库存,用于显示，而非之前保存的,一旦下单完成，这些信息就固定了**************/
            $data["cart"][$i]["item"] = $this->mitem->getOrder($cart["item_id"]);
            /******************/
        }
        array_multisort($seller,SORT_NUMERIC,$data["cart"]);//对店家进行排序,方便分组
        $len = count($data["cart"]);
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
                $res[$cntAddr]["phone"] = $buyer["contract1"];
                $res[$cntAddr]["addr"] = $now[0];
                $res[$cntAddr]["name"] = $this->session->userdata("user_name");
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
        $data["info"] = $data["orderNum"].";".$data["info"].";".$data["price"];
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
        //$choseState = $this->input->post("buyNum");
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
                $temp = explode(";",$info["info"]);
                $info = $buyNum[$i]."&".$temp[1]."&".$temp[2]."&".$more[$i];
                $flag = $this->morder->setOrder($addr,$id,$info);
                if(!$flag){
                    $failed = 1;
                    $res["atten"] = "有商品下单失败";
                }
            }
        }
        if($failed){
            if($ajax)
            echo json_encode($res);
            else {
                echo $res["atten"];
            }
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
        $this->load->view("onTimeOrder");
    }
    private function formData($arr)
    {
        $ordor = Array();
        $this->load->model("mitem");
        //将info 格式化，组成数组，返回，
        for($i = 0,$len = count($arr);$i < $len ;$i++){
            $temp = $arr[$i];
            $now = $this->mitem->getTitle($temp["id"]);
            $now["info"] = $this->formInfo($temp["info"]);//将info消息分解整理
            $now["ordorInfo"] = $this->formOrdor($temp["addr"],$temp["ordor"]);//获得买家的信息
            $arr[$i] = array_merge($arr[$i],$now);
            $ordor[$i] = $temp["ordor"];
        }
        array_multisort($ordor,SORT_NUMERIC,$arr);//对店家进行排序,方便分组
        $this->showArr($arr);
        return $arr;
    }
    private function formOrdor($addrNum,$userId)
    {
        $res = Array();
        //查找下订单的人的信息，地址，电话
        $inf = $this->user->ordaddr($userId);
        $temp = explode("&",$inf["addr"]);
        if($addrNum == 0){
            $res["addr"] =  $temp[0];
            $res["user_name"] = $inf["user_name"];
            $res["phone"] = $inf["contract1"];
        }else{
            $temp = explode("|",$temp[$addrNum]);
            $res["addr"] = $temp[2];
            $res["user_name"] = $temp[0];
            $res["phone"] = $temp[1];
        }
        return $res;
    }
    private function formInfo($str)
    {
        $temp = explode("&",$str);
        $res["orderNum"] = $temp[0];
        $res["more"] =  $temp[3];
        $res["price"] = $temp[2];
        $res["info"] = "";
        $temp = explode("|",$temp[1]);
        for($i = 0,$len = count($temp);$i < $len ;$i++){
            $now = explode(":",$temp[$i]);
            $res["info"] .= "(".$now[0].")";
        }
        return $res;
    }
}
?>
