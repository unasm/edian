<?php
/**
 * author:          unasm
 * email:           douunasm@gmail.com
 * Last_modified:   2013-06-11 10:39:28
 * 这里面继承了搜索的一切操作，因为没有对应的表，所以没有对应的model文件，将来在数据库中添加关键词会添加相应的model，ast的代码比较挫，要不要拷贝一些呢。看看吧
 *
 **/
class Sea extends MY_Controller
{
    var $pageNum;
    function __construct()
    {
        parent::__construct();
        $this->load->model("mitem");
        $this->load->model("user");
        $this->pageNum = 30;
    }
    public function res()
    {//增加搜索页面，显示搜索结果
        $keyword = trim($_GET["sea"]);
        $ans = $this->index(0,$keyword,1);
    }
    public function index()
    {//通过减少查询工作量，增加查询次数，减少io读写，我想是一个优化，具体，其实还是需要检验
    //那么，这个函数将成为我最重要的函数吗？
        $currentPage = $_GET["pg"];
        if($currentPage<0){
            show_404();
            return;
        }
        $keyword = urldecode(trim($_GET["key"]));
        if($keyword == "0"){
            //0 是热区
            $ans = $this->hotDel($currentPage);
//            echo json_encode($ans);
        }else if($keyword == "1"){
            // 1 是二手专卖，要单独处理
            $this->load->model("art");
            $ans = $this->art->getSecTop($currentPage);
        }else{
            $ans = $this->sea($keyword,$currentPage);
 //           echo json_encode($ans);
        }
        echo json_encode($ans);
        //var_dump($ans[0]);
        //$this->showArr($ans[0]);
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
    private function hotDel($stp){
        $res = $this->mitem->getHot($stp);
        for($i = 0,$len = count($res);$i < $len ;$i++){
            $userInfo = $this->user->getsea($res[$i]["author_id"]);
            if($userInfo){//因为之前的局限，现在必须按照这种方法
                //$temp = array_merge($temp,$userInfo[0]);
                $now = explode("&",$userInfo["addr"]);//将地址拆分
                $userInfo["addr"] = $now[0];
                $res[$i]["user"] = $userInfo;
                $res[$i]["art_id"] = $res[$i]["id"];//因为在读取的数字中，没有art_id,这里添加上,保留和之前一样的格式
            }
        }
        return $res;
    }
    private function sea($keyword,$currentPage)
    {
        $key = preg_split("/[^\x{4e00}-\x{9fa5}0-9a-zA-Z]+/u",$keyword);//以非汉字，数字，字母为分界点开始分割;
        if(count($key) == 0)return;
        $temp= 1 ;
        /**********************/
        $partId = -1;//查看搜索的板块那哪里,通常key的第一个代表它所在的分区，否则则是用户输入的搜索
        /*******************************/
        $id = array();//$id中保存了获得的$id
        for($i = 0; $i < count($key);$i++){
            if(mb_strlen($key[$i],"UTF8")<2)continue;                   //小于1个的字是没有任何搜索价值的，必须是词语才可以
            $temp = $this->mitem->getIdByKey($key[$i]);
            $id = array_merge($temp,$id);                               //输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
            //if(count($id)>$this->pageNum*($currentPage+1))break;
        }
        $id = $this->uniqueSort($id);                                   //虽说为2维数组，但是第二纬只有一个数字，所以合并成为一维数组，然后unique
        //希望可以将这个保存，然后将来就不需要到数据库读取了,或者是到view中读取,这个优化将来完成吧
        $res = array();
        $timer = 0;
        for($i = $currentPage*$this->pageNum,$idLen = min(count($id),$this->pageNum*($currentPage+1)); $i < $idLen;$i++){
            $temp = $this->mitem->getMin($id[$i]);
            if($temp){
                for($j = 0,$len = count($key); $j < $len;$j++){                     //正则高亮
                    $temp["title"] = preg_replace("/".$key[$j]."/","<b>".$key[$j]."</b>",$temp["title"]);
                }
                $userInfo = $this->user->getsea($temp["author_id"]);
                if($userInfo){//因为之前的局限，现在必须按照这种方法
                    //$temp = array_merge($temp,$userInfo[0]);
                    $now = explode("&",$userInfo["addr"]);//将地址拆分
                    $userInfo["addr"] = $now[0];
                    $temp["user"] = $userInfo;
                    $temp["art_id"] = $id[$i];//因为在读取的数字中，没有art_id,这里添加上
                    $res[$timer++] = $temp;
                }else{
                    //为0，是不是代表用户的被删除呢,向管理员报告呢
                }
            }else{
                //这里为0会是什么情况呢，我通过like匹配出结果，然后根据id具体去查找，发现居然没有，要检查
            }
        }
        if($timer)
            return $res;
            //echo json_encode($res);
        return 0;
    }
}
?>
