<?php
namespace Admin\Controller;
use Admin\Controller;

//用户信息控制器
	class GoodsController extends CommonController {
	    //封装搜素条件
		public function add () {
			$model=D('Category');
			$list=$model->order('concat(category_path,id)')->select();
      $mod=M('tag');
      $brand=$mod->order('concat(path,tagid)')->select();
      dump($brand);
      $this->assign('list',$list);
			$this->assign('brand',$brand);
			$this->display('add');
		}
		public function _tigger_insert($model){
			// dump($_FILES);

        $config = array(
            // 'maxSize'    =>    3145728,
            'savePath'   =>    'Public/uploads/',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    false,
            'rootPath'	 =>		'./',
            'saveName'   =>    array('uniqid',''),
            );
          $upload=new \Think\Upload($config);
          $info   =   $upload->upload();
          // dump($this->error());
          // echo $upload->getError();
          // dump($info);
          if(!$info) {
          // 上传错误提示错误信息    $this->error($upload->getError());
          }else{
          // 上传成功 获取上传文件信息
              foreach($info as $file){
                  // echo $file['savepath'].$file['savename'];
              	$aa=$file['savename'];
              }
          }
          // $model = M('goods_img');
          // $data['photo'] = $info[0]['savename'];
          $data=array();
          $data['id']=$model->id;
          // dump($model);
          $data['goods_img']=$aa;
          // dump($data);
          $model->save($data);
         
    }
 
  //   	public function edit () {

  //   		$mode = D('Category');
		// 	$list=$mode->select();
		// 	// dump($list);
		// 	// $this->assign('list',$list);
		// 	// parent::edit();




		// 	$model = D('goods');
		// $id = $_REQUEST[$model->getPk()];
		// $vo = $model->find($id);
		
		// $this->assign('vo', $vo);
		// $this->display('edit');
			
		
  //   	}
    
}