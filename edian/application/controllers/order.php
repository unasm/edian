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
        $this->user_id = $this->user_id_get();
    }
    public function index()
    {
        //这个，是浏览购物车的时候的列表页面，要和淘宝京东很像，但是不能点两次，一个页面，将价格，送货地址之类的全部搞定，不要设置推荐，
        //这个时候，就让用户安静的，无打扰的，迅速的下单，我们方便收钱
        //备注的信息，按照店家进行分组,每组一个
        if(!$this->user_id){
            $this->nologin(site_url()."/order/index");
            return;
        }
        $data["cart"] = $this->morder->getCart($this->user_id);
        $this->load->model("mitem");
        $seller = Array();
        for ($i = 0,$len = count($data["cart"]); $i < $len; $i++) {
            /**************分解info，得到其中的各种信息****************/
            $temp = $data["cart"][$i];
            $seller[$i] = $temp["seller"];//这个操作是为下面的排序进行准备
            $temp = explode(";",$temp["info"]);
            for($j = count($temp)-1;$j >= 0;$j--){
                $temp[$j] = explode("|",$temp[$j]);
            }
            $data["cart"][$i]["info"] = $temp;
            /**************************************/
            /****搜索现在商品的价格 图片和库存**************/
            $data["cart"][$i]["item"] = $this->mitem->getOrder($data["cart"][$i]["item_id"]);
            /******************/
        }
        array_multisort($seller,SORT_NUMERIC,$data["cart"]);//对店家进行排序,方便分组
        $len = count($data["cart"]);
        $this->load->view("order",$data);
    }
    private function nologin($url)
    {
        $data["url"] = $url;
        $this->load->view("login",$data);
    }
    public function add($itemId){
        //这里更多对应的应该是ajax请求，可以的话，设置成双重的,因为只有在具体页面或者是列表页才可以加入购物车，总之，不会在这个页面的index加入，不会通过具体页面加入
        $res["flag"] = 0;
        if(!$this->user_id){
            $res["atten"] = "请首先登录，或手机验证后下单";
            echo json_encode($res);
            return;
        }
        $this->load->model("mitem");
        $data = $this->mitem->getOrder($itemId);//查找当前的id信息
        $data["info"] = $this->input->post("info");//这里的info是款式信息,这些和备注混合在一起,他们就是备注
        $data["orderNum"] = $this->input->post("buyNum");//数据信息涉及到对比和倍乘，比较重要
        //对比下订单的数目和库存的关系
        //算了，这点没有意义，因为如果加上信息的话，就会分得很细，只是比较总的库存没有太大意义，看店家处理吧
        $data["info"] = $data["title"].";".$data["img"].";".$data["price"].";".$data["orderNum"].";".$data["info"];
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
    private function showArr($array)
    {
        foreach($array as $index => $value){
            var_dump($index);
            echo "   =>   ";
            var_dump($value);
            echo "<br>";
        }
    }
}
?>
