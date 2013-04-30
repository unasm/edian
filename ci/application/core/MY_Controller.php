<?php
/**
 * 这个是为了管理扩展方便，目前，其实还是没有太多的作用，类似于id，但是alert还是放到了library中
 **/
class MY_Controller extends  CI_Controller
{
	public $partMap;
	public $adminMail;
	function __construct()
	{
		parent::__construct();
		session_start();
		date_default_timezone_set("Asia/Shanghai");
		$this->load->library("session");
		$this->adminMail = "1264310280@qq.com";
		$this->partMap = array(
			"0" => "热门",
			"1" => "推荐",
			"2" => "商店",
			"3" => "二手市场",
			"4" => "学习资源"
		);
		$this->max_img_width = 800;
		$this->max_img_height = 505;
		$this->img_save_path = "./upload/";
		$this->thumb_path = "./thumb/";
	}
	public function checkAuth()
	{
		//检查用户是否登陆，没有登陆返回0，登陆了返回1,暂时不完成，以后完成
	}
	public function user_id_get()
	{//或许可以选择保存在数据库，但是总要有一个唯一的标示，我想或许是session_id吧
		$user_id = false;
		if($this->session->userdata("user_id")!=""){
			$user_id = $this->session->userdata("user_id");
			$intUser = intval($user_id);
			if(is_numeric($user_id)&&($intUser == $user_id)){
				return $user_id;
			}
		}
		return $user_id;
	}
	public  function fb_unique($array2D)
	{//将二维的数组转变成为一维数组,方便unique
		foreach ($array2D as $key) {
			$key = join(",",$key);
			$reg[] = $key;
		}
		$reg = array_unique($reg);	
		return $reg;
	}
	function ans_upload(){       
		//对上传进行处理的函数，去掉了jump的部分，使它更富有扩展性
		//1,没有登陆，2，图片重复,3,其他的原因，
		$re["flag"] = 1;
		$user_id=$this->user_id_get();
		if($user_id==false){
			$re["atten"] = "请首先登陆";
			return $re;
		}
		$config['max_size']='2000000';
		$config['max_width']='2500';
		$config['max_height']='2000';//here need to be changed someday
		$config['allowed_types']='gif|jpg|png|jpeg';//即使在添加PNG JEEG之类的也是没有意义的，这个应该是通过php判断的，而不是后缀名
		$config['max_filename'] = 100;
		$config['upload_path']= $this->img_save_path;
		$config['file_name']=$user_id.time().".jpg"; //这里将来修改成前面是用户的id，这样，就永远都不会重复了   
		$this->load->library('upload',$config);
		$this->load->model("img");//图片验重复使用
		if($this->input->post("sub")){
			$upload_name=$_FILES['userfile']['name'];        // 当图片名称超过100的长度的时候，就会出现问题，为了系统的安全，所以需要在客户端进行判断
			if($this->img->judgesame($upload_name)){
				$re["atten"] = "图片重复，您已经提交过同名图片";
				return $re;
			}
			else {
				if(!$this->upload->do_upload()){
					$error = $this->upload->display_errors();//这里的英文将来要汉化
					$re["atten"] = $error;
					return; 
				}
				else {
					$temp=$this->upload->data();
					$this->load->library("image_lib");
					if(($temp['image_width']> $this->max_img_width )||($temp['image_height']> $this->max_img_height)){
						$this->thumb_add($temp['full_path'],$temp['file_name'],$this->img_save_path,$this->max_img_width,$this->max_img_height);
					}
					$this->thumb_add($temp['full_path'],$temp['file_name'],$this->thumb_path,100,100);//生成缩略图
					$intro = $this->input->post("intro");//上传就是上传，数据的处理就交给其他的吧
					$re["flag"] = 0;
					$re["file_name"] = $temp['file_name'] ;
					$re["upload_name"] = $upload_name;
					return $re;
				}
			}
		}
	}   
	public function thumb_add($path,$name,$newPath,$width,$height){
		//生成缩小图的函数
		$this->load->library("upload");
		$config['image_library']='gd2';
		$config['source_image']=$path;
		$config['new_image'] = $newPath;//和原来的图片是同一个路径,在construct中指定；
		$config['create_thumb']=true;
		$config['maintain_ratio']=true;//保持原来的比例
		$config['width']= $width;
		$config['height']= $height;//我希望得到的效果是一个宽度最大为600，但是如果宽度超过一个屏幕也是不可以的，也是不必要的，一旦超过一个屏幕的时候，即使宽度已经小于600也要缩小
		$config['thumb_marker']="";//禁止自动添加后缀名
		//$config['master_dim']="auto";//自动设置定轴,目前觉得好无用处
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()){
			var_dump($this->image_lib->display_errors());
			var_dump("请联系管理员:".$this->adminMail);
		}
	}               
	/*
	public function userInfoGet()
	{
		//获得用户的信息，根据就是sessionId,返回用户名，id，密码
		$this->load->model("monline_user");
		$res = $this->monline_user->checkOnline($_SESSION['id']);
		var_dump($res);
		echo "<br/>";
		var_dump("检查下这个错误的时候返回的是不是false，正确的时候返回的是数组MY_Controller/userInfoGeg");
		if($res){
			return $res["user_id"];
		}
		return false;
	}
	public function userInfoSet($userid,$userName,$passwd)
	{
		//代替原来的sessiondataset，向数据库保存用户信息,使用之前确保用户不在线
		$this->load->model("monline_user");
		$data["user_id"] = $userid;
		$data["user_name"] = $userName;
		$data["passwd"] = $passwd;
		$data["time"] = now();
		var_dump($data["time"]);
		echo "<br/>";
		var_dump("检查下这个时间是不是时间戳的格式，不是就错了，MY_Controller/userInfoSet");
		die;
		$this->monline_user->denglul($data);
	}
	public function userInfoDel()
	{
		//删除用户信息，
		$this->monline_user->delete($_SESSION['id']);
	}
*/
}
?>
