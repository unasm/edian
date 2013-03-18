<?php
class Test extends MY_Controller{
		var  $user_id="";
		function __construct()				{
				parent::__construct();
				$this->user_id = $this->user_id_get();
		}
		function index(){
			$this->load->view("userSpace2");
		}
		public function respon()
		{
			echo "here is the response";
		}
		public function main()
		{
			$this->load->view("index");
		}
		public function donghua()
		{
			$this->load->view("donghua");
		}
}
?>	
