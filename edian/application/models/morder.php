<?php
/*************************************************************************
 * 这里记录的是订单的数目，保存了订单的信息
    > File Name :     models/order.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-17 12:47:45
 ************************************************************************/
/*
 * 始终无法打印图片，所以最好添加图片的同时添加文字备注,后台还需要优化
 * table name ord
 * //之所以取这个名字，是因为order没有办法使用，然后测试的时候，就用了这个名字，不小心成功了，就懒得换了
 * id 订单的号码
 * addr 送(收)货地址，优先选择用户的地址，但是可以修改,然后把新的地址，放到用户地址中合并，订单的单次地址就只保存id，地址的id
 * addr的下标为controllers/order/addrdecode函数生成数组的的下标
 info    通过一定的格式保存起来的商品的价格，id，和百字以内的备注，由特殊的分割符号进行分割,属性的挑选,图片,价格,记录各种交易信息的，各种不重要（检索），但是有比较关心的
 //info 的格式为
 //    final     orderNum & info & price & more
 //    state 0 ,ordernum & price & info;
 //    info 为选购的属性，more 是说明和备注
 //不对，保留价格毫无意义，因为要按照最新的价格进行购买，不过，也算作为一种对比了吧，提示,不做修改了吧
 //各大选则之间用;内部则使用|划分,最后的info 是用户添加的备注
seller 卖家的id，这个是为了方便检索,不然通过item_id,然后找到卖家的话，太慢
 item_id 购买的商品货号
 关于退货中，几个商品中，接受几个商品的状态，退几个商品，之后在处理
 time 下订单的时间
 state 状态：0，尚在购物车中，下看后尚未处理1,要求发货,发货中2，已经收货3，退货4, 删除(暂时不真正删除，算是作为数据研究吧)5
 付款方式：(目前必然是货到付款，之后就再说吧,这个，目前没有为它设置字段，放到info中去吧
 ordor 下订单的人
 所谓的购物车，就是order中state为0的东西
 */
/**
 * 这里集中了所有的order的操作，并且order这个表，只对应这个class的操作
 */
class Morder extends Ci_Model
{
    var $user_id,$user_name;
    /**
     * 涉及到订单的话，必须有个名字，必须登录，通过手机号码，短信验证码也可以，不过那个时候，手机号码就是名字
     */
    function __construct()
    {
        parent::__construct();
    }
    public function insert($data)
    {
        //四个东西最为关键，明细，买家，卖家，商品货号
        $sql = "insert into ord(info,seller,item_id,ordor) values('$data[info]','$data[author_id]','$data[itemId]','$data[ordor]')";
        $res = $this->db->query($sql);
        if($res){
            $res = $this->db->query("select last_insert_id()");
            $res = $res->result_array();
            return $res[0]["last_insert_id()"];
        }
        return false;
    }
    public function getCart($userId){
        //取得所有的cart中的商品
        $res = $this->db->query("select id,info,item_id,seller from ord where ordor = $userId && state = 0");
        return $res->result_array();
    }
    public function delete($ordor)
    {
        //删除只能由用户自己，管理员有管理员的方法
        return $this->db->query("delete from ord where order = $order");
    }
    public function setFive($id,$userId)
    {
        return $this->db->query("update ord set state = 5 where id = $id && ordor = $userId");
    }
    public function setOrder($addr,$id,$info)
    {
        $sql = "update ord set  state = 1,info = '$info',addr = '$addr' where id = $id";
        return $this->db->query($sql);
    }
    public function getChange($id)
    {
        //查找下单时候，要修改的内容,目前仅为order set 效力
        $res = $this->db->query("select info from ord where id = $id && state = 0");
        $res = $res->result_array();
        if(count($res))return $res[0];
        return false;
    }
    public function getOntime($userId){
        //需要即时处理的订单
        $res = $this->db->query("select id,addr,info,item_id,time,ordor from ord where state = 1 && seller = $userId");
        $res = $res->result_array();
        return $res;
    }
    public function hist($userId)
    {
        //历史上所有的订单，暂时不分页
        $res = $this->db->query("select id,addr,info,item_id,time,ordor from ord where  seller = $userId && state ");
        $res = $res->result_array();
        return $res;
    }
}
?>
