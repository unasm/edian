<?php
class Message extends MY_Controller{
	var $user_id;
	function  __construct(){
		parent::__construct();
		$this->user_id = $this->user_id_get();
		if ($this->user_id == false) {
			exit("请登陆,难道还需要写一个邮箱的登陆页面不成");
		}
		$this->load->model("mess");
		$this->load->model("user");
	}				
	function index(){
		$this->load->view('message');				
	}
	public function det($messId  )
	{
		//查看邮件内容的地方，发件箱改称其他名字
		$ans = $this->mess->getById($messId);
		$data["cont"] = $ans[0];
		for($i = 1; $i < 4;$i++){
			//for($i = 1; $i < count($ans);$i++){
			$ans[$i] = array(
				"body" => "testing",
				"time" => "2012-12-23 20: 23:2",
				"geter" => "1"
			);
			$data["reply"][$i-1] = $ans[$i];
			//$data["reply"][$i-1] = $ans[$i];//测试函数使用
		}
		return $data;
	}
	function send($messId = -1)
	{//发件箱的浏览内容
		if($messId == -1)exit("呵呵");
		$this->load->view("messout");
	}
	public function jsonsend($messId)
	{
		$data = $this->det($messId);
		if($data["cont"]["senderId"] != $this->user_id){
			exit("他人邮件，请勿浏览");
			$atten["atten"] = "他人邮件，请勿浏览";
			$atten["uriName"] = "发件箱";
			$atten["uri"] = site_url("message/out");
			$atten["time"] = 3;
			$atten["title"] = "他人邮箱";
			$this->load->view("jump",$atten);
		}
		$data["sender"] = $this->user->getPubById($data["cont"]["senderId"]);
		$data["geter"] = $this->user->getPubById($data["cont"]["geterId"]);
		echo json_encode($data);
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
		$data["body"] = trim($this->input->post("cont"));
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
