<?php
//自定义用户信息操作Model类
namespace Admin\Model;

use Think\Model;

class GoodsModel extends Model
{
	//自动验证
 //    protected $_validate = array(
	// 	array('category_name','require','类别必须填写！'), 
	// 	array('goods_name','require','名称必须填写！'), 
	// 	array('shop_price','require','单价必须填写！'), 
	// 	//array('userpass','/^[.]{6,18}$/','密码必须6到18位！'), 
	// );
	
	// 自动填充
	protected $_auto = array(
		// array('user_pass','md5',3,'function'), 
		array('goods_add_time',"nowtime",1,'callback'), 
		//array('userpass','mymd5',3,'callback'), 
	);
	public function nowtime (){
		return date("Y-m-d H:i:s");
	}
	// //自定义密码加密方式
	// public function mymd5(){
	// 	return md5(md5($_POST['user_pass'])."xiaozhan");
	// }
}
