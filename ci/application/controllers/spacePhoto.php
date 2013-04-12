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
		$this->user_id=$this->user_id_get();
		$this->load->model("comment");//comment要改变，下面有利用了这个model的函数
		$this->load->model("img");
	}
	public function index($mastId = -1)
	{
		if($mastId == -1)$mastId = $this->user_id;
		if(!$mastId)show_404();//其实可以提示登陆了
		$this->load->model("user");
		$temp = $this->user->getNess($mastId);
		if(count($temp)){
			$temp = $temp[0];
		}
		else show_404();
		$data["title"] = $temp["user_name"];
		$data["masterId"] = $mastId;
		$data["photo"] = $temp["user_photo"];
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
	public function getThumb($user_id = -1)
	{
		//根据用户的Id获得所有的图片的缩略图，现在只是提供名称，将根据用户的点击不断添加缩略图
		if($user_id == -1){
			echo "0";
			return;
		}
		$ans = $this->img->getUserImg($user_id);
		echo json_encode($ans);
	}
	public function getMainImg($imgId)
	{//根据imgId获得图片信息的函数，包括评价，简介，名称等等
	
	}
}
?>
