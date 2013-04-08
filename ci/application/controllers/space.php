<?php
/**
* 这个是用户空间的设计页面，因为对之前的userspace不满意，所以第二次开始设计
*
 **/
class Space extends MY_Controller
//class Space extends MY_Common
{
	var $user_id,$user_name;//空间主人的一些信息，保存到这里，就是为了在以后直接调用比较方便。	
	function __construct()
	{
		parent::__construct();
		$this->load->model("art");
		$this->load->model("user");
		$this->user_id = $this->user_id_get();
	}
	public function index($masterid  = -1)
	{
		if($masterid == -1) $masterid = $this->user_id;
		$data["masterId"] = $masterid;
		$temp = $this->user->getNess($masterid)[0];
		$data["name"] = $temp["user_name"];
		$data["userPhoto"] = $temp["user_photo"];
		$data["cont"] = $this->art->getUserart($masterid);
		for($i = 0; $i < count($data["cont"]);$i++){
			$data["cont"][$i]["time"] = preg_split("/[\s]+/",$data["cont"][$i]["time"])[0];
			$temp = $this->user->getNess($data["cont"][$i]["commer"])[0];
			$data["cont"][$i]["name"] = $temp["user_name"];
			$data["cont"][$i]["userPhoto"] = $temp["user_photo"];
		}
		$this->load->view("userSpace",$data);
	}
	public function index2()
	{//这个页面得分不高，所以暂时抛弃
		$this->load->view("userSpace2");
	}
}
?>
