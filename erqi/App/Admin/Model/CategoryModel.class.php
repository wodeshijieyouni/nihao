<?php
//自定义用户信息操作Model类
namespace Admin\Model;

use Think\Model;

class CategoryModel extends Model
{
	//自动验证
    protected $_validate = array(
		// array('pid','require','类别名必须填写！'), 
		
		//array('userpass','/^[.]{6,18}$/','密码必须6到18位！'), 
	);
	
	
	
}
