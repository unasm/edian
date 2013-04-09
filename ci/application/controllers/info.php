<?php
/**
 * 这里对应的用户空间中的info页面
 **/
class Info extends MY_Controller
{
	var $user_id;
	function __construct()
	{
		parent::__construct();
		$this->user_id = $this->user_id_get();
	}
	public function index($mastId = -1)
	{
		if($mastId == -1)$mastId = $this->user_id;
		if(!$mastId){
			show_404();
		}
		$data["masterId"] = $mastId;
		$data["name"] = "我的名片";
		$this->load->view("info",$data);
	}
}
?>
