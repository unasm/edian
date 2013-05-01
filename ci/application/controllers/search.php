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
			if(mb_strlen($key[$i],"UTF8")<2)continue;					//小于1个的字是没有任何搜索价值的，必须是词语才可以
			$temp = $this->art->getIdByKey($key[$i]);
			$id = array_merge($temp,$id);								//输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
			//if(count($id)>$this->pageNum*($currentPage+1))break;
		}
		$id = $this->fb_unique($id);									//虽说为2维数组，但是第二纬只有一个数字，所以合并成为一维数组，然后unique
		//希望可以将这个保存，然后将来就不需要到数据库读取了,或者是到view中读取,这个优化将来完成吧
		$res = array();
		$timer = 0;
		for($i = $currentPage*$this->pageNum; ($i < count($id))&&($i < $this->pageNum*($currentPage+1));$i++){
			$temp = $this->art->getSeaResById($id[$i]);
			if(count($temp) == 1){
				$temp = $temp["0"];
				for($j = 0; $j < count($key);$j++){						//正则高亮
					$temp["title"] = preg_replace("/".$key[$j]."/","<b>".$key[$j]."</b>",$temp["title"]);
				}
				$userInfo = $this->user->getNess($temp["author_id"]);
				if(count($userInfo)==1){//因为之前的局限，现在必须按照这种方法
					//$temp = array_merge($temp,$userInfo[0]);
					$temp["user"] = $userInfo[0];
					$res[$timer++] = $temp;
				}else{
					//为0，是不是代表用户的被删除呢,向管理员报告呢
				}
			}else{
				//这里为0会是什么情况呢，我通过like匹配出结果，然后根据id具体去查找，发现居然没有，要检查
			}
		}
		echo json_encode($res);
	}
}
?>
