<?php
/**
 * 这个是为了管理扩展方便，目前，其实还是没有太多的作用，类似于id，但是alert还是放到了library中
 **/
class MY_Controller extends  CI_Controller
{
	public $partMap;
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->library("session");
		$this->partMap = array(
			"0" => "热门",
			"1" => "推荐",
			"2" => "商店",
			"3" => "二手市场",
			"4" => "学习资源"
		);
	}
	public function user_id_get()
	{//或许可以选择保存在数据库，但是总要有一个唯一的标示，我想或许是session_id吧
		$user_id = false;
		return $this->session->userdata("user_id");
		/*
		if(isset($this->session->userdata("user_id")){
			$user_id = $this->session->userdata("user_id");
			return $user_id;
		}
		if(isset($_SESSION["user_id"])){
			$user_id = $_SESSION["user_id"];
		}
		return $user_id;
		 */
	}
}
?>
