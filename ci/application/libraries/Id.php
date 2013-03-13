<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 这个文件的作用只是一个辅助函数，为了不增加类逻辑上的继承
 **/
class CI_Id 
{
	var $user_id;
	var $Ci;
	//在这里会放一些常量，或许吧
	function __construct()
	{
		$this->Ci =& get_instance();
	}
	public function alert($content)
	{
		//帮助函数，alert一些东西,尚未测试
		echo "<script language='javascript'>alert($content)</script>";
	}
	public function user_id_get()
	{//或许可以选择保存在数据库，但是总要有一个唯一的标示，我想或许是session_id吧
		$user_id = false;
		if(isset($this->Ci->session->userdata("user_id")){
			$user_id = $this->Ci->session->userdata("user_id");
			return $user_id;
		}
		if(isset($_SESSION["user_id"])){
			$user_id = $_SESSION["user_id"];
		}
		return $user_id;
	}
}
?>
