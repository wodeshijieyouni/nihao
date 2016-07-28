<?php
namespace Admin\Controller;
use Admin\Controller;

//用户信息控制器
class GoodsTagController extends CommonController {
   
    public function index($goodsid,$typename){
    	$map=array('category_name'=>$typename);
		$aa=M('category')->where($map)->find();
		$dd=M('category')->where('id='.$aa['pid'])->find()['category_name'];
		// echo $dd;
		// dump($aa);
		$cc=M('goods_tag')->where('goodsid='.$goodsid)->select();
		// dump($cc);
		$rid=array();
		foreach($cc as $v){
			$rid[]=$v['tagid'];
		}
		$this->assign('rids',$rid);
		// dump($rid);
		// dump(M('user_role')->where('uid='.$uid)->select());
		$this->assign("goodsid",$goodsid);
		$mod=M('tag');
		$where=array(
			'typename'=>$dd,

			);
		$list=$mod->where($where)->order('concat(path,id)')->select();
		$this->assign('list',$list);
		// dump($list);
		// $count=count($list);
		// $this->assign('count',$count);
		// echo $count;
		$this->display();

	}




	public function save () {
		// dump($_POST);
		$mod=M('goods_tag');
		$mod->where('goodsid='.$_POST['goodsid'])->delete();
		foreach($_POST['rid'] as $v){
			
			
			
			$data=array(
				'goodsid'=>$_POST['goodsid'],
				'tagid'=>$v
				);
			$mod->add($data);
			// dump($mod);
			// echo $mod->getError();
			
		}
		if(!empty($_POST['goodsid'])){
    		$this->success(L('修改成功'));
    	}
	}
    
}
