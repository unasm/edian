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
	public function checkAuth()
	{
		//检查用户是否登陆，没有登陆返回0，登陆了返回1,暂时不完成，以后完成
	}
	public function user_id_get()
	{//或许可以选择保存在数据库，但是总要有一个唯一的标示，我想或许是session_id吧
		$user_id = false;
		if($this->session->userdata("user_id")!=""){
			$user_id = $this->session->userdata("user_id");
			$intUser = intval($user_id);
			if(is_numeric($user_id)&&($intUser == $user_id)){
				return $user_id;
			}
		}
		return false;
	}
	/*
	public function userInfoGet()
	{
		//获得用户的信息，根据就是sessionId,返回用户名，id，密码
		$this->load->model("monline_user");
		$res = $this->monline_user->checkOnline($_SESSION['id']);
		var_dump($res);
		echo "<br/>";
		var_dump("检查下这个错误的时候返回的是不是false，正确的时候返回的是数组MY_Controller/userInfoGeg");
		if($res){
			return $res["user_id"];
		}
		return false;
	}
	public function userInfoSet($userid,$userName,$passwd)
	{
		//代替原来的sessiondataset，向数据库保存用户信息,使用之前确保用户不在线
		$this->load->model("monline_user");
		$data["user_id"] = $userid;
		$data["user_name"] = $userName;
		$data["passwd"] = $passwd;
		$data["time"] = now();
		var_dump($data["time"]);
		echo "<br/>";
		var_dump("检查下这个时间是不是时间戳的格式，不是就错了，MY_Controller/userInfoSet");
		die;
		$this->monline_user->denglul($data);
	}
	public function userInfoDel()
	{
		//删除用户信息，
		$this->monline_user->delete($_SESSION['id']);
	}
*/
}
?>
