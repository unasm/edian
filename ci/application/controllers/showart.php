<?php
/**
 * 这个是作为帖子的显示页面
 **/
class Showart extends MY_Controller
{
	var $user_id;
	function __construct()
	{
		parent::__construct();
		$this->load->model("art");
		$this->load->model("user");
	}
	public function index($art_id)
	{
		//通过传进来的art_id给出具体的数据``
		$data = $this->_getIndexData($art_id);
		$this->add($art_id);//这个添加value并增加浏览数字功能尚未实现
			if($data["part_id"]<= count($this->partMap)){
				$data["part"] = $this->partMap[$data["part_id"]];
			}
			else $data["part"] = "";
		$this->load->view("showart",$data);
	}
	private function _getIndexData($art_id)
	{
		//将要获取的不止是art的内容，and userinfomation其实还有评价的内容，我想通过ajax得到。
		$ans = $this->art->getById($art_id)[0];
		$data2 = $this->user->getPubById($ans["author_id"])[0];
		$ans = array_merge($ans,$data2);
		return $ans;
	}
	public function add($art_id)
	{
		//每当一个用户浏览的话，就增加一个浏览量加value
	}
	public function getCom($artId  = "-1")
	{
		$this->load->model("comment");
		if($artId  =="-1"){
			exit("请指定号码");
		}
		header("Content-Type: text/xml");
		$ans = $this->comment->getCommentById($artId);
		$re="<root>";
		for($i = 0; $i < count($ans);$i++){
			$re.= "<comment>".$ans[$i]["comment"]."</comment>";
			$re.= "<time>".$ans[$i]["reg_time"]."</time>";
			$re.= "<userId>".$ans[$i]["user_id"]."</userId>";
			$data = $this->user->getPubById($ans[$i]["user_id"])[0];
			$re.= "<userName>".$data["user_name"]."</userName>";
			$re.= "<userPhoto>".$data["user_photo"]."</userPhoto>";
			$re.= "<ComId>".$ans[$i]["comment_id"]."</ComId>";
		}
		$re.= "</root>";
		echo $re;
	}
}
?>
