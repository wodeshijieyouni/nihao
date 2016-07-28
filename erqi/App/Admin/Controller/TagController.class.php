<?php
namespace Admin\Controller;
use Admin\Controller;

//商品类别控制器
class TagController extends CommonController {
   		public function index(){
   			$mod=M("tag");
   			$list=$mod->order("concat(path,id)")->select();
        // dump($list);return
   			$this->assign("list",$list);
   			$this->display("index");
   		}
    	public function add($pareid=0){
    		$this->assign("typelist",M("Tag")->where("pareid={$pareid}")->select());
        $this->assign("typedata",M('category')->where('pid=0')->select());
        // dump(M('category')->select());
    		$this->display("add");
    	}
    	public function insert(){
    		$mod=M("tag")->where("id=".$_POST['pareid'])->find();
    		if($mod){
    			$_POST['pareid']=$mod['id'];
    			$_POST['path']=$mod['path'].$mod['id'].",";
    		}else{
    			$_POST['pareid']=0;
    			$_POST['path']="0,";
    		}
    		parent::insert();
    	}
      public function del($id=0){
        $list=M("tag")->where("pareid=".$id)->select();
        if(count($list)>0){
          $this->error("当前类别有子类别");
          return;
        }
        parent::del($id);
      }
      public function edit($id=0){
        $list=M("tag")->where("id=".$id)->find();
        $this->assign("list",$list);
        $this->display("edit");
      }
      
}