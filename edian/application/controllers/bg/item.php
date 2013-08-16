<?php
/*************************************************************************
    > File Name :     ../controllers/bg/item.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-17 00:16:20
 ************************************************************************/
/*
 * 关于后台的一些item的操作集合
 */
class item extends MY_Controller
{
    var $user_id;
    /**
     * 用户必须登录这个，才可以
     */
     function __construct()
    {
        parent::__construct();
        $this->load->model("mitem");
        $this->user_id = $this->user_id_get();
    }
    public function mange()
    {
        if(!$this->user_id){
            $this->noLogin(site_url("bg/item/mange"));
            return;
        }
        $data["item"] = $this->mitem->getBgList($this->user_id);
        //$this->showArr($data);
        $this->load->view("bgItemMan",$data);
    }
    private function showArr($array)
    {
        echo "<br/>";
        foreach($array as $index => $value){
            var_dump($index);
            echo "   =>   ";
            var_dump($value);
            echo "<br>";
        }
        echo "<br/>";
    }
}
?>
