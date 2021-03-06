<?php
/**
 * 对应的数据库为art这个表，目前还是在使用中,处理的就是帖子，文章的第一层楼,他们都差不多，不是吗？
 *art_id表明这个行的唯一id
 title，商品信息的标题，也是搜索的主要依据
 content，主要介绍内容
 part_id,表明这个商品的分区，没有添加索引，因为数据差别不大
 time，最后的发表时间或者是修改时间
 author_id 发表的人的id
 value 通过赞助，评论，浏览添加起来的价值
 visitor_num 访问者的数目，将来收钱的依据，会增加少量的value
 comment_num 很大程度上增加价值，评论者的数目，
 new，是不是有新的人评论了，回复了
 commer 最近的评论者
 price，商品的价格
 img，商品的图片
		 author:			unasm
		 email:			douunasm@gmail.com
		 Last_modified:	2013-05-14 01:12:50

 **/
class Art extends Ci_Model
{
	var $num;
	function __construct()
	{
		$this->num=20;
		parent::__construct();
	}
	public function insert_art($art_title,$art_text,$part_id,$user_id,$value)
	{//插入文章的的函数 ，未经过测试
		$art_title = addslashes($art_title);
		$art_text = addslashes($art_text);
		$sql="insert into art(title,content,part_id,time,author_id,value) values('$art_title','$art_text','$part_id',now(),'$user_id','$value')";
		return $this->db->query($sql);
	}
	public function cinsertArt($data,$userId)
	{//目前只是为cadd 服务,返回插入成功时候的id
		$data["tit"] = addslashes($data["tit"]);
		$data["cont"] = addslashes($data["cont"]);
		$flag = $this->db->query("insert into art(title,content,part_id,time,author_id,value,price,img) values('$data[tit]','$data[cont]','$data[part]',now(),'$userId','$data[value]','$data[price]','$data[file_name]')");
		if($flag){
			$flag = $this->db->query("select last_insert_id()");
			$flag = ($flag->result_array());
			return $flag["0"]["last_insert_id()"];
		}
		return false;
	}
	private function dataFb($res)
	{//对body，title反转义
		for($i = 0; $i < count($res);$i++){
			$res[$i]["title"] = stripslashes($res[$i]["title"]);
			$res[$i]["content"] = stripslashes($res[$i]["content"]);
		}
		return $res;
	}
	private function titleFb($res)
	{//对body，title反转义
		for($i = 0; $i < count($res);$i++){
			$res[$i]["title"] = stripslashes($res[$i]["title"]);
		}
		return $res;
	}
	public function getTop($data)
	{//根据id和part_id获得信息的函数，将从上到下，根据value获得信息
		//没有，或者是小于1的情况，为0
		if(!array_key_exists("id",$data)||($data["id"] < 1))$data["id"] = 1;
		$data["id"]=($data["id"]-1)*$this->num;//$this->num中保存的是每页显示的条数，$id,表示的是当前的页数，默认从1开始，所以需要减去1
		$sql="select art_id,title,author_id,time,comment_num,visitor_num,price,img from art where part_id = $data[part_id] order by value  desc limit $data[id],$this->num";
		$res=$this->db->query($sql);
		return $this->titleFb($res->result_array());
	}
	public function getHot($data)
	{
		$data["id"]=($data["id"]-1)*$this->num;//$this->num中保存的是每页显示的条数，$id,表示的是当前的页数，默认从1开始，所以需要减去1
		$sql="select art_id,title,author_id,time,comment_num,visitor_num,price,img from art  order by value  desc limit $data[id],$this->num";
		$res=$this->db->query($sql);
		return $this->titleFb($res->result_array());
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
		$sql = "select title,content,time,price,img,author_id,visitor_num,comment_num,part_id from art where art_id  = $artId";
		$res = $this->db->query($sql);
		return $this->getArray($this->dataFb($res->result_array()));
	}
	public function getUserart($userId)
	{//获得某一个用户所有的art，只是包含紧要的,对应space index
		$res = $this->db->query("select new,art_id,title,time,commer,visitor_num,comment_num,price,img from art where author_id = '$userId' order by value desc");
		return $this->titleFb($res->result_array());
	}
	public function addvisitor($artId)
	{//为art添加浏览者数目,因为和用户想要的没有太大关系，所以不需要什么返回值,增加value
		$this->db->query("update art set visitor_num = visitor_num +1,value = value + 10  where art_id = '$artId'");
	}
	public function addComNum($artId,$comerId)
	{//添加评论者信息，需要给出art_id,评论者id,需要更新new,commer,comment_num,同时增加value
		$this->db->query("update art set comment_num  = comment_num+1,new  = 1,commer = '$comerId',value = value+600 where art_id  = '$artId'");
		//大概是增加20分钟的样子，
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
		$res = $this->db->query("select price,img,title,part_id,time,author_id,visitor_num,comment_num from art where art_id = '$id'");
		return $this->getArray($this->titleFb($res->result_array()));
	}
	public function getMaster($artId)
	{
		$res = $this->db->query("select author_id from art where art_id = '$artId'");
		return $this->getArray($res->result_array());
	}
	public function getUserInsert($artId)
	{//根据id取得用户自己当初插入的那些，然后，修改
		$res = $this->db->query("select title,part_id,author_id,content,price from art where art_id = '$artId'")	;
		return $this->getArray($this->dataFb($res->result_array()));
	}
	public function reAdd($data,$artId)
	{
		$data["tit"] = addslashes($data["tit"]);
		$data["cont"] = addslashes($data["cont"]);
		if($data["img"]==0){
			return $this->db->query("update art set title = '$data[tit]',content = '$data[cont]',part_id = '$data[part]',price = '$data[price]',time = now() where art_id = '$artId'");
		}else{
			return $this->db->query("update art set title = '$data[tit]',content = '$data[cont]',part_id = '$data[part]',price = '$data[price]',img = '$data[img]',time = now() where art_id = '$artId'");
		}
		//对应write/reAdd中的函数调用
	}
	public function getImgId($artId)
	{
		//获得art中img和author_id,为/write/reAdd效力
		$res = $this->db->query("select img,author_id from art where art_id = '$artId'");
		return $this->getArray($res->result_array());
	}
	private function getArray($arr)
	{
		if(count($arr)==1)return $arr[0];
		return false;
	}
}
?>
