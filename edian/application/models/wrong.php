<?php
/*************************************************************************
    > File Name :     wrong.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-14 20:36:25
 ************************************************************************/
/*
 * 这个函数处理的是出现意外的订单打印，和各种意外情况需要，需要紧急处理，或者是向管理员报错吧，格式为json格式，
 */
/**
 *
 */
class Wrong extends Ci_Model
{
    /**
     *
     */
     function __construct()
    {
        parent::__construct();
    }
     public function insert($text)
     {
        $text = addslashes($text);
        $this->db->query("insert into wrong(content) values('$text')");
     }
}
?>
