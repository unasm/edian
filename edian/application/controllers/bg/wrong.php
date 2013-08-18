<?php
/*************************************************************************
    > File Name :     ../controllers/bg/wrong.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-18 10:02:56
 ************************************************************************/
/**
 * 这里是处理错误情况的，将来这里会不断的丰富的，目前只是处理打印失败的，
 */
class Wrong extends MY_Controller
{
    var $type,$user_id;
    /**
     * type是用户类型，也是权限的象征，type 3为管理员，1，2为用户和商家，但是都不允许进来
     */
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->user_id_get();
        $this->load->model("mwrong");
    }
    public function index()
    {
        if(!$this->user_id){
            //检查是否登录
            $this->noLogin(site_url("bg/wrong/index"));
            return;
        }
        $type = $this->getTp($this->user_id);
        if((!$type) || ($type < 3)){
            echo "抱歉，您没有权限浏览";
            return;
        }
        $data["wrong"] = $this->mwrong->getAll();
        $this->load->view("bgWrong",$data);
    }
    public function showArr($arr)
    {
        echo "<br/>";
        foreach($arr as $idx => $val){
            echo $idx."=>";
            var_dump($val);
            echo "<br/>";
        }
        echo "<br/>";
    }
    private function getTp($userId)
    {
        $this->load->model("user");
        return $this->user->getType($userId);
    }
}
?>
