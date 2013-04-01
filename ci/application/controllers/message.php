<?php
class Message extends MY_Controller{
	function  __construct(){
		parent::__construct();
	}				
	function index(){
		$this->load->view('message');				
	}
	public function write()
	{
		$this->load->view("messwrite");
	}
}
?>	
