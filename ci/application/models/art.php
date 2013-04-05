<?php
/**
 * 对应的数据库为art这个表，目前还是在使用中,处理的就是帖子，文章的第一层楼,他们都差不多，不是吗？
 **/
class Art extends Ci_Model
{
	var $num;
	function __construct()
	{
		$this->num=14;
		parent::__construct();
	}
	public function insert_art($art_title,$art_text,$part_id,$user_id,$value)
	{//插入文章的的函数 ，未经过测试
		$sql="insert into art(title,content,part_id,author_id,value) values('$art_title','$art_text','$part_id','$user_id',$value)";
		return $this->db->query($sql);
	}
	public function getTop($data)
	{//根据id和part_id获得信息的函数，将从上到下，根据value获得信息
		if(!isset($data["id"]))$data["id"] = 1;
		$data["id"]=($data["id"]-1)*$this->num;//$this->num中保存的是每页显示的条数，$id,表示的是当前的页数，默认从1开始，所以需要减去1
		$sql="select art_id,title,author_id,time from art where part_id = $data[part_id] order by value limit $data[id],$this->num";
		$res=$this->db->query($sql);
		return $res->result_array();
	}
	public function getHot($data)
	{
		$data["id"]=($data["id"]-1)*$this->num;//$this->num中保存的是每页显示的条数，$id,表示的是当前的页数，默认从1开始，所以需要减去1
		$sql="select art_id,title,author_id,time from art  order by value limit $data[id],$this->num";
		$res=$this->db->query($sql);
		return $res->result_array();
	}
	public function delById($id)
	{
		//根据art_id删除id
		return $this->db->query("delete * from art where art_id = $id");
	}
	public function getTotal($part_id)
	{//根据part_id 计算总数的函数
		$res=$this->db->query("select count(*) from art where part_id = $part_id");
		return $res->result_array();
	}
	public function allTotal()
	{//这个是获得art中所有的条数的函数
		$res=$this->db->query("select count(*) from art ");
		return $res->result_array();
	}
	public function getById($artId)
	{
		//通过artId将所有的信息输出，大概很简单吧
		$sql = "select * from art where art_id  = $artId";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
}
?>
