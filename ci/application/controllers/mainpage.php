<?php
/**
 * 这里对应的是mainpage2.php，操作包括为前段的js提供数据，对应的xml,逻辑上的各种操作，目前还不准备继承上层的类 ，对于登陆的功能，独立到reg文件中去了
 **/
class mainpage extends CI_Controller		
{
	//var $userInfo;	
	function __construct()
	{
		parent::__construct();
		$this->load->model("art");
		$this->load->model("user");
		$this->load->library("session");
	}
	public function index()
	{
		//这里准备只是画面框架的内容，没有具体的信息，其他的，由js申请
		$this->load->view("mainpage2");
	}
	public function infoDel()
	{//处理显示消息的函数，为js服务,$part表示热区，其他的1,2,3表示分版块,0为热门板块，具体看MY_Controller->partMap
		$part=$this->uri->segment(3,-1);
		if($part=="-1"){
			exit("part不正确，请根据链接浏览");
		}
		$id=$this->uri->segment(4,-1);
		if($id=="-1"){
			exit("mainpage->id不正确，请检查");
		}
		//header("Content-Type: text/xml");
		if($part=="0")
			$re=$this->delHotInfo($id);
		else {
			$re=$this->delPartInfo($part,$id);
		}
		$re=$this->xmlData($re);//补充数据，完善数据
		//var_dump($re);
		echo json_encode($re);
		//显示热门消息的函数，$id的作用是提供显示的页数,貌似除了热门消息之外，其他的都是可以同一个函数和model处理的
	}
	private function delPartInfo($part_id,$id)
	{
		$data["part_id"]=$part_id;
		$data["id"]=$id;
		//处理其他版块的信息提供,part，表示版块号码，id表示页数
		return $this->art->getTop($data);
	}
	private function delHotInfo($id)
	{
		//$id,表示页数,
		$data["id"]=$id;
		return $this->art->getHot($data);
	}
	private function xmlData($ans){
		//补充一些$ans数据，将原来粗糙的数据进一步加工完善，返回调用函数
		for($i = 0; $i < count($ans);$i++){
			/*
			$key = $ans[$i];
			$re.="<art_id>$key[art_id]</art_id>";
			$re.="<title>$key[title]</title>";
			$re.="<user_id>$key[author_id]</user_id>";
			$re.="<reg_time>$key[time]</reg_time>";
			 */
//			$ans[$i]["time"] = preg_split("/[\s]+/",$ans[$i]["time"])[0];//没有必要刻意去掉时间吧
			//$key["time"] = $key["time"][0];
			$author=$this->user->getNess($ans[$i]["author_id"]);
			if(count($author) == 1){
				$ans[$i]["photo"] = $author[0]["user_photo"];
				$ans[$i]["userName"] = $author[0]["user_name"];
			}
			else {
				//这里将来修改成报错，因为出现僵尸用户
				//var_dump("不存在用户".$key['author_id']);//这里其实应该给管理员一个报错，因为出现了僵尸用户
			}
		}
		return $ans;
	}
	public function getTotal($part_id )
	{
		//根据part_id得到所有的本part_id的总数
		if($part_id==0){
			$num=$this->art->allTotal();
		}
		else {
			$num=$this->art->getTotal($part_id);
		}
		echo json_encode(intval($num[0]["count(*)"]));
	}
}
?>
