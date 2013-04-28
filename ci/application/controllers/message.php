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
	public function getbox()
	{//其实就是为收件箱准备的，提供json，view由index提供
		$data["cont"] = $this->mess->getInMess($this->user_id);
		for($i = 0; $i < count($data["cont"]);$i++){
			$data["sender"][$i] = $this->user->getNess($data["cont"][$i]["senderId"])[0];
		}
		echo json_encode($data);
	}
	function index(){//收件箱的显示
		$data["get"] = "getbox";
		$this->load->view('message',$data);
	}
	public function det($messId  )
	{
		//查看邮件内容的地方，发件箱改称其他名字
		$ans = $this->mess->getById($messId);
		$data["cont"] = $ans[0];
		for($i = 1; $i < 4;$i++){
			//for($i = 1; $i < count($ans);$i++){
			$ans = array(
				"body" => "testing",
				"time" => "2012-12-23 20: 23:2",
				"sender" => "1"
			);
			$data["reply"][$i-1] = $ans;
			//$data["reply"][$i-1] = $ans[$i];//测试函数使用
		}
		return $data;
	}
	function send($messId = -1)
	{//浏览邮件的具体内容的函数，不分发件箱或者是收件箱
		if($messId == -1)show_404();
		$data = $this->det($messId);//data["cont"]为主要内容，$data["reply"]为回复内容;
		var_dump($data["cont"]);
		var_dump($data["reply"]);
		$data["messId"] = $messId;
		$this->load->view("messout",$data);
	}
	public function sendbox()
	{
		//显示html的内容,发件箱
		$data["get"] = "sendBoxData";
		$this->load->view("message",$data);
	}
	public function sendBoxData()
	{
		//将所有本人的发出去的邮件得到的函数
		$data["cont"] = $this->mess->sendInMess($this->user_id);
		for($i = 0; $i < count($data["cont"]);$i++){
			$data["sender"][$i] = $this->user->getNess($data["cont"][$i]["geterId"])[0];//其实在这里对应的sender已经是收件人了，只是为了方便，才不更改的
		}
		echo json_encode($data);
	}
	public function jsonsend($messId)
	{
		$data = $this->det($messId);
		if(($data["cont"]["senderId"] != $this->user_id) &&($data["cont"]["geterId"] != $this->user_id)){
			exit("他人邮件，请勿浏览");//目前这个if还没有测试到过
		}
		$data["sender"] = $this->user->getNess($data["cont"]["senderId"])[0];
		$data["geter"] = $this->user->getNess($data["cont"]["geterId"])[0];
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
		$data["geterId"] = trim($this->input->post("geter"));
		$data["title"] = trim($this->input->post("title"));
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
