<?php
/*************************************************************************
    > File Name :     item.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-07-23 14:07:41
 ************************************************************************/
/*
 * 这个作为前台item.php 的操作合集了
 */
/**
 *
 */
class item extends MY_Controller
{
    var $user_id;
    /**
     * 开始声明user_id,因为用到的地方比较多，My_controller中集成了几个经常用到的操作
     */
     function __construct()
    {
        parent::__construct();
        $this->user_id = $this->user_id_get();
        $this->load->model("mitem");
    }
    public function index($itemId = -1)
    {
        if($itemId == -1){
            show_404();
        }
        $det = $this->mitem->getDetail($itemId);
        $det["img"]= explode("|",$det["img"]);
        $this->load->model("user");
        $author = $this->user->getItem($det["author_id"]);
        $data = array_merge($det,$author);
        $this->showArray($data);
        $this->load->view("item",$data);
    }
    private function showArray($array)
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
