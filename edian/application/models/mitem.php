<?php
/*************************************************************************
    > File Name :     ../models/item.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-23 07:34:43
 ************************************************************************/

 /*
  * art_id表明这个行的唯一id
 title，商品信息的标题，也是搜索的主要依据
 content，主要介绍内容
 time，最后的发表时间或者是修改时间
 author_id 发表的人的id
value 通过赞助，评论，浏览添加起来的价值，也是热度的另一称呼
visitor_num 访问者的数目，将来收钱的依据，会增加少量的values
price，商品的价格
img，商品的图片:每件商品或许不止一个图片，所以做成列表的形式，将来通过正则截取,多个图片，会默认首先显示第一个
keyword 关键字，保存格式为苹果;清苹果;分号隔开，关键字为分区的字和用户自己输入的关键字,搜索的时候通过like对比关键字
attr 通过拼成的字符串,格式采用json的格式，表示上平的属性，颜色，分类的,商品编号也在这中间,方便商家查找商品;之所以是这样，是因为这些都是一些无关紧要的因素，不会有人关注这个，不会有人在这里搜索
//promise 承诺，货到付款，七日退货，保证正品，急速发货，赠运费险,送货//目前还没有做，以后做吧
storeNum 库存量，是attr中各个存货量的叠加
judgescore float商品评分：没有必要每次都重新计算一遍吧,加起来，然后除以评论数据就是了
attr的格式为color
                2,2,"颜色","重量",红色:123.jpg,绿色:123.jpg,1kg,3kg|//第一个属性，第二个属性，颜色的个数，重量的个数,方便数据处理
                    [红色,1kg]12,11;
                    [红色,3kg]12,11;
                    [绿色,1kg]12,11
                    [绿色,3kg]12,11
    绿色对应颜色的具体表示，1kg是重量的具体表示，12是存货量,11表示价格
  */
/**
 * 这里的item对应了mysql的item表，集中了item的所有的操作
 */
class Mitem extends Ci_Model
{

    var $num;//每次前端申请的数据条数
     function __construct()
    {
        parent::__construct();
        $this->num = 24;
    }
    public function insert($data)
    {
        $data["title"] = addslashes($data["title"]);
        $data["content"] = addslashes($data["content"]);
        $sql = "insert into item(title,content,time,author_id,value,store_num,price,img,keyword,attr,promise) values('$data[title]','$data[content]',now(),'$data[author_id]','$data[value]','$data[store_num]','$data[price]','$data[img]','$data[keys]','$data[attr]','$data[promise]')";
        $res = $this->db->query($sql);
        return $res;
    }
    private function dataFb($res)
    {//对body，title反转义
        for($i = 0; $i < count($res);$i++){
            $res[$i]["title"] = stripslashes($res[$i]["title"]);
            $res[$i]["content"] = stripslashes($res[$i]["content"]);
        }
        return $res;
    }
    private function titleFb($res){
        //对title进行反转义
        for($i = 0; $i < count($res);$i++){
            $res[$i]["title"] = stripslashes($res[$i]["title"]);
        }
        return $res;
    }
    /*
    public function getIdByKey($key)
    {
        //这个性能有待考证，不知道对title的查找性能如何,而且，需要explain
        //这个需要四个以上的字做关键词，当调节到2个的时候，可以使用，现在使用like
        $sql = "select id,value from item where MATCH(keyword,title) AGAINST('$key')";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
     */
    public function getMin($id)
    {
        //通过id获得少量的信息，方便列表页面,订单和评价数通过查询获得
        //对img 进行分割，处理，读取出一张图片
        $sql = "select title,price,author_id,img,visitor_num,judgescore from item where id = $id";
        $res = $this->db->query($sql);
        $res = $res->result_array();
        if(!$res)return false;//如果长度为0，则返回，需要测试
        $res = $this->titleFb($res);
        $res = $res[0];
        $res["img"] = explode("|",$res["img"]);
        if($res["img"][0]){
            $res["img"] = $res["img"][0];
        }else{
            $res["img"] = "edianlogo.jpg";
        }
        $temp = $this->db->query("select count(*) from comItem where item_id = $id");
        $temp = $temp->result_array();
        $res["comment_num"] = $temp[0]["count(*)"];
        return $res;
    }
    public function getDetail($id)
    {
        //获得详细商品介绍页面的信息
        // 评价和订单数目通过查找获得，
        $sql = "select title,content,price,author_id,img,judgescore,promise,attr,visitor_num,store_num,time from item where id = $id";
        $res = $this->db->query($sql);
        $res = $res->result_array();
        if(!$res)return false;//如果长度为0，则返回，需要测试
        $res = $this->dataFb($res);
        return $res[0];
    }
    public function addvisitor($artId)
    {//为art添加浏览者数目,因为和用户想要的没有太大关系，所以不需要什么返回值,增加value
        $this->db->query("update item set value = value + 10  where art_id = '$artId'");
    }
    public function addComNum($artId)
    {//添加评论者信息，需要给出art_id,评论者id,需要更新new,commer,comment_num,同时增加value
        $this->db->query("update item set value = value+600 where art_id  = '$artId'");
        //大概是增加20分钟的样子，
    }
    public function getOrder($itemId)
    {
        //为订单提供必要的信息
        $res = $this->db->query("select title,author_id,store_num,price,img from item where id = $itemId");
        //如果搜一个没有id的主键id，结果会是什么,$res还会是true吗？
        if($res){
            $res = $res->result_array();
            return $res[0];//id是主键，有的话，结果必然只有一个
        }
        return false;
    }
    public function  getMaster($itemId){
        //找到商品对应的主人
        $res = $this->db->query("select author_id from item where id = $itemId");
        //如果搜一个没有id的主键id，结果会是什么,$res还会是true吗？
        if($res){
            $res = $res->result_array();
            return $res[0];//id是主键，有的话，结果必然只有一个
        }
        return false;
    }
    public function getTitle($itemId)
    {
        $res = $this->db->query("select title from item where id = $itemId");
        //如果搜一个没有id的主键id，结果会是什么,$res还会是true吗？
        if($res){
            $res = $res->result_array();
            return $res[0];//id是主键，有的话，结果必然只有一个
        }
        return false;
    }
    public function getIdByKey($key)
    {
        //通过关键字检索查询信息
        $res = $this->db->query("select id,value from item where title like '%$key%' or keyword like '%;$key;%'");//关键字的存储要；key；的形式，就是两边都是；，查找的时候，也要两边都是;，这样，匹配出来的，就是完整的关键字
        return $res->result_array();
    }
}
?>

