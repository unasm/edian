<?php
//该文件的作用是处理登录和注册的，包含了所有的关于用户注册登陆的操作
//artD需要改进呢，具体看artD
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
	public function change()
	{
		$userId = $this->user_id_get();
		if(!$userId)exit("请登陆后修改");
		/***调转初始化**********************/
		/********************/
		$re = false;
		$user = $this->user->getPubById($userId);//get user_name reg_time,user_photo
		if($user == false)
			exit("没有该用户");
		$data["photo"]= $this->ans_upload();//如果返回的是数组，就是失败了
		if(@array_key_exists("failed",$data["photo"])){
			if($data["photo"]["failed"]!=3){
				$re.= $data["photo"]["atten"];
			}
			$data["photo"] = $user["user_photo"];
		}
		$temp = $this->regInfoCheck();
		if(array_key_exists("failed",$temp)){
			$atten["atten"] = "失败了，原因:".$temp["atten"];
			$atten["uri"] = site_url("info");
			$atten["uriName"] = "用户信息页";
			$atten["title"] = "出错了";
			$atten["time"] = 5;
			$this->load->view("jump",$atten);
			return;
		}
		$data = array_merge($temp,$data);
		if(($user["user_name"]!=$data["name"])&&($this->user->checkname($data["name"]))){
			exit("用户名重复");
		}
		$data["addr"] = trim($this->input->post("add"));
		$data["email"] = trim($this->input->post("email"));
		$data["intro"] = trim($this->input->post("intro"));
		$res = $this->user->changeInfo($data,$userId);
		if($res){
			if($re){
				$atten["atten"] = "图片上传失败,原因:".$re;
				$atten["uri"] = site_url("info");
				$atten["uriName"] = "信息页";
				$atten["title"] = "图片上传失败";
				$atten["time"] = 5;
				$this->load->view("jump",$atten);
			}else redirect(site_url("info"));
		}
	}
	private function regInfoCheck()
	{//是change和regSub数据检查的函数,通常在函数之前执行;
	//因为只是作为被调用的函数，调转就免了把
	if($_POST['sub']){
		$data["name"] =trim($this->input->post("userName"));
		$atten["failed"] = false;
		$ans = preg_match("/[\[\];\"\/?:@=#&<>%{}\\\|~`^]/",$data["name"]);
		if($ans){
			$atten["atten"] = "出现不允许出现字符";
			return $atten;
		}
		if($data["name"] == ""){
			$atten["atten"] = "忘记输入用户名，请点击后退重新输入";
			return $atten;
		}
		else {
			$data["contract1"] = trim($this->input->post("contra"));
			$data["contract2"] = trim($this->input->post("contra2"));
			if($data["contract1"]  == ""){
				$atten["atten"] = "请输入联系方式";
				return $atten;
			}
		}
		return $data;
	}
	}
	public function regSub()	{//处理注册内容的函数;
	$re = false;//作用是为添加失败添加原因
	$atten["uri"] = site_url("reg/index");
	$atten["uriName"] = "注册";
	$temp = $this->ans_upload();
	$data = $this->regInfoCheck();//失败的时候返回包含failed的数组
	if(array_key_exists("failed",$data)){//对用户名是否包含禁止字符判断
		$atten["atten"] = $data["atten"];
		$atten["title"] = "出错了";
		$this->load->view("jump",$atten);
		return;
	}
	if(is_array($temp)){//判断是否成功，是则赋值，否，则看是否上传，否，则直接false，是，则提示
		if($temp["failed"]!=3){
			$re = "图片未上传成功，请在之后用户空间中修改";
		}
		$data["photo"] = false;
	}else {
		$data["photo"] = $temp;
	}
	if(array_key_exists("failed",$data)){
		$atten["title"] = "失败了";
		$atten["atten"] = $data["atten"];
		$this->load->view("jump",$atten);
		return;		
	}
	$data["addr"] = $this->input->post("add");
	$data["passwd"] = $this->input->post("passwd");
	$repass = $this->input->post("repasswd");
	if($data["passwd"] != $repass){
		$atten["title"] = "两次输入密码不同";
		$atten["atten"] = "两次输入密码不同";
		$this->load->view("jump",$atten);
		return false;
	}
	if($repass == ""){
		$atten["atten"] = "忘记输入密码,点击后退，可以避免重新输入数据";
		$atten["title"] = "忘记输入密码";
		$this->load->view("jump",$atten);
		return false;
	}
	if($this->user->checkname($data["name"])){
		$atten["title"] = "用户名重复，请更换用户名";
		$atten["atten"] = "用户名重复，请后退后更换";
		$this->load->view("jump",$atten);
		return false;
	}
	$data["email"] = $this->input->post("email");
	$data["intro"] = $this->input->post("intro");
	$ans = $this->user->insertUser($data);
	if($ans){
		$this->session->set_userdata("user_name",$data["name"]);
	//	$this->session->set_userdata("passwd",$data["passwd"]);
		$userId =  $this->user->checkname($data["name"]);
		$this->session->set_userdata("user_id",$userId["user_id"]);
		$this->user->changeLoginTime($userId["user_id"]);//修改登陆时间，还未检查
		$atten["title"] = "恭喜您，注册成功";
		$atten["atten"] = "恭喜，欢迎来到Edian<br/>".$re;
		$atten["uri"] = site_url("mainpage");
		$atten["uriName"] = "主页";
		$this->load->view("jump",$atten);
		return;
	}
	else{
		$atten["title"] = $ans;
		$atten["atten"] = $ans;
		$this->load->view("jump",$atten);
	}
	}
	public function index()
	{
		$this->load->view("reg");
	}
	public function artD($name,$passwd)
	{//这里对应的是前台的showart和art.js中的ajax申请
		//感觉这里需要进行判断呢，一旦用户name中有很奇葩的名字，会出问题的
		$name = urldecode($name);
		$passwd = urldecode($passwd);
		$res = $this->user->checkname($name);
		if($res){
			if($passwd == $res["user_passwd"]){
				$re["user_id"] = $res["user_id"];
				$this->_lSet($res["user_id"],$name);
			}
			else $re["user_id"] = 0;
		}else {
			$re["user_id"] = -1;
		}//0 代表密码错误，-1，代表没有该用户，其他代表用户id
		echo json_encode($re);
	}
	/*
	private  function _lSet($userId,$name)
	{//登陆后的信息初始化,不再想保存用户的密码了，
		$this->session->set_userdata("user_id",$userId);
		$this->session->set_userdata("user_name",$name);
	}
	 */
	public function dc($ajax = 0){
		//这个函数其实是对denglu_check的补充，这个是不需要form表单，通过ajax get的方式发送到这里进行判断，和session的操作，一切都是为了不再刷新	
		$ans["flag"] = 1;
		$userId = trim($this->input->post("userId"));
		$passwd = trim(@$this->input->post("passwd"));
		if(strlen($userId) == 0 ){//有待判断
			//来到这里，代表没有通过ajax的手段
			$userName = trim($this->input->post("userName"));
			var_dump($userName);
			echo "userName";
			die;
			if(strlen($userName)){
				$res = $this->user->checkname($userName);
				var_dump($res);
				if($passwd == $res["user_passwd"]){
					$res["userName"] = $userName;
					$this->_lSet($res["user_id"],$res);
					die;
					redirect(site_url());
				}else{
					$data["uri"]=site_url("mainpage");
					$data["uriName"]="主页";
					$data["time"]=30;
					$data["title"]="失败，没有密码不正确";
					$data["atten"] = "密码错误";
					return;
				}
			}else{
				$atten["flag"] = 0;
				$ans["atten"] = "没有输入信息";
			}
		}
		if($ans["flag"]){
			$res=$this->user->getUpdate($userId);//这里只是提取出了name,passwd,id,个人觉得，应该有很多东西值得做的事情，而不止是对比一下而已
			if($res && ($res["user_passwd"]==$passwd)){//一次取出所有的想要的，节省消耗
				var_dump($res);
				echo "<br/><br/>203 line";
				die;
				$this->_lSet($userId,$res);
				$ans["photo"] = $res["user_photo"];
				$ans["mailNum"] = $res["mailNum"];//这里更多是兼容之前的代码，好傻，当初
				$ans["comNum"] = $res["comNum"];//新增加的评论的数目
				$ans["flag"] = 1;
			}
			else{
				$ans["flag"] = 0;
				$ans["atten"] = "用户名或密码错误";
			}
		}
		echo "<br/>231>";
		var_dump($ans);
		die;
		if($ajax){
			echo json_encode($ans);	
		}
		else{
			if($ans["flag"]){
				/*
				$data["uri"]=site_url("mainpage");
				$data["uriName"]="主页";
				$data["time"]=3;
				$data["title"]="登陆成功";
				$data["atten"] = "恭喜您，登陆成功";
				$this->load->view("jump2",$data);
				 */
				redirect(site_url("mainpage"));
			}else{
				$data["uri"]=site_url("mainpage");
				$data["uriName"]="主页";
				$data["time"]=5;
				$data["title"]="失败";
				$data["atten"] = $ans["atten"];
				$this->load->view("jump",$data);
				return;
			}
		}
	}
	public  function _lSet($userId,$res)
	{
		//确认用户登录之后的信息初始化
		$this->session->set_userdata("user_id",$userId);
		$this->session->set_userdata("user_name",$res["user_name"]);
		//$this->session->set_userdata("passwd",$res["user_passwd"]);//需要把passwd给保存起来吗？暂时禁止
		$this->user->changeLoginTime($userId);
	}
	public function denglu()
	{
		if($_POST['enter']){
			$name = $this->input->post("userId");
			$pass = $this->input->post("passwd");
			$res = $this->user->checkname($name);
			if($res == false){
				exit("没有该用户，请退回重新输入");
			}
			else {
				if($pass == $res["user_passwd"]){
					$this->session->set_userdata("user_id",$res["user_id"]);
					$this->session->set_userdata("user_name",$res["user_name"]);
					$this->session->set_userdata("passwd",$res["user_passwd"]);
					$this->user->changeLoginTime($res["user_id"]);
					$data["uri"]=site_url("mainpage?".$res["user_id"]);
					$data["uriName"]="主页";
					$data["time"]=3;
					$data["title"]="登陆成功";
					$data["atten"] = "恭喜您，登陆成功";
					$this->load->view("jump",$data);
				}
				else {
					exit("用户名不正确");
				}
			}
		}
	}
	function get_user_name($name = ""){
		//该函数是为前段的js服务的//其实也可以为reg服务不是吗
		header("Content-Type: text/xml; charset=utf-8");
		/*
		 * 预设中 checkname就是根据$name再数据库中比对，然后返回密码的。如果没有返回密码，则返回false；
		 */
		$name = urldecode($name);//目前tianyi ，老大测试还是可以的，将来还需要验证
		$ans = preg_match("/[\[\];\"\/?:@=#&<>%{}\\\|~`^]/",$name);
		if($ans){
			echo "<root><id>0</id></root>";
			return;
		}
		$res=$this->user->checkname($name);
		$ans="<root>";
		if($res)	
		{
			$ans.="<id>".$res["user_id"]."</id>";
			/*传递出去passwd是危险的行为
				$ans.="<passwd>".$res[0]["user_passwd"]."</passwd>";
			 */
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
			if($res["user_passwd"]==$this->input->post("passwd")){
				$this->session->set_userdata("user_id",$res["user_id"]);
				$this->session->set_userdata("user_name",$res["user_name"]);
				$this->session->set_userdata("passwd",$res["user_passwd"]);
				//因为无法读取session的缘故，取消这种方式，将来添加cookie
				//$this->id->alert("恭喜您登陆了");
				$data["uri"]=site_url("mainpage?".$res["user_id"]);
				$this->user->changeLoginTime($res["user_id"]);
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
	{//这里2013/05/04 10:07:49 AM做了修改，未知是否有问题
		$flag = 0;
		$res = $this->user->getPassById($userId);
		if($res == false){
			echo json_encode($flag);
			return;
		}
		$passwd = urldecode($passwd);
		if($res["user_passwd"] == $passwd){
			$flag = 1;
		}
		echo json_decode($flag);
	}

	public function upload()
	{//这里是上传函数，对应相册中的上传
		$userId = $this->user_id_get();
		if(!$userId){
			exit("<a href = '".site_url('mainpage')."'>E点</a>请首先登陆");
		}
		$temp = $this->user->getNess($userId);
		if(count($temp)==1){
			$temp = $temp[0];
		}else exit("没有该用户");
		$data["title"] = $temp["user_name"]."的空间";
		$data["masterId"] = $userId;
		$data["photo"] = $temp["user_photo"];
		$this->load->view("upload",$data);
	}
	public function ans_upload(){       
		//对上传进行处理的类	
		$config['max_size']='5000000';
		$config['max_width']='4500';
		$config['max_height']='4000';//here need to be changed someday
		$config['allowed_types']='gif|jpg|png|jpeg';//即使在添加PNG JEEG之类的也是没有意义的，这个应该是通过php判断的，而不是后缀名
		$config['max_filename'] = 100;
		$upload_name=time().".jpg";        // 当图片名称超过100的长度的时候，就会出现问题，为了系统的安全，所以需要在客户端进行判断
		$config['upload_path']= $this->img_save_path;
		$config['file_name']=$upload_name;    
		$temp=$_FILES['userfile']['name'];        // 当图片名称超过100的长度的时候，就会出现问题，为了系统的安全，所以需要在客户端进行判断
			if(strlen(trim($temp)) == 0){
				$data["failed"] = 3;
				$data["atten"] = "没有上传图片";
				return $data;
			}
		$this->load->library('upload',$config);
		//$this->load->model("img");//因为不再插入数据，所以也用不到它了吧
		if(!$this->upload->do_upload()){
			$error = $this->upload->display_errors();
			$data["atten"] = $error;
			$data["failed"] = false;
			return $data;
		}
		else {
			$temp=$this->upload->data();
			if(($temp['image_width']> $this->max_img_width )||($temp['image_height']> $this->max_img_height))
				$this->thumb_add($temp['full_path'],$temp['file_name']);
			//因为担心用户的图片的名称会造成路径不支持的问题，所以决定增加同一名称，并且，保存原来的名称
			return $upload_name;
		}
	}   
	protected  function thumb_add($path,$name){//为什么这里不可以是private 呢，这里重写了MY_Controller/thumb_add
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
			var_dump("请联系管理员".$this->adminMail);
		}
	}               
}	
?>	
