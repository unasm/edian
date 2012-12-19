<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 这个文件的作用只是一个辅助函数，为了不增加类逻辑上的继承
 **/
class CI_Id 
{
	var $Ci;
	//在这里会放一些常量，或许吧
	function __construct()
	{
		$this->Ci =& get_instance();
	}
	public function alert($content)
	{
		//帮助函数，alert一些东西,尚未测试
		echo "<script language='javascript'>alert($content)</script>";
	}
}
?>
