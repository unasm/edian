<?php
/**
 * 这个是为了管理扩展方便，目前，其实还是没有太多的作用，类似于id，但是alert还是放到了library中
 **/
class MY_Controller extends  CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function idGet()
	{
		$id="testing";
	//类似与以前的id class，就是为了获得用户的id
		return $id;
	}
}
?>
