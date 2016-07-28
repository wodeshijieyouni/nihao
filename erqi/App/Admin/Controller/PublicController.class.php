<?php
//公共公有控制器
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    //加载登录页面
    public function login(){
        $this->display("login");
    }
    
    //输出验证图片
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 50;
        $Verify->length   = 2;
        $Verify->useNoise = false;
        $Verify->entry();
    }
    
    //执行登录方法
    public function doLogin(){
        //校验验证码
        // $verify = new \Think\Verify();
        // if(!$verify->check($_POST['code'],"")){
        //     $this->assign("errorinfo","登录验证码错误！");
        //     $this->display("login");
        //     exit();
        // }
       // dump($_POST);
        //根据登录账号获取用户信息
        $user = M("User")->where("user_name='{$_POST['user_name']}'")->find();
        //判断是否获取到用户
        // dump($user);
        if($user){
            //检测密码：
            if($user['user_pass']==md5($_POST['user_pass'])){
                //将登录的用户信息放入到session中
                $_SESSION[C('SESSION_USER_KEY')]=$user;
                
                //获取当前登录用户的权限信息（操作节点列表）
                $list = M()->query("select nd.mname,nd.aname from __PREFIX__user_role ur,__PREFIX__role_node rn,__PREFIX__node nd where ur.rid=rn.rid and rn.nid=nd.id and ur.uid={$user['id']}");
                //dump($list);
                //对查询结果进行处理
                $nodelist['index'][]="index"; //允许访问后台首页
                foreach($list as $v){
                    $nodelist[$v['mname']][]=$v["aname"];
                    //若是add权限就让他有insert操作权限
                    if($v['aname']=="add"){
                        $nodelist[$v['mname']][]="insert";
                    }
                    //若是edit权限就让他有update操作权限
                    if($v['aname']=="edit"){
                        $nodelist[$v['mname']][]="update";
                    }
                }
                //dump($nodelist);
                //将当前用户的权限信息放到session中
                $_SESSION['nodelist']=$nodelist;
                 // print_r($_POST);
                $this->redirect("Index/index");
               
            }else{
                $this->assign("errorinfo","登录密码错误！");
                $this->display("login");
               
            }
        }else{
            $this->assign("errorinfo","登录账号不存在或被禁用");
            $this->display("login");
            
        }
    }
    
    //执行退出
    public function logout(){
        unset($_SESSION[C('SESSION_USER_KEY')]);
        $this->display("login");
    }
}