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
        $det = $this->mitem->getDetail($itemId);//属性的列表中不可以是数字，这个在将来修复
        $det["img"]= explode("|",$det["img"]);//对img进行切割，处理出各个图片
        $attr = explode("|",$det["attr"]);
        $attr[0] = explode(",",$attr[0]);
        $attr[0] = $this->formAttr($attr[0]);
        $det["attr"] = $attr;
        $this->load->model("user");
        $author = $this->user->getItem($det["author_id"]);
        $data = array_merge($det,$author);
        $data["itemId"] = $itemId;
        $this->load->view("item",$data);
    }
    private function formAttr($attr)
    {
        //对Attr进行解码和重组，构成html字符串，然后在页面展示
        $reg = "/^\d+$/";
        if(preg_match($reg,$attr[1])){
            //对是两个属性
            $ans = "<p class = 'attr'><span class = 'item'>".$attr[2]."</span>";
            $leni = ($attr[0]+4);//从第五个开始是真正的属性值
            $ans.=$this->pinAttr(4,$attr[0],$attr);
            $ans.="</p><p class = 'attr'><span class = 'item'>".$attr[3]."</span>";
            $ans.=$this->pinAttr(4+$attr[0],$attr[1],$attr);
            $ans.="</p>";
        }else{
            //只有一个属性
            $ans = "<p class = 'attr'><span class = 'item'>".$attr[1]."</span>";
            $ans.=$this->pinAttr(2,$attr[0],$attr);
            $ans.="</p>";
        }
        return $ans;
    }
    private function pinAttr($st,$len,$attr)
    {
        //构成 Attr中的一部分,重复度很高，所以独立
        $re = "";
        $reg2 = "/^\d+\.jpg$/";
        $leni = ($len+$st);
        $baseUrl = base_url();
        //从第五个开始是真正的属性值
        if(preg_match($reg2,$attr[$st])){
            for($i = $st;$i < $leni;$i++){
                $re.="<img class = 'atv' name = '".($i-$st)."'src = '".$baseUrl."upload/".$attr[$i]."' />";
            }
        }else{
            for($i = $st;$i < $leni;$i++){
                $re.="<span class = 'atv' name = '".($i-$st)."'>".$attr[$i]."</span>";
            }
        }
        return $re;
    }
    public function newcom($itemId = -1){
        $res["flag"] = -1;
        if(!$this->user_id){
            $res["atten"] = "没有登录";
        }
        $data["text"] = $this->input->post("context");
        $data["score"] = $this->input->post("score");
        $data["item_id"] = $itemId;
        $data["user_id"] = $this->user_id;
        echo json_encode($data);
        return;
    //    $this->showArray($data);
        $this->load->model("comItem");
        $ans = $this->comItem->insert($data);
        if($ans){
            $res["flag"] = 1;
        }
        echo json_encode($res);
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
