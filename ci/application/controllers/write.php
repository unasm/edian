<?php
/**
 *这个文件是用来发表文章的，之前的测试版本已经在test有过了，现在需要添加js和css，大概不需要太多的css吧js也不需要太多吧
 author:			unasm
 email:			douunasm@gmail.com
 last_modefied:	2013/03/28 12:31:53 AM
 **/
class Write extends MY_Controller
{
	var $userId;	
	function __construct()
	{
		parent::__construct();
		$this->userId = $this->user_id_get();
		$this->load->model("art");
	}
	public function index2()
	{//目前暂时废弃，write和对应的js，view和后台都不改变，将来需要可以随时添加，只是对应的表已经变了
		$data["title"] = "发表新帖";
		if(!$this->userId){
			$atten["uri"] = site_url("mainpage/index");
			$atten["uriName"] = "登陆页面";//如果将来有时间，专门做一个登陆的页面把
			$atten["time"] = 5;
			$atten["title"] = "请首先登陆";
			$atten["atten"] = "请登陆后发表新帖";
			$this->load->view("jump",$atten);
			return;
		}
		$this->load->view("write",$data);
	}
	public function index()
	{//view 中cwrite c代表商业，就是商家的添加，也是默认的添加，有分区，价格的东西，对应的是目前的表
		$data["title"] = "新品上架";
		if(!$this->userId){
			$atten["uri"] = site_url("mainpage/index");
			$atten["uriName"] = "登陆";//如果将来有时间，专门做一个登陆的页面把
			$atten["time"] = 5;
			$atten["title"] = "请首先登陆";
			$atten["atten"] = "请登陆后继续";
			$this->load->view("jump",$atten);
			return;
		}
		$this->load->view("Cwrite",$data);
	}
	public function add()
	{
		if(!$this->userId){
			exit("请登陆后发表帖子");
		}
		if($_POST["sub"]){
			$value = time();//value ，标示一个帖子含金量的函数
			$data["tit"] = trim($this->input->post("title"));
			$data["cont"] = trim($this->input->post("cont"));
			$data["part"] = trim($this->input->post("part"));
			$re = $this->art->insert_art($data["tit"],$data["cont"],$data["part"],$this->userId,$value);
			if($re){
				$data["time"] = 3;
				$data["title"] = "恭喜你，成功了";
				$data["uri"] = site_url("mainpage");
				$data["uriName"] = "主页";
				$data["atten"] = "成功,可喜可贺";
				$this->load->view("jump2",$data);
			}else {
			$this->load->view("write",$data);
			}
		}
	}
	public function imgAns()
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
