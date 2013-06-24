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
}
?>
