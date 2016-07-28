<?php
namespace Admin\Controller;
// use Admin\Controller;

//用户信息控制器
class OrderNumberController extends CommonController {
    //封装搜素条件
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['username']  = array('like', "%{$_REQUEST['keyword']}%");
			$where['name']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
		
	}
	
	
    
    
}