<?php
/**
 *这个文件是用来发表文章的，之前的测试版本已经在test有过了，现在需要添加js和css，大概不需要太多的css吧js也不需要太多吧
 author:			unasm
 email:			douunasm@gmail.com
 last_modefied:	2013/03/28 12:31:53 AM
 **/
class Write extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data["title"] = "发表文章";
		$this->load->view("write",$data);
	}
}
?>
