<?php
namespace Admin\Controller;
use Admin\Controller;


class RoleController extends CommonController {
 
    public function nodelist($rid=0) {
    	// dump($_GET['rid']);
    	$aa=M('role_node');
    	$data=$aa->where('rid='.$rid)->select();
    	// dump($data);
    	$rids=array();
    	foreach($data as $v){
    		$rids[]=$v['nid'];
    	}
    	$this->assign('roles',M('role')->find($rid));
    	// dump($rids);
    	$this->assign('rids',$rids);
    	$mod=M('node');
    	$list=$mod->select();
    	$this->assign('list',$list);
    	$this->display();
    }
    public function save () {
    	// dump($_POST);
    	M("role_node")->where('rid='.$_POST['rid'])->delete();
    	foreach($_POST['nid'] as $v){
    		$data=array(
    			'rid'=>$_POST['rid'],
    			'nid'=>$v
    			);
			M('role_node')->add($data);
    	}
    	if(!empty($_POST['nid'])){
    		$this->success(L('修改成功'));
    	}

    }
    
}