<?php
/**
 * 对应的数据库为art这个表，目前还是在使用中,处理的就是帖子，文章的第一层楼,他们都差不多，不是吗？
 **/
class Art extends Ci_Model
{
	var $num;
	function __construct()
	{
		$this->num=16;
		parent::__construct();
	}
	public function insert_art($art_title,$art_text,$part_id,$user_id,$value)
	{//插入文章的的函数 ，未经过测试
		$sql="insert into art(title,content,part_id,time,author_id,value,commer) values('$art_title','$art_text','$part_id',now(),'$user_id','$value','$user_id')";
		return $this->db->query($sql);
	}
	public function getTop($data)
	{//根据id和part_id获得信息的函数，将从上到下，根据value获得信息
		if(!isset($data["id"]))$data["id"] = 1;
		$data["id"]=($data["id"]-1)*$this->num;//$this->num中保存的是每页显示的条数，$id,表示的是当前的页数，默认从1开始，所以需要减去1
		$sql="select art_id,title,author_id,time,comment_num,visitor_num from art where part_id = $data[part_id] order by value  desc limit $data[id],$this->num";
		$res=$this->db->query($sql);
		return $res->result_array();
	}
	public function getHot($data)
	{
		$data["id"]=($data["id"]-1)*$this->num;//$this->num中保存的是每页显示的条数，$id,表示的是当前的页数，默认从1开始，所以需要减去1
		$sql="select art_id,title,author_id,time,comment_num,visitor_num from art  order by value  desc limit $data[id],$this->num";
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
		$sql = "select title,content,time,author_id,visitor_num,comment_num,part_id from art where art_id  = $artId";
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	public function getUserart($userId)
	{//获得某一个用户所有的art，只是包含紧要的,对应space index
		$res = $this->db->query("select new,commer,art_id,title,time,visitor_num,comment_num from art where author_id = '$userId' order by value desc");
		return $res->result_array();
	}
	public function addvisitor($artId)
	{//为art添加浏览者数目,因为和用户想要的没有太大关系，所以不需要什么返回值,增加value
		$this->db->query("update art set visitor_num = visitor_num +1,value = value + 1  where art_id = '$artId'");
	}
	public function addComNum($artId,$comerId)
	{//添加评论者信息，需要给出art_id,评论者id,需要更新new,commer,comment_num,同时增加value
		$this->db->query("update art set comment_num  = comment_num+1,new  = 1,commer = '$comerId',value = value+10 where art_id  = '$artId'");
	}
	public function changeNew($artId)
	{//当用户自己浏览过之后，就将其中的new设置成为0，只是commer不变，目前再_getIndexData中有调用
		$this->db->query("update art set new = 0 where art_id  = '$artId'");
	}
	public function getIdByKey($key)
	{
		//通过%like%匹配检测有没有相似的,这次只是获取id而已
		//记忆中，貌似可以通过其他的方式进行这种匹配查询
		$res = $this->db->query("select art_id from art where title like '%$key%'");
		return $res->result_array();
	}
	public function getSeaResById($id)
	{
		//get search result by id,根据id获得具体搜索内容的函数
		$res = $this->db->query("select title,part_id,time,author_id,visitor_num,comment_num from art where art_id = '$id'");
		return $res->result_array();
	}
}
?>
