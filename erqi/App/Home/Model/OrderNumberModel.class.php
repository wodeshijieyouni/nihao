<?php
	namespace Home\model;
	use Think\Model;
	class OrderNumberModel extends Model{
		protected $_auto = array(
		// array('user_pass','md5',3,'function'), 
		array('order_time',"nowtime",1,'callback'), 
		array('order_number',"num",1,'callback'), 
		//array('userpass','mymd5',3,'callback'), 
		);
		public function nowtime (){
			return date("Y-m-d H:i:s");
		}
		public function num(){
			return time().rand(0000,9999);
		}
	}