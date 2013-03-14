<?php
/**
 * 这个文件是对应的数据库monline_user
 **/
class Monline_user extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function check_online($user_id){
		//检查用户是否登陆
		$sql = "select * from online_user where user_id  = $user_id";
		$res = $this->db->query("$sql");
		return $res->result();
	}
	function delete($user_id){
		$sql = "delete from online_user where user_id  = $user_id"	;
		$res = $this->db->query($sql);
		var_dump($res)	;
		echo "<br/>";
		var_dump("here is the model/monline_user/delete");
		die;
		return $res;
	}
	public function denglu($data)
	{
		//这个函数是为了登陆而设置的，增加用户的状态
		$res = $this->db->query("insert into online_user(user_id,user_name,passwd,denglu_time) VALUE($data['user_id'],$data['user_name'],$data['passwd'],$data['time'])");
		var_dump($res);
		die;
		return $res;
	}
}
?>
