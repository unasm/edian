<?php
/**
 * author:          unasm
 * email:           douunasm@gmail.com
 * Last_modified:   2013-06-11 10:39:28
 * 这里面继承了搜索的一切操作，因为没有对应的表，所以没有对应的model文件，将来在数据库中添加关键词会添加相应的model，ast的代码比较挫，要不要拷贝一些呢。看看吧
 *
 * 目前的搜索方法是这样的，首先是通过查看关键字，是不是属于第一级菜单，如果是的话，就查询第二级菜单，然后在首页分列显示,
 * 如果是第二级菜单，就从查询第三级菜单，然后分列显示，其他的则正常显示
 * 如果不是第一级菜单，就正常显示，和搜索和其他没有任何区别，
 * 但是这么处理，显然增大的工作量，几倍增大了搜索量，
 **/
class Sea extends MY_Controller
{
    var $pageNum;
    function __construct()
    {
        parent::__construct();
        $this->load->model("mitem");
        $this->load->model("user");
        $this->load->model("mwrong");//为了避免多次载入，在开头直接载入
        $this->pageNum = 30;
    }
    public function res()
    {//增加搜索页面，显示搜索结果
        $keyword = trim($_GET["sea"]);
        $ans = $this->index(0,$keyword,1);
    }
    /**
     * 这里是处理首页数据申请的地方
     *
     * 这里通过url传入的参数，决定查找的方向，可以查找热区和二手，其他目前则为关键字超找。
     *
     * @$currentPage int 当前正在搜索的页面
     * @$keyword     string 关键词，需要查找的关键字
     *
     */
    public function index()
    {//通过减少查询工作量，增加查询次数，减少io读写，我想是一个优化，具体，其实还是需要检验
    //那么，这个函数将成为我最重要的函数吗？
        $currentPage = $_GET["pg"];
        if($currentPage<0){
            show_404();
            return;
        }
        $keyword = trim(urldecode($_GET["key"]));
        if($keyword == "0"){
            //0 是热区
            $ans = $this->hotDel($currentPage);
//            echo json_encode($ans);
        }else if($keyword == "1"){
            // 1 是二手专卖，要单独处理
            // 对热区和二手的处理暂时不变
            $this->load->model("art");
            $ans = $this->art->getSecTop($currentPage);
        }else{
            //$ans = $this->sea($keyword,$currentPage);
            $ans = $this->keyPreDel($keyword);
            /*
             * foreach 的idx为搜索的关键字，$val为id的数组，
             * unasm 2013-09-27 16:49:44
             */
            foreach ($ans as $idx => $val) {
                $ans[$idx] = $this->sea($val,$currentPage);//这里的$val必然是数组，id的数组
            }
 //           echo json_encode($ans);
        }
        echo json_encode($ans);
        //var_dump($ans[0]);
        //$this->showArr($ans);
    }
    private function showArr($array)
    {
        foreach($array as $index => $value){
            var_dump($index);
            echo "   =>   ";
            var_dump($value);
            echo "<br>";
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
    /**
     *  $key 对关键词的预处理，或者构成数组，或者是单独处理
     *
     *  @$key string 要传入的关键字
     */
    protected function keyPreDel($key)
    {
        $key = preg_split("/[^\x{4e00}-\x{9fa5}0-9a-zA-Z]+/u",$key);//以非汉字，数字，字母为分界点开始分割;
        if(count($key) == 0)return;
        $keyArrLen = count($key);
        $res = Array();
        if($keyArrLen == 1){
            $key = $this->getSubItem($key[0]);
            if(is_array($key)){
                //如果传入一个string，返回一个数组，代表找到了子目录
                foreach ($key as $val) {
                    echo $val."<br/>";
                    $res[$val] = $this->getIdArr($val);//这里要处理的肯定都是单个的词
                }
            }else{
                //这里要处理的肯定都是单个的词,而这种处理的结果和下面的是一样的，应该都是搜索，或者是最下既级菜单的结果。
                $res[$key] = $this->getIdArr($key);
            }
        }else{
            /*
             * 这种情况发生是因为用户搜索，而不是点击浏览，所以不需要
             */
            $res[$key[0]] = $this->getIdArr($key);
        }
        return $res;
    }
    /**
     * 获取一级菜单的子菜单，在part数组中进行查找，找不到关键字则直接返回原来的字符串
     * @$key 一个单独的string，代表关键字
     */
    protected function getSubItem($key)
    {
        foreach ($this->part as $idx => $arr) {
            if(is_array($arr)){//这个目前不必要哦
                if($idx == $key){
                    $res = Array();
                    foreach ($arr as $tmpIdx => $secArr) {
                        array_push($res,$tmpIdx);
                    }
                    return $res;
                    //return $arr;
                }
            }
        }
        return $key;
    }
    /**
     * 通过传入的key组成id，然后通过id获得应该有的字符串
     *
     * 目前就通过搜索的方法得到，将来添加缓存吧
     *
     * @$key array 有可能是字符串，也许是数组，但是所有搜到的应该都成为一个idArray
     */
    protected function getIdArr($key)
    {
        $id = Array();
        if(is_array($key)){
            //如果传入的关键字数组
            $keyArrLen = count($key);
            for($i = 0; $i < $keyArrLen;$i++){
                if(mb_strlen($key[$i],"UTF8")<2)continue;                   //小于1个的字是没有任何搜索价值的，必须是词语才可以
                $temp = $this->mitem->getIdByKey($key[$i]);
                $id = array_merge($temp,$id);                               //输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。
                //if(count($id)>$this->pageNum*($currentPage+1))break;
            }
            return $id;
        }else{
            //如果传入的，只是关键字
            return $this->mitem->getIdByKey($key);
        }
    }
    /**
     * 对id 数组进行处理，得到具体的数据，返回的数据数组
     * @$id array 保存了item 主键id的数组，
     * @return 根据id得到的数据返回
     */
    protected function sea($id,$currentPage)
    {
        /**********************/
        $id = $this->uniqueSort($id);                                   //虽说为2维数组，但是第二纬只有一个数字，所以合并成为一维数组，然后unique
        //将这个id保存到缓存中，将来
        $res = array();
        $timer = 0;
        for($i = $currentPage*$this->pageNum,$idLen = min(count($id),$this->pageNum*($currentPage+1)); $i < $idLen;$i++){
            $temp = $this->mitem->getMin($id[$i]);//通过id获得内容
            if($temp){
                $userInfo = $this->user->getsea($temp["author_id"]);
                if($userInfo){//因为之前的局限，现在必须按照这种方法
                    //$temp = array_merge($temp,$userInfo[0]);
                    $now = explode("&",$userInfo["addr"]);//将地址拆分
                    $userInfo["addr"] = $now[0];
                    $temp["user"] = $userInfo;
                    $temp["art_id"] = $id[$i];//因为在读取的数字中，没有art_id,这里添加上
                    $res[$timer++] = $temp;
                }else{
                    $temp["text"] = "sea.php/sea/".__LINE__."出现问题，输入了用户的id却没有结果，请检查，temp[author_id] = ".$temp["author_id"];
                    $this->mwrong->insert($temp);
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
