<?php
namespace Admin\Controller;
use Admin\Controller;

//商品图片控制器
class GoodsImgController extends CommonController {
   		public function add($id){
          $list=M("goods")->where("id=".$id)->find();
          $this->assign("list",$list);
          $this->display("add");
      }
      public function insert(){
        $config = array(
            // 'maxSize'    =>    3145728,
            'savePath'   =>    '../Public/Uploads/',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),);
          $upload=new \Think\Upload($config);
          $info   =   $upload->upload();
          if(!$info) {
          // 上传错误提示错误信息    $this->error($upload->getError());
          }else{
          // 上传成功 获取上传文件信息
              foreach($info as $file){
                  echo $file['savepath'].$file['savename'];
              }
          }
          $model = M('goods_img');
          $data['photo'] = $info[0]['savename'];
          $data['create_time'] = NOW_TIME;
          parent::add($data);
      }
      public function edit() {
        $model = M("goods_img");
        $id = $_REQUEST[$model->getPk()];
        $vo = $model->find($id);
        $this->assign('vo', $vo);
        $this->display('edit');
      }
      public function update(){
          $mod=M("goods_img");
          if(false === $model->create()) {
            $this->error($model->getError());
          }
          // 更新数据
          if(false !== $model->save()) {
            // 回调接口
            if (method_exists($this, '_tigger_update')) {
              $this->_tigger_update($model);
            }
            //成功提示
            $this->success(L('更新成功'));
          } else {
            //错误提示
            $this->error(L('更新失败'));
          }
      }
      public function del() {
    //删除指定记录
    $model = M("goods_img");
    if (!empty($model)) {
      $pk = $model->getPk();
      $id = $_REQUEST[$pk];
      if (isset($id)) {
        //批量删除
        $condition = array($pk => array('in', explode(',', $id)));
        if (false !== $model->where($condition)->delete()) {
          $this->success(L('删除成功'));
        } else {
          $this->error(L('删除失败'));
        }
      } else {
        $this->error('非法操作');
      }
    }
}