<?php
/*
 * author:			unasm
 * email:			douunasm@gmail.com
 * last_modefied:	2012/12/09 01:26:33 CST
 *
 * 这个文件是处理评论这个表/mysql/blog/comment／它的各种操作都在这里
 **/
	class Comment extends Ci_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		public function getInfoById($id)
		{
			$sql="select * from comment where comment_id = '$id' ";
			$res=$this->db->query($sql);
			return $res->result();
		}
		public function insertComment($art_id,$user_id,$comment)
		{
			//这个是函数是插入评论的函数,需要返回插入的comId,失败则返回0，需要用户的id和评论的内容，时间由系统生成，表示我现在大量使用timestamp，
			$sql="insert into comment(art_id,user_id,comment,reg_time) values($art_id,'$user_id','$comment',now())";
			if($this->db->query($sql))
			{
				//$ans = $this->db->query("select last_insert_id()")	;
				$ans = mysql_query("select last_insert_id()");
				$ans = mysql_fetch_array($ans)[0];//获取刚刚插入的id
			}
			else $ans = 0;
			return $ans;
		}
		public function delCommentById($id)
		{
			//通过comment的id删除评论的函数，尚未经过测试，
			return $this->db->query("delete from comment where where comment_id = '$id'");
		}
		public function upComment($id,$comment)
		{
			//通过id修改用户评论的函数，但是通过qq的来看，貌似不需要修改comment呢，为通过测试
			return $this->db->query("update comment set comment = '$comment',reg_time = 'now()' where comment_id  = '$id'");
		}
		public function getCommentById($artId)
		{
			//通过文章的id得到所有的这个文章的评论，未通过测试
			$sql="select comment_id,user_id,comment,reg_time from comment where art_id = '$artId' order by comment_id";
			$res=$this->db->query($sql);
			return $res->result_array();
		}
		public function getByUserId($userId)
		{
			$res = $this->db->query("select art_id from comment where user_id = '$userId'");
			return $res->result_array();
		}
	}
?>