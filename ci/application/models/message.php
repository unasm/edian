<?php
/**
 * author:			unasm
 * email:			douunasm@gmail.com
 * last_modefied:	2012/12/04 12:13:44 CST
 * 这个文件是为message服务的，集成了所有的message的操作,所谓的message，就是站内信的函数
 * 尚未检查测试
 **/
class Message extends CI_Model
{
	var $showNum;	
	function __construct()
	{
		$this->showNum=15;
		parent::__construct();
	}
	public function getAllunread($user_id)
	{
		//获得一个用户所有的没有阅读过的信息
		$sql="select * from message where geterId = $user_id && read_already = 'N'";
		$res=$this->db->query($sql);
		return $res->result_array();
	}
	public function isNewMessage($user_id)
	{
		//根据user_id判断是否有新的信息收到
		$sql="select 1 from message where geterId = $user_id && read_already = 'N' limit 1";
		$res=$this->db->query($sql);
		return $this->db->result();//这里的结果有待判断
	}
	public function add($data)
	{
		//需要$data[sender],$data[geterId],$data[body],$data[title]
		$sql="insert message(sender,geterId,body,title,time) values($data[sender],$data[geterId],$data[body],$data[title],now())";
		return $this->db->query($sql);
	}
	public function changeRead($message_id)
	{
		//修改message是否修改为已阅的标志,如果为false是成功，否则失败
		return $this->db->query("update message set read_already = 1 where messageId = $message_id");
	}
	public function deleteById($message_id)
	{
		//通过id删除信息
		return $this-.db->query("delete from message where messageId = $message_id");
	}
}
?>
