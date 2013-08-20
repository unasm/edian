<?php
    class Userlist extends Ci_Controller{
        var $SELLER,$BUYER,$ADMIN;
        function __construct(){
                parent::__construct()               ;
                $this->load->model("mbguserlist");
                $this->SELLER = 1;
                $this->BUYER = 2;
                $this->ADMIN = 3;
        }
        function index(){
                //显示ｍｙｓｑｌ中所有的用户,并且保存在userall中
                $data['userall']=$this->mbguserlist->showuser_all();
                var_dump($data["userall"][0]);
                $data["SELLER"] = $this->SELLER;
                $data["BUYER"] = $this->BUYER;
                $data["ADMIN"] = $this->ADMIN;
                $this->load->view("m-bg-userlist",$data);
        }
        function userDel($user_id){
                //通过用户名删除用户,并且重定向到bg/userlist/那个u页面
                $this->mbguserlist->user_del($user_id);
                redirect(site_url("bg/userlist"));
        }
        function  userBlock($user_id){
                $res=$this->mbguserlist->user_block($user_id);
                redirect(site_url("bg/userlist"));
        }
        private function showArr($array)
        {
            foreach($array as $index => $value){
                var_dump($index);
                echo "   =>   ";
                var_dump($value);
                echo "<br>";
            }
        }
    }
?>
