<?php
/**
 * author:			unasm
 * email:			douunasm@gmail.com
 * last_modefied:	2013/04/18 08:29:42 PM
 * 这里面继承了搜索的一切操作，因为没有对应的表，所以没有对应的model文件，将来在数据库中添加关键词会添加相应的model，ast的代码比较挫，要不要拷贝一些呢。看看吧
 * 
 **/
class Search extends MY_Controller
{
	var $pageNum;	
	function __construct()
	{
		parent::__construct();
		$this->load->model("art");
		$this->load->model("user");
		$this->pageNum = 16;
	}
	public function index($currentPage = 0)
	{//通过减少查询工作量，增加查询次数，减少io读写，我想是一个优化，具体，其实还是需要检验
		if($currentPage<0){
			show_404();
			return;
		}
		$keyword = trim($_GET["key"]);
		$key = preg_split("/[^\x{4e00}-\x{9fa5}0-9a-zA-Z]+/u",$keyword);//以非汉字，数字，字母为分界点开始分割;
		$id = array();//$id中保存了获得的$id
		for($i = 0; $i < count($key);$i++){
			if(mb_strlen($key[$i],"UTF8")<2)continue;//小于1个的字是没有任何搜索价值的，必须是词语才可以
			$temp = $this->art->getIdByKey($key[$i]);
			var_dump($temp);
			$id = $temp+$id;//输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
			//$id = array_merge($temp,$id);//输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
			//在merge中会覆盖掉重复的,也就是省去了unique的阶段
			//if(count($id)>$this->pageNum*($currentPage+1))break;
		}
		var_dump($id);
		$res = array();
		$timer = 0;
		for($i = $currentPage*$this->pageNum; ($i < count($id))&&($i < $this->pageNum*($currentPage+1));$i++){
			$temp = $this->art->getSeaResById($id[$i]["art_id"]);
			if(count($temp) == 1){
				$temp = $temp["0"];
				for($j = 0; $j < count($key);$j++){
					$temp["title"] = preg_replace("/".$key[$j]."/","<b>".$key[$j]."</b>",$temp["title"]);
				}
				//正则高亮
				$userInfo = $this->user->getNess($temp["author_id"]);
				$temp["userName"] = $userInfo[0]["user_name"];
				$temp["photo"] = $userInfo[0]["user_photo"];
				$temp["art_id"] = $id[$i]["art_id"];
				$temp["partName"] = $this->partMap[$temp["part_id"]];
				$res[$timer++] = $temp;
			}
		}
			echo json_encode($res);
	}
}
?>
