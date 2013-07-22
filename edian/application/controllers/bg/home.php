<?php
class Home extends MY_Controller{
    function __construct()              {
        parent::__construct()               ;
        $this->load->model("bghome");
        $this->load->model("user");
		$this->user_id = $this->user_id_get();
    }
    function  index(){
        //echo "hello ,here is the bg/home.php ";
        //这里显示的应该是第三版本的后台的页面,通过div布局和iframe的页面
        if(!$this->user_id){
            $this->noLogin();
            return;
        }
        $this->load->view("bghome");
    }
    public function index2()
    {
        $this->load->view("bghome2");
    }
    function index_test(){
        //这里显示的是第二版本的页面，使用framset实现的大致还让人满意的布局
        $this->load->view("bghome_test");
    }
    function head(){
        $this->load->view("m-bghead");
        //echo "<h1>这里是管理员后台,正在建设中,请加油!!</h1>";
    }
    function leftdiruser(){
        $this->load->view("m-bg-home-leftdir-user");
    }
    function leftdirimg(){
        $this->load->view("m-bg-home-leftdir-img");
    }
    function leftdirart(){
        $this->load->view("m-bg-home-leftdir-art");
    }
    function content(){
        $this->load->view("m-bg-home-content");
    }
    function artlist(){
        $data['title']="文章列表";
        $data['allart']=$this->bghome->artlist_all();
        $this->load->view("m-bg-artlist2",$data);
        //$this->load->view("m-bg-home-artlist3",$data);
    }
    function  artdelete($id){
        $this->bghome->artdel($id);
        return $this->db->affected_rows();
        /*
         * 依照我本意,期望能够能够有一个返回值 ,不过后期可以通过使用affect_num决定给前端一个提醒
         */
    }
    function artchange($id){
        $this->load->library("ckeditor")    ;
        $this->ckeditor->basePath=base_url().'ckeditor/';
        $this->ckeditor->Width="100";
        $this->ckeditor->Height="400";
        $data['cont']=$this->bghome->getArtById($id);
        $data['cke']=$this->ckeditor;
        $this->load->view("bgeditor",$data);
    }
    function  reditor($id){
        $this->load->model("meditor");
        $this->meditor->artchange($id);
        redirect(site_url('bg/home/artlist'));
    }
    function artshow($id){
        $data['art']=$this->bghome->getArtById($id);
        //  var_dump($data);
        $this->load->view("m-bg-artshow",$data);
    }
    function itemadd(){
        if(!$this->user_id){
            $this->noLogin();
            return;
        }
        $data['title']="添加文章";
        $data["dir"] = $this->part;
		$data["userType"] = $this->user->getType($this->user_id);
        $this->load->model("img");
        $data["img"] = $this->img->getImgName($this->user_id);
        $this->load->view("mBgItemAdd",$data);
    }
    public function noLogin()
    {
        $data["url"] = site_url("bg/home");
        //redirect(site_url("reg/login/"));
        $this->load->view("login",$data);
    }
    function comment(){
        $data['title']="评论模块";
        $this->load->view("m-comment",$data)                ;
    }
}
?>
