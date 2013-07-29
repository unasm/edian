<?php
/*************************************************************************
    > File Name :     ../controllers/order.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-29 10:06:13
 ************************************************************************/
class Order extends My_Controller{
    var $user_id,$user_name;
    function __construct(){
        parent::__construct();
        $this->load->model("morder");
    }
    public function index()
    {
        //这个，是浏览购物车的时候的列表页面，要和淘宝京东很像，但是不能点两次，一个页面，将价格，送货地址之类的全部搞定，不要设置推荐，
        //这个时候，就让用户安静的，无打扰的，迅速的下单，我们方便收钱
        //备注的信息，按照店家进行分组,每组一个
    }
    public function add($itemId){
        //这里更多对应的应该是ajax请求，可以的话，设置成双重的,因为只有在具体页面或者是列表页才可以加入购物车，总之，不会在这个页面的index加入，不会通过具体页面加入
        $info = $this->input->post("info");//这里的info是款式信息,这些和备注混合在一起,他们就是备注
        $orderNum = $this->input->post("num");//数据信息涉及到对比和倍乘，比较重要
        $this->load->model("mitem");
        $item = $this->mitem->getOrder($itemId);//查找当前的id信息
        //对比下订单的数目和库存的关系
        if($item["store_num"]<$orderNum){
            $orderNum = $item["store_num"];//修改，并提供反馈
            $res["atten"] = "订单数大于库存，已经将订单数目修改成为库存数";
        }
    }
}
?>
