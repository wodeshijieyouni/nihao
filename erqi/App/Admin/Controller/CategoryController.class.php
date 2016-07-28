<?php
namespace Admin\Controller;
use Admin\Controller;

//用户信息控制器
class CategoryController extends CommonController {
    //封装搜素条件
	public function add ($pid=0) {
		$model = D(CONTROLLER_NAME);
		$list=$model->where('pid='.$pid)->select();
		// dump($list);
		$this->assign('list',$list);
		$this->display('add');
	}
	public function insert () {
		$model=M('category');
		// dump($model);
		// dump($_POST);
		$type=$model->where('id='.$_POST['pid'])->select();
		// dump($type);
		if($type){
			// echo 2222222;
			$_POST['pid']=$type[0]['id'];
			$_POST['category_path']=$type[0]['category_path'].$type[0]['id'].',';

		}else{
			// echo 11111;
			$_POST['pid']=0;
			$_POST['category_path']='0,';
		}
		parent::insert();

	}
	public function index () {
		$model=M('category');
		$list=$model->order('concat(category_path,id)')->select();
		$this->assign('list',$list);
		$this->display('index');
	}
	public function del (){
		$model=M('category');

		$list=$model->where('pid='.$_GET['id'])->select();
		if(count($list)>0){
			$this->error('内有子类无法删除');
			return;
		}
		 parent::del();
	}
	public function edit () {
		$model = D(CONTROLLER_NAME);
		$list=$model->select();
		// $this->assign('list',$list);
		parent::edit();
	}
   
    
}