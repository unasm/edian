<?php
/**
 * 这个是space的controller的操作集合，尚未完成
 * author:			unasm
 * email:			douunasm@gmail.com
 * last_modefied:	2012/12/04 02:24:06 CST
 * 
 **/
class SpacePhoto extends MY_Controller
{
	var $user_id,$user_name;	
	function __construct()
	{
		parent::__construct();
		$this->user_id="4";
		$this->load->model("comment");
	}
	public function index()
	{
		$data["title"]="田乙的世界";
		$this->load->view("spacePhoto",$data);
	}
	public function judge()
	{
		//这里对应的是用户的评价添加函数，将用户的添加数据保存到数据库，并将他们返回？或者是只返回一个标志位，然后在客户端添加数据
		$data["comment"]=$this->input->post("judgeupload");
		if($this->user_id==false){
			echo "0";
			return;
		}
		$res=$this->comment->insertComment($this->user_id,$data["comment"]);
		if(!$res)
			echo "0";
		else 
			echo "1";
	}
}
?>
