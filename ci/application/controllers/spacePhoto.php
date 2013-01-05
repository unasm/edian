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
	var $user_id,$user_name,$thumbNum;	
	function __construct()
	{
		parent::__construct();
		$this->user_id="4";
		$this->thumbNum=6;
		$this->load->model("comment");
		$this->load->model("img");
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
	public function getThumb()
	{//尚未经过测试
		$from=$this->uri->segment(4,-1);
		if($from==-1){
			$from=$this->uri->segment(3,-1)	;
		}
		else {
			$this->user_id=$this->uri->segment(3,-1);
		}
		//对应前端的getThumb,通过from作为起始的id，从后台获得具体数据；发回去的url应该是一个具体的url，可以找到图片的url,也方便盗链
		$data["num"]=$this->thumbNum;
		$data["from"]=$from;
		$data["user_id"]=$this->user_id;
		//$ans=$this->img->getImgPage($data);
		header("Content-Type: text/xml");
		$res="<root>";
		/*
		foreach ($ans as $key) {
			var_dump($key);
			echo "<br/>";
			//$res.="<imgId>".$key["img_id"]."</imgId>";
			//$res.="<imgName>".$key["upload_name"]."</imgName>";
			//$res.="<imgTime>".$key["upload_time"]."</imgTime>";
			$res.="<imgId>2</imgId>";
			$res.="<imgName>a.jpg</imgName>";
			$res.="<imgTime>2010/2/12</imgTime>";
		}
		 */
		for($i = 0; $i < 6;$i++){
			$res.="<imgName>a.jpg</imgName>";
			$res.="<imgUrl>".base_url("image/a.jpg")."</imgUrl>";
		}
		$res.="</root>";
		echo $res;
	}
}
?>
