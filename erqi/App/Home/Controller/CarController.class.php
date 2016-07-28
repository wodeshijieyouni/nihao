<?php
namespace Home\Controller;
use Think\Controller;
class CarController extends Controller {
    public function add(){
        $list=M('goods')->where("id=".$_GET['goodsid'])->find();
        $data=array(
            'goods_id'=>$list['id'],
            'user_id'=>$_SESSION['user']['id'],
            'cart_num'=>$_POST['num'],
            'cart_img'=>$list['goods_img'],
            'cart_name'=>$list['goods_name'],
            'cart_price'=>$list['shop_price']
            );
        // dump($data);
        // dump($_GET);
        // dump($_POST);
        $mod=M('cart');
        $aa=$mod->add($data);
        if ($aa) {
                $this->redirect("index/showw");
        }else{
            $this->error(L('新增失败'));
        }
        // $this->ajaxreturn($aa);


        // dump($aa);
        // exit;
        // echo  json_encode($aa);
    }
    public function shop(){
         $cart=M('cart')->where('user_id='.$_SESSION['user']['id'])->select();
         $total=0;
        foreach($cart as $v){
            $total+=($v['cart_num']*$v['cart_price']);
        }
        
        $count=count($cart);
        $cart['total']=$total;
        $cart['count']=$count;
         echo json_encode($cart);
    }
    public function del(){
        $mod=M('cart');
        // dump($mod);
        // $_GET['id']="10";
        $add=$mod->where("id={$_GET['id']}")->delete();
        // $mod->where('id='.$_GET['id'])->delete();
        echo json_encode($add);
        // echo $add;
    }
    public function tou(){
      
        $data=M('category')->where('pid=0')->select();
        $cart=M('cart')->where('user_id='.$_SESSION['user']['id'])->select();
         $count=count($cart);
         $data['count']=$count;
         // dump($data);
         echo json_encode($data);
    }
    public function dingdan(){
        // dump($_GET['total']);
        // dump($_SESSION);
        $mod=M('cart')->where("user_id={$_SESSION['user']['id']}")->select();
        $count=count($mod);
        foreach($mod as &$v){
            $v['total']=$v['cart_num'] * $v['cart_price'];
        }
        $this->assign('count',$count);
        $this->assign('info',$mod);
        // dump($mod);
        $this->assign('total',$_GET['total']);
        $this->display('settlement');
    }
    public function order(){
        $_POST['user_name']=$_SESSION['user']['user_name'];
        $mod=D('OrderNumber');
        // dump($_POST);
        $mod->create();
        // dump($mod->create()['order_number']);
        if($mod->add()){
           
            $list=M('cart')->where("user_id={$_SESSION['user']['id']}")->select();
            $data=array();
            foreach($list as $v){
                $data['order_number']=$mod->create()['order_number'];
                $data['goods_id']=$v['goods_id'];
                $data['order_goodsimg']=$v['cart_img'];
                $data['order_goodsname']=$v['cart_name'];
                $data['order_price']=$v['cart_price'];
                $data['order_goodsnumber']=$v['cart_num'];
                $data['order_pricesumd']=$v['cart_num'] * $v['cart_price'];
                M('orderDetails')->add($data);
            }
            // dump($data);
            $listt=M('order_number')->order('id desc')->find()["order_number"];
            // dump($listt);
             M('cart')->where("user_id={$_SESSION['user']['id']}")->delete();
             // $this->success("订单提交成功","zhifu",);
             $this->redirect("zhifu",array("order"=>$listt),3,"订单提交成功");
        }
        
        // dump($mod->create());
    }
    public function zhifu(){
        $this->assign('num',$_GET['order']);
        $this->display('zhifu');
    }
    public function ok(){
        // dump($_GET['num']);
        $data=array(
            "order_state"=>2,
            );
        M("order_number")->where("order_number={$_GET['num']}")->save($data);
        $this->redirect('index/showw');
    }
}











