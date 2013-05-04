<?php
/**
 * 这个文件是作为user这个表的操作类来使用的，所有关于user的函数，都在这里使用
 * 目前还是需要删除用户的选项，就到以后吧
 **/
class User extends Ci_Model
{

	function __construct()
	{
		parent::__construct();
	}
	private function author_check($permit_level)
	{
		//check the author of the user
		$level=$_SESSION["user_level"];//这里需要将来修改
		if($level<$permit_level)
			return false;
		return true;
	}
	public function getInfoById($id)
	{
		//这个函数是通过用户的id得到用户的信息的函数
		$sql="select * from user where user_id = $id";
		$res=$this->db->query($sql);
		return $this->dataFb($res->result_array());
	}
	public function getPubById($user_id)
	{
		//输出的都是显示的内容，不涉及用户的隐私，不知道这样会不会加快速度
		$res = $this->db->query("select  user_name,reg_time,user_photo from user where user_id  = $user_id");
		return $this->dataFb($res->result_array());
	}
	public function getNess($user_id)
	{
		//getPubById 的升级版本
		$res = $this->db->query("select  user_name,user_photo,contract1,addr from user where user_id  = $user_id");
		return $this->dataFb($res->result_array());
	}
	function checkname($name){//这样get user_name会增加io读写的，当初真实笨蛋呢
		$sql="select user_name,user_id,user_passwd from user where user_name = '$name'";
		$res=$this->db->query($sql);
		return $this->dataFb($res->result_array());
	}
	public function getNameById($id)
	{
		$res = $this->db->query("select user_name from user where user_id = '$id'");
		return $res->result_array();
	}
	public function showUserAll()

	{
		//这个函数的作用是输出数据库中所有的用户列表的函数
		$sql="select * from user";
		$res=$this->db->query($sql);
		return $this->dataFb($res->result());
	}
	public function delUserById($id)
	{
		//这个函数是通过用户的id删除用户信息的
		$res=$this->db->query("delete from user where user_id = '$id'");
		return $res;
	}
	public function userBlockById($id)
	{
		//通过用户的id冻结用户帐号的函数
		return $this->db->query("update user set block = 1  where user_id = '$id'");
	}
	public function userEnbleById($id)
	{
		//通过用户的id解冻的函数
		return $this->db->query("update user set block = 0 where user_id = '$id'");
	}
	public function showBlockAll()
	{
		//输出所有的冻结了的用户
		$res=$this->db->query("select * from user where block = 1" );
		return $this->dataFb($res->result());
	}
	public function updateUser()
	{//这个函数的作用是更新用户的文章的函数，还没有通过验证
		/*
		$this->title = $_POST['title'];
		$this->content=$_POST['content'];
		$this->date=time();
		$this->db->update('user',array('id'=>$_POST['id']));
		 */
		var_dump("抱歉，这个函数的位置不太对，请移动到art中");
		die;
	}
	public function getNew()
	{
		//选择刚刚注册的初始值为-1，通过验证才可以复制为0以上，标志这个是一个很鸡肋的选择，大概不需要吧，只要通过了验证，就可以了
		$res=$this->db->query("select * from user where user_level = -1");
		return $this->dataFb($res->result());
	}
	public function insertUser($data)
	{
		//插入用户的时候的函数
		//$data["passwd"] = md5($data["passwd"]);//还是不再加密吧，既然已经是服务端了
		$day = date('Y-m-j');
		$data["name"] = addslashes($data["name"]);//因为对特殊字符的担心，这里给它添加转义
		if($data["addr"] == "")$data["addr"] = null;
		if($data["intro"] == "")$data["intro"] =  null;
		if($data["contract2"] == "")$data["contract2"] = null;
		if($data["email"] == "")$data["email"] = null;
		if(($data["photo"] != "")&&($data["photo"]!=false))
			$res=$this->db->query("insert into user(user_name,user_passwd,reg_time,user_photo,email,addr,intro,contract1,contract2) VALUES('$data[name]','$data[passwd]','$day','$data[photo]','$data[email]','$data[addr]','$data[intro]','$data[contract1]','$data[contract2]')");
		else 
			$res=$this->db->query("insert into user(user_name,user_passwd,reg_time,email,addr,intro,contract1,contract2) VALUES('$data[name]','$data[passwd]','$day','$data[email]','$data[addr]','$data[intro]','$data[contract1]','$data[contract2]')");
		return $res;
	}
	public function getPubToAll($userId)
	{//获取那些所有可以被普通的用户浏览的信息，
		$res = $this->db->query("select user_name,reg_time,user_photo,last_login_time,email,addr,intro,contract1,contract2 from user where user_id = '$userId'");
		$res = $this->dataFb($res->result_array());
		if(count($res))return $res[0];
		return false;
	}
	public function getPubNoIntro($userId)
	{//获取那些所有可以被普通的用户浏览的信息，但是没有intro，担心太多，而且，没有必要到处显示
		$res = $this->db->query("select user_name,reg_time,user_photo,last_login_time,email,addr,contract1,contract2 from user where user_id = '$userId'");
		$res = $this->dataFb($res->result_array());
		if(count($res))return $res[0];
		return false;
	}
	public function changeInfo($data,$userId)
	{//it is work for info.php
		if($data["addr"] == "")$data["addr"] = null;
		if($data["intro"] == "")$data["intro"] = null;
		if($data["contract2"] == "")$data["contract2"] = null;
		if($data["email"] == "")$data["email"] = null;
		//$data["addr"] = addslashes($data["addr"]);
		$res = $this->db->query("update user set user_name = '$data[name]',contract1 = '$data[contract1]',contract2 = '$data[contract2]',addr = '$data[addr]',email = '$data[email]',intro = '$data[intro]',user_photo = '$data[photo]' where user_id = '$userId'");
		return $res;
	}
	public function changeLoginTime($userId)
	{//修改最后登陆时间
		$this->db->query("update user set last_login_time  = now() where user_id = '$userId'");
	}
	private function dataFb($array)
	{
		for($i = 0; $i < count($array);$i++){
			$array[$i]["user_name"] = stripslashes($array[$i]["user_name"]);
		}
		return $array;
	}
	public function cleCom($userId)
	{//每当用户的帖子（商品）增加评论的时候，用户进入列表页，清除评论数字
		$this->db->query("update user set comNum = 0 where user_id = '$userId'");
	}
	public function cleMail($userId)
	{//每当用户的邮件增加时候，增加mailNum，当用户进入列表页，清除评论数字
		$this->db->query("update user set mailNum = 0 where user_id = '$userId'");
	}
	public function addMailNum($userId)
	{
		$this->db->query("update user set mailNum = mailNum+1 where user_id = '$userId'");
	}
	public function addComNum($userId)
	{
		$this->db->query("update user set comNum = comNum+1 where user_id = '$userId'");
	}
	public function getPassById($userId)
	{//通过id获得密码，对应reg/getPass
		$res = $this->db->query("select user_passwd from user where user_id = '$userId'");
		return $res->result_array();
	}
	public function getUpdate($userId)
	{//这里目前对应的是reg/dc,就是不仅仅提供判断，而且提供数据,用户不在期间的更新
		$res = $this->db->query("select user_name,user_passwd,user_photo,mailNum,comNum from user where user_id = '$userId'");
		return $res->result_array();
	}
	public function getNum($userId)
	{
		$res = $this->db->query("select mailNum,comNum from user where user_id = '$userId'");
		return $res->result_array();
	}
}
?>
