<?php
class Test extends MY_Controller{
	var  $user_id="",$partmap;
	function __construct()				{
		parent::__construct();
		$this->user_id = $this->user_id_get();
		$this->partmap= array(
			//走进科协
			"0" => array(
				"0" => "科协章程",
				"1" => "领导介绍",
				"2" => "部门职能",
				"3" => "内设机构",
				"4" => "成员名单"
			),
			//工作动态
			"1" => array(
				"5" => "上级新闻", 
				"6" => "科协动态"
			),
			//科普园地
			"2" => array(
				"7" => "科普活动",
				"8" => "科普教育基地",
				"9" => "科普知识大全",
				"10" => "他山之石"
			),	
			//科技工作者之家
			"3" => array(
				"11" => "科技人物",
				"12" => "职称评定",
				"13" => "学习教育"			
			),
			//科技创新
			"4" => array(
				"14" => "院士专家工作站",
				"15" => "金桥工作",
				"16" => "青少年科技创新"		
			),
			//政策文件
			"5" => array(
				"17" => "科技政策",
				"18" => "科普政策",
				"19" => "科协文件"
			),
			//街道科协
			"6" => array(
				"20" => "工作信息",
				"21" => "机构设置"
			),
			//园区科协
			"7" => array(	
				"22" => "工作信息",
				"23" => "机构设置"
			),
			//企事业科协
			"8" => array(
				"24" => "工作信息",
				"25" => "机构设置"
			),
			//老科协
			"9" => array(
				"26" => "工作信息",
				"27" => "机构设置"
			),
			"10" => array(
				"31" =>"科研机构",
				"32" =>"重点高校",
				"33" => "资源下载"
			),
			"28" => "新闻公告",
			"29" => "通知公告",
			"30" => "经验交流",
			"34" => "科协会刊",
			"35" => "科协剪影"   //需要为他们添加特判，但是只是在status-detail中判断就可以了
		);
		$this->head=array(
			"0"=>"走进科协",
			"1"=>"工作动态",
			"2"=>"科普园地",
			"3"=>"科技工作者之家",
			"4"=>"科技创新",
			"5"=>"政策文件",
			"6"=>"街道科协",
			"7"=>"园区科协",
			"8"=>"企事业科协",
			"9"=>"老科协",
			"10" =>"科协资源",
			"28" => "新闻公告",
			"29" => "通知公告",
			"30" => "经验交流",
			"34" => "科协会刊",
			"35" => "科协剪影"
		);
	//	error_reporting("");
	}
	function index(){
		define('NAME',"black.jpg");
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
		$this->load->view("mainpage2");
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
