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
        $this->load->model("user");
        $type = $this->user->getType($this->user_id);
        $data = Array();
        if($type){
            $data["item"] = $this->mitem->getAllList();
        }else{
            $data["item"] = $this->mitem->getBgList($this->user_id);
        }
        //$this->showArr($data);
        $this->load->view("bgItemMan",$data);
    }
    public function set($state = -1,$itemId = -1)
    {
        if($itemId == -1){
            echo "没有指明删除的物品";
            return;
        }
        if($state == -1){
            echo "没有标明状态";
            return;
        }
        $this->mitem->setState($state,$itemId);
        redirect(site_url("bg/item/mange"));//修改之后，返回原来页面
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
