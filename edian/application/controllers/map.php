<?php
/*************************************************************************
    > File Name :     controllers/map.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-06-24 15:50:47
 ************************************************************************/
class Map extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model("art");
	}
	public function index()
	{
		$this->load->view("msea");
	}
	public function keyd()
	{
		$key = $_GET["k"];//keyword
		$pos = $_GET["p"];//p position,前面为右上角的位置，后面为坐下的位置
		$pos = preg_split("/|/",$pos);

	}
}
?>
