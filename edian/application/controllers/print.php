<?php
/*************************************************************************
    > File Name :     print.php
    > Author :        unasm
    > Mail :          douunasm@gmail.com
    > Last_Modified : 2013-08-10 22:26:16
 ************************************************************************/
/**
 * 这个函数，更多的是用来测试的
 */
class Hello
{
    var $test;
    /**
     *
     */
    public function __construct()
    {
        $this->test = "<br/>testingasdf";
    }
    public function index()
    {
        echo $this->test;
    }
}
?>
