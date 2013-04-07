<?php
//该文件的作用是处理登录和注册的，包含了所有的关于用户注册登陆的操作
class Reg extends MY_Controller{
	var $max_img_height,$max_img_width,$img_save_path;
	function __construct(){
		parent::__construct();
		$this->load->model("user");
		$this->max_img_width = 200;
		$this->max_img_height = 200;
		$this->img_save_path = "./upload/";
		$this->load->helper(array('form'));
	}
	public function regSub()	{//处理注册内容的函数;
	if($_POST['sub']){
		$data["name"] = $this->input->post("userName");
		$data["passwd"] = $this->input->post("passwd");
		$repass = $this->input->post("repasswd");
		$atten["uri"] = site_url("reg/index");
		$atten["uriName"] = "注册";
		$atten["time"] = 5;
		if($data["name"] == ""){
			$atten["title"] = "请输入用户名";
			$atten["atten"] = "忘记输入用户名，请点击后退重新输入";
			$this->load->view("jump",$atten);
			return;
		}
		if(count($this->user->checkname($data["name"])) > 0){
			$atten["title"] = "用户名重复，请更换用户名";
			$atten["atten"] = "用户名重复，请后退后更换";
			$this->load->view("jump",$atten);
			return;
		}
		if($data["passwd"] != $repass){

			$atten["title"] = "两次输入密码不同";
			$atten["atten"] = "两次输入密码不同";
			$this->load->view("jump",$atten);
			return;
		}
		if($repass == ""){
			$atten["atten"] = "忘记输入密码,点击后退，可以避免重新输入数据";
			$atten["title"] = "忘记输入密码";
			$this->load->view("jump",$atten);
		}
		else {
			$data["contract1"] = $this->input->post("contra");
			$data["contract2"] = $this->input->post("contra2");
			if($data["contract1"]  == ""){
				$atten["title"] = "请输入联系方式";
				$atten["atten"] = "请输入联系方式";
				$this->load->view("jump",$atten);
				return;
			}
			$data["addr"] = $this->input->post("add");
			$data["email"] = $this->input->post("email");
			$data["intro"] = $this->input->post("intro");
			$data["photo"]= $this->ans_upload();
			$ans = $this->user->insertUser($data);
			if($ans){
				$this->session->set_userdata("user_name",$data["name"]);
				$this->session->set_userdata("passwd",$data["passwd"]);
				$userId =  $this->user->checkname($data["name"]);
				$userId  = $userId[0]["user_id"];
				$this->session->set_userdata("user_id",$userId);
				$atten["title"] = "恭喜您，注册成功";
				$atten["atten"] = "恭喜，欢迎来到Edian";
				$atten["uri"] = site_url("mainpage");
				$atten["uriName"] = "主页";
				$this->load->view("jump",$atten);
			}
			else{
				$atten["title"] = $ans;
				$atten["atten"] = $ans;
				$this->load->view("jump",$atten);
			}
		}
	}	
	else {
		echo "<script language=javascript> alert('很遗憾，注册失败')</script>";
	}
	}
	public function index()
	{
		$this->load->view("reg");
	}
	public function artD($name,$passwd)
	{//这里对应的是前台的showart和art.js中的ajax申请
		$res = $this->user->checkname($name);
		if(count($res) == 1){
			$res = $res[0];
			if($passwd == $res["user_passwd"]){
				$re = $res["user_id"];
				$this->session->set_userdata("user_id",$res["user_id"]);
				$this->session->set_userdata("user_name",$res["user_name"]);
				$this->session->set_userdata("passwd",$res["user_passwd"]);
			}
			else $re = 0;
		}else {
			$re = -1;
		}//0 代表密码错误，-1，代表没有该用户，其他代表用户id
		echo json_encode($re);
	}
	public function denglu()
	{
		if($_POST['enter']){
			$name = $this->input->post("userName");
			$pass = $this->input->post("passwd");
			$res = $this->user->checkname($name);
			if(count($res) == 0){
				exit("没有该用户，请退回重新输入");
			}
			else {
				$res = $res[0];
				if($pass == $res["user_passwd"]){
					$this->session->set_userdata("user_id",$res["user_id"]);
					$this->session->set_userdata("user_name",$res["user_name"]);
					$this->session->set_userdata("passwd",$res["user_passwd"]);
					echo "登陆成功";
				}
				else {
					exit("用户名不正确");
				}
			}
		}
	}
	/*
	function  denglu(){
		$data['attention']="";
		if(@$_POST['sub']){
			;	
		}
		$this->load->view("userDengLu",$data);
	}
	 */
	function get_user_name($name){
		//该函数是为前段的js服务的//其实也可以为reg服务不是吗
		header("Content-Type: text/xml; charset=utf-8");
		/*
		 * 预设中 checkname就是根据$name再数据库中比对，然后返回密码的。如果没有返回密码，则返回false；
		 */
		$name = urldecode($name);//目前tianyi ，老大测试还是可以的，将来还需要验证
		$res=$this->user->checkname($name);
		$ans="<root>";
		if($res)	
		{
			$ans.="<id>".$res[0]["user_id"]."</id>";
			$ans.="<passwd>".$res[0]["user_passwd"]."</passwd>";
		}
		else {
			$ans.="<id>0</id>";
		}
		$ans.="</root>";
		echo $ans;
	}
	function denglu_check(){
		/*
		 *之前的函数的作用是通过js判断用户的信息对否正确，这里为了安全，通过js判断另一次
		 在函数中进行userid和name的对比，保存cookie和session；
		 */	
		if($_POST['sub']){
			$res=$this->user->checkname($this->input->post("user_name"));//这里只是提取出了name,passwd,id,个人觉得，应该有很多东西值得做的事情，而不止是对比一下而已
			$res = $res[0];
			if($res["user_passwd"]==$this->input->post("passwd")){
				$this->session->set_userdata("user_id",$res["user_id"]);
				$this->session->set_userdata("user_name",$res["user_name"]);
				$this->session->set_userdata("passwd",$res["user_passwd"]);
				//因为无法读取session的缘故，取消这种方式，将来添加cookie
				//$this->id->alert("恭喜您登陆了");
				$data["uri"]=site_url("mainpage?".$res["user_id"]);
				$data["uriName"]="主页";
				$data["time"]=5;
				$data["title"]="登陆成功";
				$data["atten"] = "恭喜您，登陆成功";
				$this->load->view("jump",$data);
			}
			else {
				//echo "<script type='text/javascript'>history.back()</script>";
			}
		}
	}
	public function getPass($userId,$passwd)
	{
		$res = $this->user->getInfoById($userId)["0"];
		$flag = 0;
		if($res["user_passwd"] == $passwd){
			$flag = 1;
		}
		echo json_decode($flag);
	}
	public function dc($userId,$passwd){
		//denglu_check
		//这个函数其实是对denglu_check的补充，这个是不需要form表单，通过ajax get的方式发送到这里进行判断，和session的操作，一切都是为了不再刷新	
		$res=$this->user->getInfoById($userId);//这里只是提取出了name,passwd,id,个人觉得，应该有很多东西值得做的事情，而不止是对比一下而已
		$res = $res["0"];//I will check is  it work?
		$flag = 0;
		if($res["user_passwd"] == $passwd){
			$this->session->set_userdata("user_id",$res["user_id"]);
			$this->session->set_userdata("user_name",$res["user_name"]);
			$this->session->set_userdata("passwd",$res["user_passwd"]);
			$flag = 1;
		}
		//$re = "<root>".$flag."</root>";
		echo json_encode($flag);
	}
	private function ans_upload(){       
		return false;
		if($this->input->post("userfile") == false){  
			return false;
		}
		//对上传进行处理的类	
		$config['max_size']='2000000';
		$config['max_width']='2500';
		$config['max_height']='2000';//here need to be changed someday
		$config['allowed_types']='gif|jpg|png|jpeg';//即使在添加PNG JEEG之类的也是没有意义的，这个应该是通过php判断的，而不是后缀名
		$config['max_filename'] = 100;
		$upload_name=time().".jpg";        // 当图片名称超过100的长度的时候，就会出现问题，为了系统的安全，所以需要在客户端进行判断
		$config['upload_path']= $this->img_save_path;
		$config['file_name']=$upload_name;    
		$this->load->library('upload',$config);
		$this->load->model("img");
		if(!$this->upload->do_upload()){
			$error = $this->upload->display_errors();
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
			$data["title"] = $err;
			$data["atten"] = $err;
			$data["uri"] = site_url("reg/index");
			$data["uriName"] = "注册页";
			$data["time"] = 5;
			$this->load->view("jump",$data);
		}
		else {
			$temp=$this->upload->data();
			if(($temp['image_width']> $this->max_img_width )||($temp['image_height']> $this->max_img_height))
				$this->thumb_add($temp['full_path'],$temp['file_name']);
			$res=$this->img->mupload($temp['file_name'],$upload_name,$user_id);//这里的2将来要修改成为用户的id ,目前已经实现，但是还未经测试
			//因为担心用户的图片的名称会造成路径不支持的问题，所以决定增加同一名称，并且，保存原来的名称
			return $upload_name;
		}
	}   
	private function thumb_add($path,$name){
		//生成缩小图的函数
		$this->load->library("upload");
		$config['image_library']='gd2';
		$config['source_image']=$path;
		$config['new_image'] = $this->img_save_path;//和原来的图片是同一个路径,在construct中指定；
		$config['create_thumb']=true;
		$config['maintain_ratio']=true;//保持原来的比例
		$config['width']=$this->max_img_width;
		$config['height']=$this->max_img_height;//我希望得到的效果是一个宽度最大为600，但是如果宽度超过一个屏幕也是不可以的，也是不必要的，一旦超过一个屏幕的时候，即使宽度已经小于600也要缩小
		$config['thumb_marker']="";//禁止自动添加后缀名
		//$config['master_dim']="auto";//自动设置定轴,目前觉得好无用处
		$this->load->library('image_lib',$config);
		if(!$this->image_lib->resize()){
			var_dump($this->image_lib->display_errors());
			var_dump("请联系管理员,douunasm@gmail.com");
		}
	}               
}	
?>	
