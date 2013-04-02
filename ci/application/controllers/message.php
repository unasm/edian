<?php
class Message extends MY_Controller{
	var $user_id;
	function  __construct(){
		parent::__construct();
		$this->user_id = $this->user_id_get();
		$this->load->model("mess");
	}				
	function index(){
		$this->load->view('message');				
	}
	public function out()
	{
		//发件箱
		$this->load->view("messout");
	}
	public function write()
	{
		$this->load->view("messwrite");
	}
	public function add(){
		//这里是添加用户发送信息的函数
		if($this->user_id == false){
			exit("请登陆后发送站内信");
		}
		$data["sender"]	 = $this->user_id;
		$data["geterId"] = $this->input->post("geter");
		$data["title"] = $this->input->post("title");
		$data["body"] = $this->input->post("cont");
		if($this->mess->add($data) == true){
			redirect(site_url("message/out"));
		}
		else {
			$atten["atten"] = "保存失败，请检查数据是否正确，无误请联系管理员douunasm@gmail.com，对您造成的不便表示歉意";
			$atten["time"] = 3;
			$atten["uriName"] = "发件箱";
			$atten["uri"] = site_url("message/sendBox");
			$atten["title"] = "很遗憾，发送失败";
			$this->load->view("jump",$atten);
		}
	}
}
?>	
