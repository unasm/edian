<?php
/*
 *author:			unasm
 email:			douunasm@gmail.com
 last_modefied:	2013/04/29 10:05:54 AM
 考虑到效率的问题，两次http请求肯定不如一次快，所以最初打开邮箱的时候，通过php的方式给出内容，之后切换到其他的连接，通过ajax的方式给出数据,考虑的容易维护，将view和ajax的方式func放在一起
 */
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
	function index($ajax = false){
		//$ajax和直接浏览提供不同数据;
	//收件箱的显示,我感觉，收件箱发件箱应该同一个rul才好吧
		$data["cont"] = $this->mess->getInMess($this->user_id);
		for($i = 0; $i < count($data["cont"]);$i++){
			$data["sender"][$i] = $this->user->getNess($data["cont"][$i]["senderId"])[0];
		}
		$data["get"] = "index";//这个是为了ajax提供目标函数
		if($ajax){
			echo json_encode($data);
		}else
			$this->load->view('message',$data);
	}
	public function sendbox($ajax = false)
	{
		//显示html的内容,发件箱
		$data["cont"] = $this->mess->sendInMess($this->user_id);
		for($i = 0; $i < count($data["cont"]);$i++){
			$data["sender"][$i] = $this->user->getNess($data["cont"][$i]["geterId"])[0];//其实在这里对应的sender已经是收件人了，只是为了方便，才不更改的
		}
		$data["get"] = "sendbox";//这个是为了ajax提供目标函数
		if($ajax){
			echo json_encode($data);
		}else
			$this->load->view("message",$data);
	}
	public function det($messId  )
	{
		//查看邮件内容的地方，发件箱改称其他名字
		$ans = $this->mess->getById($messId);
		count($ans)?($ans = $ans[0]):(show_404());
		$data["cont"] = $ans;
		if(($data["cont"]["senderId"] != $this->user_id) &&($data["cont"]["geterId"] != $this->user_id)){
			exit("他人邮件，请勿浏览");//目前这个if还没有测试到过
		}
		$data["sender"] = $this->user->getNess($data["cont"]["senderId"])[0];
		$data["geter"] = $this->user->getNess($data["cont"]["geterId"])[0];
		$data["reply"] = $this->mess->getRepById($messId);
		for($i = 0; $i < count($data["reply"]);$i++){
			//$data["reply"][$i] = preg_replace("/\[face\:(\d+)\]/","/\<img src \= ".base_url("face/")."\(1\)\>/",$data["reply"][$i]);
			$data["reply"][$i] = preg_replace("/\[face\:(\d+)\]/","<img src = ".base_url("face/\\1.gif")." />",$data["reply"][$i]);
		}
		return $data;
	}
	function send($messId = -1)
	{//浏览邮件的具体内容的函数，不分发件箱或者是收件箱
		if($messId == -1)show_404();
		$data = $this->det($messId);//data["cont"]为主要内容，$data["reply"]为回复内容;
		//var_dump($data);//目前reply还没有正确显示
		$data["messId"] = $messId;
		$this->load->view("messout",$data);
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
		//$data["title"] = addslashes(trim($this->input->post("title")));
		//$data["body"] = addslashes($this->input->post("cont"));//addslashes交给model处理吧
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
	public function quickAdd($messId = -1,$ajax = false)
	{
		//对应ajax提交，同时提供失效方案
		if($messId == -1){
			exit("如果确认操作没有错误，请联系管理员".$this->adminMail);
		}
		$com = trim($this->input->post("com"));
		if(strlen($com) == 0){
			exit("请输入内容");
		}
		if(!$this->user_id){
			exit("请首先登陆");
		}
		$flag = 0;
		$data["body"] = $com;
		$data["replyTo"] = $messId;
		$data["user_id"] = $this->user_id;
		$res = $this->mess->quickAdd($data);
		if($res)$flag = 1;
		if($ajax){
			echo json_encode($flag);
		}else{
			if($flag)
				echo "回复成功,请点击后退返回";
			else echo "回复失败";
		}
	}
}
?>	
