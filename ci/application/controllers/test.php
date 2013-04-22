<?php
class Test extends MY_Controller{
	var  $user_id="",$partmap;
	function __construct()				{
		parent::__construct();
		$this->user_id = $this->user_id_get();
		$this->partmap= array(
			//走进科协
			"0" => array(
				"0" => "科协章程",
				"1" => "领导介绍",
				"2" => "部门职能",
				"3" => "内设机构",
				"4" => "成员名单"
			),
			//工作动态
			"1" => array(
				"5" => "上级新闻", 
				"6" => "科协动态"
			),
			//科普园地
			"2" => array(
				"7" => "科普活动",
				"8" => "科普教育基地",
				"9" => "科普知识大全",
				"10" => "他山之石"
			),	
			//科技工作者之家
			"3" => array(
				"11" => "科技人物",
				"12" => "职称评定",
				"13" => "学习教育"			
			),
			//科技创新
			"4" => array(
				"14" => "院士专家工作站",
				"15" => "金桥工作",
				"16" => "青少年科技创新"		
			),
			//政策文件
			"5" => array(
				"17" => "科技政策",
				"18" => "科普政策",
				"19" => "科协文件"
			),
			//街道科协
			"6" => array(
				"20" => "工作信息",
				"21" => "机构设置"
			),
			//园区科协
			"7" => array(	
				"22" => "工作信息",
				"23" => "机构设置"
			),
			//企事业科协
			"8" => array(
				"24" => "工作信息",
				"25" => "机构设置"
			),
			//老科协
			"9" => array(
				"26" => "工作信息",
				"27" => "机构设置"
			),
			"10" => array(
				"31" =>"科研机构",
				"32" =>"重点高校",
				"33" => "资源下载"
			),
			"28" => "新闻公告",
			"29" => "通知公告",
			"30" => "经验交流",
			"34" => "科协会刊",
			"35" => "科协剪影"   //需要为他们添加特判，但是只是在status-detail中判断就可以了
		);
		$this->head=array(
			"0"=>"走进科协",
			"1"=>"工作动态",
			"2"=>"科普园地",
			"3"=>"科技工作者之家",
			"4"=>"科技创新",
			"5"=>"政策文件",
			"6"=>"街道科协",
			"7"=>"园区科协",
			"8"=>"企事业科协",
			"9"=>"老科协",
			"10" =>"科协资源",
			"28" => "新闻公告",
			"29" => "通知公告",
			"30" => "经验交流",
			"34" => "科协会刊",
			"35" => "科协剪影"
		);
	//	error_reporting("");
	}
	function index(){
		$this->load->view("test");
	}
	private function getHeader($key){
		//这个函数是为了article中的header路径添加的，给定一个健值，返回一个字符串，直接再view中echo ，该文章所在路径的健
		$re = "<a href='".site_url("")."' class='back'>首页</a>";
		while(list($arrayKey,$value) = each($this->partmap)){
			if(is_array($value)){
				if(array_key_exists($key,$value)){
					var_dump($value);
					$re.= "&gt;&gt;<a href = ".site_url("status_main/index/".$arrayKey)."/>".$this->head[$arrayKey]."</a>";
					$re.= "&gt;&gt;<a href = ".site_url("news/show_list_detail/".$key)."/>".$value[$key]."</a>";
					return $re;
				}
			}else{
				if(array_key_exists($key,$this->partmap)){
					$re.= "&gt;&gt;<a href = ".site_url("sonast/index/".$key)."/>".$this->partmap[$key]."</a>";
					return $re;
				}
			}
		}
	}
	public function respon()
	{
		echo "here is the response";
	}
	public function art()
	{
		$data["time"] = time();
		$data["content"] = "就钓鱼岛时间双方交换意见";
		$data["user_name"] = "小泉与野兽";
		$data["reg_time"] = date();
		$data["user_photo"] ="1363246384.jpg";
		$this->load->view("showart2",$data);
	}
	public function main()
	{
		$this->load->view("mainpage2");
	}
	public function donghua()
	{
		$this->load->view("donghua");
	}
	public function message()
	{
		$this->load->view("message");
	}
	public function nic()
	{
		$this->load->view("nic");
	}
	private function show($value)
	{
		var_dump($value);
die;
	}

	private function showArray($value)
	{
		var_dump($value);
		echo "<br/>";
		for($i = 0; $i < count($value);$i++){
			var_dump($value[$i]);
			echo "<br/>";
		}
die;
	}
	public function xhe()
	{
		$this->load->view("uploadxhe");
	}
	public function ans()
	{//目前对应的是xhe函数，编辑器上传图片的后台处理部分，将来需要将大图片压缩成为小图片,目前集中精力处理重要部分吧
		header('Content-Type: text/html; charset=UTF-8');
		$inputName='filedata';//表单文件域name,form的name
		//$attachDir='upload';//上传文件保存路径，结尾不要带/
		$attachDir="upload";//上传文件保存路径，结尾不要带/
		$dirType=2;//1:按天存入目录 2:按月存入目录 3:按扩展名存目录  建议使用按天存
		$maxAttachSize=2097152;//最大上传大小，默认是2M
		$upExt='txt,rar,zip,jpg,jpeg,gif,png';//上传扩展名
		$msgType=2;//返回上传参数的格式：1，url，2，返回参数数组
		$immediate=isset($_GET['immediate'])?$_GET['immediate']:0;//立即上传模式，仅为演示用
		ini_set('date.timezone','Asia/Shanghai');//时区

		$err = "";
		$msg = "''";
		$tempPath=$attachDir.'/'.date("YmdHis").mt_rand(10000,99999).'.tmp';
		$localName='';

		if(isset($_SERVER['HTTP_CONTENT_DISPOSITION'])&&preg_match('/attachment;\s+name="(.+?)";\s+filename="(.+?)"/i',$_SERVER['HTTP_CONTENT_DISPOSITION'],$info)){//HTML5上传
			file_put_contents($tempPath,file_get_contents("php://input"));
			$localName=urldecode($info[2]);
		}
		else{//标准表单式上传
			$upfile=@$_FILES[$inputName];
			if(!isset($upfile))$err='文件域的name错误';
			elseif(!empty($upfile['error'])){
				switch($upfile['error'])
				{
				case '1':
					$err = '文件大小超过了php.ini定义的upload_max_filesize值';
					break;
				case '2':
					$err = '文件大小超过了HTML定义的MAX_FILE_SIZE值';
					break;
				case '3':
					$err = '文件上传不完全';
					break;
				case '4':
					$err = '无文件上传';
					break;
				case '6':
					$err = '缺少临时文件夹';
					break;
				case '7':
					$err = '写文件失败';
					break;
				case '8':
					$err = '上传被其它扩展中断';
					break;
				case '999':
				default:
					$err = '无有效错误代码';
				}
			}
			elseif(
				empty($upfile['tmp_name']) || $upfile['tmp_name'] == 'none')$err = '无文件上传';
			else{
				move_uploaded_file($upfile['tmp_name'],$tempPath);
				$localName=$upfile['name'];
			}
		}
		if($err==''){
			$fileInfo=pathinfo($localName);
			$extension=$fileInfo['extension'];
			if(preg_match('/^('.str_replace(',','|',$upExt).')$/i',$extension))
			{
				$bytes=filesize($tempPath);
				if($bytes > $maxAttachSize)$err='请不要上传大小超过'.$this->formatBytes($maxAttachSize).'的文件';
				else
				{
					$attachSubDir = 'month_'.date('ym');
					/*
					switch($dirType)
					{
					case 1: $attachSubDir = 'day_'.date('ymd'); break;
					case 2: $attachSubDir = 'month_'.date('ym'); break;
					case 3: $attachSubDir = 'ext_'.$extension; break;
					}
					 */
					$attachDir = $attachDir.'/'.$attachSubDir;
					if(!is_dir($attachDir))
					{
						@mkdir($attachDir, 0777);
						@fclose(fopen($attachDir.'/index.htm', 'w'));
					}
					PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
					$newFilename=date("YmdHis").mt_rand(1000,9999).'.'.$extension;
					$targetPath = $attachDir.'/'.$newFilename;
					rename($tempPath,$targetPath);
					@chmod($targetPath,0755);
					$targetPath=base_url("").$this->jsonString($targetPath);
					if($immediate=='1')$targetPath='!'.$targetPath;
					if($msgType==1)$msg="'$targetPath'";
					else {
						//$msg="{'url':'".$targetPath."','localname':'".json_encode($localName)."','id':'1'}";//id参数固定不变，仅供演示，实际项目中可以是数据库ID;
						$msg="{'url':'".$targetPath."','localname':'".$this->jsonString($localName)."','id':'1'}";//id参数固定不变，仅供演示，实际项目中可以是数据库ID;
					}
				}
			}
			else $err='上传文件扩展名必需为：'.$upExt;

			@unlink($tempPath);
		}
		echo "{'err':'".$this->jsonString($err)."','msg':".$msg."}";
	}
	function jsonString($str)
	{
		return preg_replace("/([\\\\\/'])/",'\\\$1',$str);
	}
	function formatBytes($bytes) {
		if($bytes >= 1073741824) {
			$bytes = round($bytes / 1073741824 * 100) / 100 . 'GB';
		} elseif($bytes >= 1048576) {
			$bytes = round($bytes / 1048576 * 100) / 100 . 'MB';
		} elseif($bytes >= 1024) {
			$bytes = round($bytes / 1024 * 100) / 100 . 'KB';
		} else {
			$bytes = $bytes . 'Bytes';
		}
		return $bytes;
	}

}
?>	
