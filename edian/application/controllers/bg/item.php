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
    var $user_id,$ADMIN;
    /**
     * 用户必须登录这个，才可以
     */
     function __construct()
    {
        parent::__construct();
        $this->load->model("mitem");
        $this->user_id = $this->user_id_get();
        $this->ADMIN = 3;
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
        //要不要管理权限
        $this->mitem->setState($state,$itemId);
        redirect(site_url("bg/item/mange"));//修改之后，返回原来页面
    }
    public function itemCom()
    {
        //管理员看到一天内所有的评论，其他人看到3天内所有的评论
        $this->load->model("user");
        if(!$this->user_id){
            $this->noLogin(site_url("bg/item/itemCom"));
            return;
        }
        $type = $this->user->getType($this->user_id);
        if($type == $this->ADMIN){
            //为管理员的时候
            $data["com"] = $this->getSomeDate(1);
        }else{
            $data["com"] = $this->getUserDate($this->user_id,3);
        }
        $this->load->model("bgCom",$data);
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
