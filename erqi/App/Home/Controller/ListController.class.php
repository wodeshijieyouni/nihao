<?php
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller {
   
    public function index  ($pid,$category_name,$id) {
      // dump($_GET['hahaha']);
       if($pid > 0){
       	$map=array(
       		"category_name"=>$category_name
       		);
       	$list=M('goods')->where($map)->select();
        $dd=M('category')->where('id='.$pid)->find()['category_name'];
        $mod=M('tag');
        $where=array(
          'typename'=>$dd,

          );
        $tag=$mod->where($where)->order('concat(path,id)')->select();
       	// dump($tag);
        $this->assign('tag',$tag);
        $this->assign('category_name',$category_name);
        // dump($category_name);
        $this->assign($list);
        $in=0;
        $this->assign('in',$in);
        $data=M()->query("select g.id,g.goods_name,g.shop_price,g.goods_img,g.goods_desc from store_goods g,store_category c where g.category_name=c.category_name and c.id={$id}");
        if(!empty($_GET['hahaha'])){
          // self::$info=$data;
          $ee=M()->query("select g.goodsid from store_goods_tag g,store_tag t where t.id={$_GET['hahaha']} and t.id=g.tagid");
          $gg=array();
          foreach($ee as $v){
            $gg[]=$v['goodsid'];
          }
          // dump($gg);
          // dump($data);

          $ss=array();
       
          // exit;
          if(!empty($_SESSION['info'])){
            echo 1;
            foreach($_SESSION['info'] as $v){
              if(in_array($v['id'],$gg)){
                $ss[]=$v;
              }
            }
          }else{
            echo 2;
            foreach($data as $v){
              if(in_array($v['id'],$gg)){
                $ss[]=$v;
              }
            }
          }
          $data=$ss;
          $_SESSION['info']=$ss;
          // dump($_SESSION['info']);
          // dump($ss);  
        }

        $this->assign('data',$data);
       }else{
        $in=1;
        $this->assign('in',$in);
        $mod=M('tag');
        $where=array(
          'typename'=>$category_name,

          );
        $tag=$mod->where($where)->order('concat(path,id)')->select();
        // dump($tag);
        $this->assign('tag',$tag);
        $list=M('category')->where('pid='.$id)->select();
        $aa=array();
        $bb=array();
        foreach($list as $v){
          $bb[]=$v;
          $aa[]=M('goods')->where("category_name='{$v['category_name']}'")->select();
        }
        $cc=M('category')->where('pid='.$id)->select();
        $ee=array();
        foreach($cc as $v){
          $ee[]=$v['category_name'];
        }
        $ff['category_name']=array('in',$ee);
        
        $data=M('goods')->where($ff)->select();
        // if(!self::$info){
        //   self::$info=$data;
        // }
        // $this->shaiXuan($data);
        $this->assign('data',$data);

        // dump($data);
        $this->assign('category_name',$category_name);
        // dump($bb);
        $this->assign('type',$bb);
        $this->assign('lists',$aa);
       }
       // dump($bb);
       $modelfff=M('category');
      $datafff=$modelfff->where('pid=0')->select();
      $this->assign('abc',$datafff);

        $this->display('index');

    }
    public function search(){
      $where['goods_name']=array('like',"%{$_GET['keyword']}%");
      $where['category_name']=array('like',"%{$_GET['keyword']}%");
      $where['goods_desc']=array('like',"%{$_GET['keyword']}%");
      $where['_logic']='or';
      $map['_complex']=$where;
     $list=M('goods')->where($map)->select();
      if(!empty($_GET['desc'])){
        dump('1');
         $list=M('goods')->where($map)->order('shop_price desc')->select();
      }
      if(!empty($_GET['asc'])){
        ECHO 2;
         $list=M('goods')->where($map)->order('shop_price asc')->select();
      }
      $this->assign('key',$_GET['keyword']);
      $this->assign('data',$list);
      $this->display('list');
    }
}
    // public function shaiXuan() {

    // }



















