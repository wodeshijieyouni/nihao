<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

    	
       $this->display('index');
    }
    // public function Verify () {
    // 	$Verify = new \Think\Verify();
    // 	$Verify->entry(3);
    // }
    public function showw () {
    	$model=M('category');
    	$data=$model->where('pid=0')->select();
    	// dump($list);
        $mm=array();
        $nn=array();
        foreach($data as $k=>$v){
            $mm[$v['id']]=$model->limit(3)->where('pid='.$v['id'])->select();
            $nn[$v['category_name']][]=$v['category_name'];
            foreach($model->where("category_path like '%{$v['id']}%'")->select() as $vv){
                $nn[$v['category_name']][]=$vv['category_name'];
            }

        }
        // dump($nn);
        $mod=M('goods');
        $nnn=array();
        $map=array();
        foreach($nn as $k=>$vvv){
            // $map['category_name']="in {$vvv}";
             // dump($vvv);
             // exit;
            $ss=$mod->select();
            // dump($ss);
            foreach($ss as $v){
                // dump($v['category_name']);
                // dump($vvv);
                
                if(in_array($v['category_name'],$vvv)){
                    $nnn[$k][]=$v;
                }
            }
            
           
        }
        // dump($nnn);
        $mmm=array();
        foreach($data as $k=>$v){
            $mmm[$v['id']]=$model->where('pid='.$v['id'])->select();
        }
        $xiaoliang=$mod->order('goods_volume desc')->limit(5)->select();
        // dump($xiaoliang);
        $chu=$mod->where('is_promote=1')->limit(4)->select();
        // dump($chu);
        $this->assign('chu',$chu);
        $this->assign('xiaoliang',$xiaoliang);
        $this->assign('nnn',$nnn);
        $this->assign('mm',$mm);
        $this->assign('mmm',$mmm);
        // dump($mm);
        $this->assign('list',$data);
    	$this->assign('abc',$data);
    	// dump($data);
        $cart=M('cart')->where('user_id='.$_SESSION['user']['id'])->select();
        // dump($cart);
        $this->assign('cart',$cart);
        $total=0;
        foreach($cart as $v){
            $total+=($v['cart_num']*$v['cart_price']);
        }
        $this->assign('num',count($cart));
        // dump($total);
        $this->assign('total',$total);
        $this->display('show');
    }
}
