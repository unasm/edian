<?php
/*************************************************************************
    > File Name :     ../application/models/comItem.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-27 22:55:13
 ************************************************************************/
/*id 主键 作为索引的存在
//score 用户的评分，0-10，不过貌似没有比tinyint更小的int了
//context 用户的评价信息，之前一致在想楼钟楼的情况，决定将其他的评价也放到context中，如果有的话，
    //就是其他人对评论的回复，于这个合并，节省空间，加快速度，然后利用js分解
//appen的信息就时间，内容和名字
//time 时间，精确到日期，更加精确就没有必要了
    user_id 评论者的id，方便添加其他的信息
    item_id 回复的那个商品的id,大概这个才是最关键的吧
 */
class ComItem extends Ci_Model{
    function __construct()
    {
        parent::__construct();
    }
    public function insert($data)
    {
        $data["text"] = addslashes($data["text"]);
        $sql = "insert into comItem(score,context,time,user_id,item_id) values('$data[score]','$data[text]',date_format(now(),'%Y-%m-%d'),'$data[user_id]','$data[item_id]')";
        $res = $this->db->query($sql);
        if($res){
            $res = $this->db->query("select last_insert_id()");
            $res = $res->result_array();
            $this->db->query("update item set judgescore = judgescore + $data[score] where id = $data[item_id]");
            return $res["0"]["last_insert_id()"];
        }
        return false;
    }
    public function append($data,$comId)
    {
        $data["text"] = addslashes($data["text"]);
        $sql = "update comItem set context = concat( context,".'\'&'.$data['text'].'|\''.",date_format(now(),'%Y-%m-%d'),'".'|'.$data["userName"]."') where id = $comId";
        return $this->db->query($sql);
    }
    public function selItem($itemId)
    {
        $res = $this->db->query("select id,score,context,time,user_id from comItem where item_id = '$itemId'");
        return $this->dataFb($res->result_array());
    }
    public function dataFb($res)
    {
        for ($i = 0,$len = count($res);$i < $len;$i++) {
            $res[$i]["context"] = stripslashes($res[$i]["context"]);
        }
        return $res;
    }
}
?>
