<?php
/**
 * author:			unasm
 * email:			douunasm@gmail.com
 * Last_modified:	2013-06-10 17:14:04
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
	public function res()
	{//增加搜索页面，显示搜索结果
		$keyword = trim($_GET["sea"]);
		$ans = $this->index(0,$keyword,1);
	}
	public function fb_unique($array2D)
	{
		//实例测试，并不理想，第二个数组好像没有作用
		//整理的原则非常简单，首先是排序，对value进行，其次，通过计算重复度，重复度高的在前面，低的在后面，要稳定的算法，所以也按照了价格的从前向后
		//这个至少是nlogn级别的运算，希望可以缓存保存3分钟，或者是其他的方式保存,不用再次运算
		$len = count($array2D);//其实len长度应该限制，因为
		for($i = 0; $i < $len;$i++){
			$id[$i] = $array2D[$i]["art_id"];//id 用来判断重复度，value用来排序时作为第二参数
			$value[$i] = $array2D[$i]["value"];
		}
		$repeat = array_count_values($id);//计算各个id重复次数的函数
		for($i = 0; $i < $len;$i++){
			$re[$i] = $repeat[$array2D[$i]["art_id"]];//作为排序时候的第一参数，re，重复度，
		}
		array_multisort($array2D,SORT_DESC,SORT_STRING,$re,SORT_DESC,SORT_STRING,$value);
		$last = -1;
		$cont = 0;
		var_dump($re);
		echo "<br/>";
		var_dump($array2D);
		echo "<br/>";
		for($i = 0; $i < $len;$i++){
			if($array2D[$i]["art_id"]!=$last){
				$last = $array2D[$i]["art_id"];
				$res[$cont++] = $last;
			}	
		}
		var_dump($res);
		return $res;
	}
	public function index($currentPage = 0)
	{//通过减少查询工作量，增加查询次数，减少io读写，我想是一个优化，具体，其实还是需要检验
	//那么，这个函数将成为我最重要的函数吗？
		if($currentPage<0){
			show_404();
			return;
		}
		$keyword = urldecode(trim($_GET["key"]));
		$key = preg_split("/[^\x{4e00}-\x{9fa5}0-9a-zA-Z]+/u",$keyword);//以非汉字，数字，字母为分界点开始分割;
		$id = array();//$id中保存了获得的$id
		for($i = 0; $i < count($key);$i++){
			if(mb_strlen($key[$i],"UTF8")<2)continue;					//小于1个的字是没有任何搜索价值的，必须是词语才可以
			$temp = $this->art->getIdByKey($key[$i]);
			$id = array_merge($temp,$id);								//输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
			//if(count($id)>$this->pageNum*($currentPage+1))break;
		}
		$id = $this->fb_unique($id);									//虽说为2维数组，但是第二纬只有一个数字，所以合并成为一维数组，然后unique
		return;
		//希望可以将这个保存，然后将来就不需要到数据库读取了,或者是到view中读取,这个优化将来完成吧
		$res = array();
		$timer = 0;
		for($i = $currentPage*$this->pageNum,$idLen = min(count($id),$this->pageNum*($currentPage+1)); $i < $idLen;$i++){
			$temp = $this->art->getSeaResById($id[$i]);
			if($temp){
				for($j = 0,$len = count($key); $j < $len;$j++){						//正则高亮
					$temp["title"] = preg_replace("/".$key[$j]."/","<b>".$key[$j]."</b>",$temp["title"]);
				}
				$userInfo = $this->user->getNess($temp["author_id"]);
				if($userInfo){//因为之前的局限，现在必须按照这种方法
					//$temp = array_merge($temp,$userInfo[0]);
					$temp["user"] = $userInfo;
					$temp["art_id"] = $id[$i];//因为在读取的数字中，没有art_id,这里添加上
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
