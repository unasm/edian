<?php
/*
 * 在下面的thumb函数中有一处使用了绝对路径的地方，将来更改的时候要注意，如果学会了如何读取config的话，可以替换掉。
 * 下面包括的函数包括上传处理，编辑器使用以及插入文章，分页，和缩小图片的生成
 * 上传的内容要从这里拆分出去，独立成一个class
 * */
class Chome extends MY_Controller{
	var $max_img_height,$max_img_width,$img_save_path;
	function __construct(){
		parent::__construct();
		$this->max_img_width = 800;
		$this->max_img_height = 550;
		$this->img_save_path = "./upload/";
		$this->load->helper(array('form'));
		$this->load->model('mhome');
	}
	function index(){
		$data['title'] = $this->mhome->home_title();
		$this->load->view('home',$data);
	}
	function bubble(){
		$this->load->view("bubble")				;
	}
	function editor(){
		//这个函数是和edian数据库项符合的
		$this->load->library("ckeditor");
		$this->ckeditor->basePath=base_url().'ckeditor/';
		$this->ckeditor->Width="100";
		$this->ckeditor->Height="100";
		//$this->load->view("veditor");
		$cont="hello,here is ckeditor /chome/eidtor/";
		$data["cke"]=$this->ckeditor;
		$this->load->view("veditor",$data);
		//	$this->ckeditor->editor('content',$cont);
	}
	function reditor(){
		//这个函数是和edian数据库项符合的
		$title=$this->input->post("title");
		$cont=$this->input->post("content");
		$part_id=$this->input->post("part_id");
		$user_id=$this->input->post("user_id");//user_id不能这麽取得
		$time=$this->input->post("time");
		$this->load->model("art");
		$value=time();
		for($i = 0; $i < $time ;$i++){
			$re=$this->art->insert_art($title,$cont,$part_id,$user_id,$value);
			if($re)echo "<br/>insert into success;<br/>";
			else echo "<br/>发表失败``<br/>";
		}
	}
	function listart(){
		/*
		 * 这个应该是分页函数
		 */
		$this->load->library("pagination");
		$config['base_url']='http://localhost/index.php/chome/config/';
		$config['per_page']=2;
		$config['first_link']="首页";
		$config['prev_link']="上一页";
		$config['next_link']="下一页";
		$config['last_link']="尾页";
		$config['num_links']=3;
		$id=$this->uri->segment(3);
		if(!$id){
			$id=1;
		}
		$id--;
		$this->load->model("mar_list");
		$cont_page=$this->mar_list->list_perpage(2,$id,2);
		foreach($cont_page as $temp){
			echo $temp->title."  --------------".$temp->time."<br/>";
		}
		$ans=$this->mar_list->listall(2);
		$config['total_rows']=count($ans);
		//$config['total_rows']=20;
		//$config['use_page_numbers']=true;
		$this->pagination->initialize($config);
		echo $this->pagination->create_links();
		$this->load->view("artlist");
	}
	function ans_upload(){       
		//对上传进行处理的类	
		$config['max_size']='2000000';
		$config['max_width']='2500';
		$config['max_height']='2000';//here need to be changed someday
		$config['allowed_types']='gif|jpg|png|jpeg';//即使在添加PNG JEEG之类的也是没有意义的，这个应该是通过php判断的，而不是后缀名
		$config['max_filename'] = 100;
		$config['upload_path']= $this->img_save_path;
		$config['file_name']=time().".jpg";    
		$this->load->library('upload',$config);
		$this->load->model("img");
		$user_id=$this->user_id_get();
		if($user_id==false){
			$data["uri"] = site_url("mainpage");
			$data["uriName"] = "主页";
			$data["title"] = "请先登陆";
			$data["atten"] = "请先登陆";
			$data["time"] = 3;
			$this->load->view("jump",$data);
		}
		if($this->input->post("sub")){
			$upload_name=$_FILES['userfile']['name'];        // 当图片名称超过100的长度的时候，就会出现问题，为了系统的安全，所以需要在客户端进行判断
			//var_dump($upload_name);
			if($this->img->judgesame($upload_name)){
				//				$data['attupention']="您已经提交过同名图片了";//这里将来可以通过ajax在客户端进行一次判断
				$data["uri"] = site_url("spacePhoto");
				$data["uriName"] = "相册";
				$data["title"] = "存在同名文件";
				$data["atten"] = "您已经提交过同名图片了";
				$data["time"] = 5;
				$this->load->view("jump",$data);
			}
			else {
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
					//$data["atten"] ="请选择图片文件，大小不要超过2M,文件名不要超过100字，宽小于2000，长度小于2500，也会造成失败，如果都没有问题，请联系管理员，对您造成的不便表示抱歉";
					$data["atten"] = $err;
					$data["uri"] = site_url("spacePhoto");
					$data["uriName"] = "相册";
					$data["title"] = "上传失败";
					$data["time"] = 30;
					$this->load->view("jump",$data);
				}
				else {
					$temp=$this->upload->data();
					if(($temp['image_width']> $this->max_img_width )||($temp['image_height']> $this->max_img_height))
						$this->thumb_add($temp['full_path'],$temp['file_name']);
					$res=$this->img->mupload($temp['file_name'],$upload_name,$user_id);//这里的2将来要修改成为用户的id ,目前已经实现，但是还未经测试
					//因为担心用户的图片的名称会造成路径不支持的问题，所以决定增加同一名称，并且，保存原来的名称
					$data["atten"]= "上传成功";
					$data["uri"] = site_url("spacePhoto");
					$data["uriName"] = "相册";
					$data["title"] = "上传成功";
					$data["time"] = 3;

					//$this->load->view("jump2",$data);
				}
			}
		}
	}   
	public function test()
	{
		$this->load->view("test");
	}
	function thumb_add($path,$name){
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
	//下面该函数的作用是显示图片在m-showimg上面
	function showimg($id){
		//  $this->load->model("mhome")	;
		$data['name']=$this->mhome->getImgName($id);
		$data['id']=$id;
		$this->load->view('m-showimg',$data);
	}
	/*
	function test(){
		$this->load->view("common_head");
		$this->showimg(8);
		$this->load->view("common_foot");
	}
	 */
}
?>	
