<?php
/*************************************************************************
    > File Name :     controllers/map.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-06-24 15:50:47
 ************************************************************************/
class Map extends MY_Controller{
	var $pageNum;
	function __construct()
	{
		parent::__construct();
		$this->pageNum = 24;
		$this->load->model("art");
	}
	public function index()
	{
		$this->load->view("msea");
	}
	public function keyd()
	{
		$key = trim($_GET["k"]);//keyword
		$temp = trim($_GET["p"]);//p position,前面为右上角的位置，后面为坐下的位置
		$page = @trim($_GET["page"]);//page 页数,要申请地几页的内容
		if(strlen($page)== 0)$page = 0;
		$temp = preg_split("/\|/",$temp);
		$pos["st"]["lng"] = $temp[0];
		$pos["st"]["lat"] = $temp[1];
		$pos["en"]["lng"] = $temp[2];
		$pos["en"]["lat"] = $temp[3];
		$seller = $this->art->getSeller($pos);
		if(!$seller){
			//没有查询信息
			return false;
		}
		$key = preg_split("/[^\x{4e00}-\x{9fa5}0-9a-zA-Z]+/u",$key);//以非汉字，数字，字母为分界点开始分割;
		$sql = "";
		for($i = 0,$len = count($seller); $i < $len;$i++){
			$sql.=" author_id = ".$seller[$i]["user_id"];
		}
		$id = array();
		for($i = 0,$len = count($key); $i < $len;$i++){
			if(mb_strlen($key[$i],"UTF8")< 2)continue;
			$temp = $this->art->getIdMap($key[$i],$sql);
			$id = array_merge($temp,$id);
		}
		$id = $this->uniqueSort($id);//整理排序，成单独的序列
		$data = array();
		for($i = max(0,$page*$this->pageNum),$len = min(count($id),($page+1)*$this->pageNum);$i < $len;$i++){
			$temp= $this->art->getById($id[$i]);
			$fornow = preg_split("/ /",$temp["time"]);
			$temp["time"] = $fornow[0];
			$data["cont"] = array_merge($temp,$data);
		}
		if($page == 0){
			$data["seller"] = $seller;	
		}
		var_dump($data);
		//echo json_encode($data);
	}
}
?>
