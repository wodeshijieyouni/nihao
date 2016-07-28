<?php

namespace Home\Controller;

use Think\Controller;

	class PublicController extends Controller {
	    public function login(){
	    	// dump($_SESSION['user']);
	    	$this->display();
	    }
	    public function verify(){
	    	ob_end_clean();
	        $Verify = new \Think\Verify();
	        $Verify->fontSize = 50;
	        $Verify->length   = 2;
	        $Verify->useNoise = false;
	        $Verify->entry();
    	}
    	public function doLogin(){
    		// dump($_POST);
    		// exit;
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
	        // dump($user['user_pass']);
	        // exit;
	        //判断是否获取到用户
	        if($user){
	            //检测密码：
	            if($user['user_pass']==md5($_POST['user_pass'])){
	                //将登录的用户信息放入到session中
	                // echo 11;
	                $_SESSION['user']=$user;
	                // dump($_SESSION['user']['user_name']);
	                // exit;
	                $this->redirect("Index/showw");
	               
	            }else{
	                $this->assign("errorinfo","登录密码错误！");
	                $this->display("login");
	               
	            }
	        }else{
	            $this->assign("errorinfo","登录账号不存在或被禁用");
	            $this->display("login");
	            
	        }
    	}
    	public function registerinsert(){
    		$mod=M("User");
    		$username=$_POST["user_name"];
    			// dump($username);
    		// $data=$mod->where("user_name=".$username)->find();
    		if($mod->where(array('user_name' => $username ))->find()){
    			echo 1;
    		}else{
    			echo 2;
    		}
    		


    		
    		// exit;
    	}
    	public function register(){
    		$this->display();
    	}
    	public function doregister(){
    		$verify = new \Think\Verify();
	        if(!$verify->check($_POST['code'],"")){
	            $this->assign("errorinfo","验证码错误！");
	            $this->display("register");
	            exit();
	        }
	        $model = D("User");
	        // dump($model);
			unset( $_POST[$model->getPk()]);
			// dump($model->create());
			if(!$model->create()){
				$this->assign("errorinfo",$model->getError());
				$this->display("register");
				exit();
			}
			if($add=$model->add()>0){
				$this->display("login");
			}else{
				$this->assign("errorinfo","注册失败");
				$this->display("register");
			}
		
    	}
    	public function logout(){
	        unset($_SESSION['user']);
	        $this->display("login");
	    }
	    public function question(){
	    	$this->display();
	    }
    	public function dousername(){
	    	$mod=M("User");
    		$username=$_POST["user_name"];
    		if($mod->where(array('user_name' => $username ))->find()){
    			echo 1;
    		}else{
    			echo 2;
    		}
	    }
	    public function doquestion(){
	    	$mod=M("User");
    		$username=$_POST["user_name"];
    		if(!$list=$mod->where(array('user_name' => $username ))->find()){
    			$this->assign("errorinfo","账号不存在");
    			$this->display("question");
    			exit();
    		}else{
    			$userquestion1=$_POST['user_question1'];
    			$userquestion2=$_POST['user_question2'];
    			if($userquestion1==$list['user_question1'] && $userquestion2==$list['user_question2']){
    				$this->display("uploadpass");
    			}else{
    				$this->assign("errorinfo","密保答案错误");
    				$this->display("question");
    			}
    		}
	    }
	    public function douploadpass(){
	    	$mod=D("User");
	    	// dump($mod);
    		$username=$_POST["name"];
    		if(!$list=$mod->where(array('user_name' => $username ))->find()){
    			$this->assign("errorinfo","账号不存在");
    			$this->display("uploadpass");
    			exit();
    		}else{
    			if(!$mod->create()){
    				$this->assign("errorinfo",$mod->getError());
					$this->display("uploadpass");
					exit();
    			}
    			$data['id']=$list['id'];
    			$data['user_name']=$list['user_name'];
    			$data['user_realname']=$list['user_realname'];
    			$data['user_pass']=$_POST['user_pass'];
    			// $mod->create();
    			$mod->create($data);
    			$upload=$mod->save();
    			if($upload>0){
    				$this->display("login");
    			}
    		}
	    }
	}
