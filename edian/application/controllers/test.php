<?php
class Test extends MY_Controller{
	var  $user_id="",$partmap;
	function __construct()				{
		parent::__construct();
		$this->user_id = $this->user_id_get();
	}
	function index(){
		$user_id = $this->user_id_get();
		$this->load->model("user");
		$data = null;
		if($user_id){
			$data = $this->user->getNess($user_id);
			$temp = $this->user->getNum($user_id);
			if($data){
				$data = array_merge($data,$temp);
			}else $data = null;
		}
		//这里准备只是画面框架的内容，没有具体的信息，其他的，由js申请
		$data["dir"] = $this->partMap;
		$data["cont"] = $this->infoDel($id);//0 获取热区的内容
		$this->load->view("test",$data);
	}
	private function getHeader($key){
		//这个函数是为了article中的header路径添加的，给定一个健值，返回一个字符串，直接再view中echo ，该文章所在路径的健
		$re = "<a href='".site_url("")."' class='back'>首页</a>";
		while(list($arrayKey,$value) = each($this->partmap)){
			if(is_array($value)){
				if(array_key_exists($key,$value)){
					var_dump($value);
					$re.= "&gt;&gt;<a href = ".site_url("status_main/index/".$arrayKey)."/>".$this->head[$arrayKey]."</a>";
					$re.= "&gt;&gt;<a href = ".site_url("news/show_list_detail/".$key)."/>".$value[$key]."</a>";
					return $re;
				}
			}else{
				if(array_key_exists($key,$this->partmap)){
					$re.= "&gt;&gt;<a href = ".site_url("sonast/index/".$key)."/>".$this->partmap[$key]."</a>";
					return $re;
				}
			}
		}
	}
	public function respon()
	{
		echo "here is the response";
	}
	public function art()
	{
		$data["time"] = time();
		$data["content"] = "就钓鱼岛时间双方交换意见";
		$data["user_name"] = "小泉与野兽";
		$data["reg_time"] = date();
		$data["user_photo"] ="1363246384.jpg";
		$this->load->view("showart2",$data);
	}
	public function main()
	{
		$this->load->view("test");
	}
	public function xhe()
	{
		$this->load->view("uploadxhe");
	}
	public function layout()
	{
		$this->load->view("layout");
	}
	public function bubble()
	{
		$this->load->view("bubble");
	}
}
?>	
