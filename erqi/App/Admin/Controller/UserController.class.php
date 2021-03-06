<?php
namespace Admin\Controller;
use Admin\Controller;

//用户信息控制器
class UserController extends CommonController {
    //封装搜素条件
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['username']  = array('like', "%{$_REQUEST['keyword']}%");
			$where['name']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
		//判断是否有角色信息搜索
		if(!empty($_REQUEST['roleid'])){
			$list = M("User_role")->where("rid={$_REQUEST['roleid']}")->select();
			if($list && count($list)>0){
				$uid=array();
				foreach($list as $v){
					$uid[]=$v['uid'];
				}
				//封装uid的条件
				$map["id"]=array("in",$uid);
			}
		}
	}
	public function rollist($uid){
		$aa=M('user');
		// $id=$_GET['uid'];
		//echo $id;exit;
		// $mm=$_GET['uid'];
		$user=$aa->find($uid);
		// if($user){
		// 	echo "111";exit;
		// }
		// dump($user);
		$cc=M('user_role')->where('uid='.$uid)->select();
		$rid=array();
		foreach($cc as $v){
			$rid[]=$v['rid'];
		}
		$this->assign('rid',$rid);
		// dump(M('user_role')->where('uid='.$uid)->select());
		$this->assign('user',$user);
		$mod=M('role');
		$list=$mod->select();
		$this->assign('list',$list);
		// dump($list);
		$this->display();

	}
	public function save () {
		
		$mod=M('user_role');
		$mod->where('uid='.$_POST['uid'])->delete();
		foreach($_POST['rid'] as $v){
			
			
			
			$data=array(
				'uid'=>$_POST['uid'],
				'rid'=>$v
				);
			$mod->add($data);
			// dump($mod);
			// echo $mod->getError();
			
		}
		if(!empty($_POST['uid'])){
    		$this->success(L('修改成功'));
    	}
	}
	
    
    
    
    //数据查询自动追加信息方法（负责在查出用户信息时追加出对应的角色）
    public function _tigger_list(&$list){
       $mod=M();
       // dump($mod);
       foreach($list as &$v){
       	$data=$mod->query("select name from __PREFIX__User_role a,__PREFIX__role b,__PREFIX__user c where c.id={$v['id']} and a.uid={$v['id']} and b.id=a.rid");
       	// dump($data);
       	$b=array();
       	foreach($data as $n){
       		$b[]=$n['name'];
       	}
       	// dump($b);
       	$v['roles']=implode(',',$b);
       }
       // dump($list);
        //获取所有角色信息
        // $res = M("Role")->field("id,name")->select();
        // $this->assign("reslist",$res);
    }
    
    
}
// $mod = M();
//         foreach($list as &$v){
//             $data = $mod->query("select r.name from __PREFIX__user_role ur,__PREFIX__role r where ur.rid=r.id and ur.uid=".$v['id']);
//             //处理查询的角色信息
//             // dump($data);
//             $rname = array();
//             foreach($data as $r){
//                 $rname[]=$r['name'];
//             }
//             //将查出的结果放到原数据中
//             $v["roles"]=implode(",",$rname);
//         }
//         
//         
//         
//         
//         
//         public function saverole(){
		//获取被操作的用户角色Model对象
	// 	$mod = M("User_role");
	// 	//删除当前用户的所有角色信息
	// 	$mod->where("uid=".$_POST['uid'])->delete();
	// 	//将当前选择的角色信息添加上去
 //        if(is_array($_POST['rid'])){
 //            foreach($_POST['rid'] as $v){
 //                $data['uid']=$_POST['uid'];
 //                $data['rid']=$v;
 //                $mod->add($data);
 //            }
 //        }
 //        $this->success("添加成功");
	// }
	// 
	// 
	// 
	// 
	// 
	// 
	// public function rolelist($uid=0){
		//1. 获取当前用户信息
	// 	$user = M("User")->find($uid);
 //        $this->assign("user",$user);
	// 	//2. 获取所有角色信息
 //        $rolelist = M("Role")->select();
 //        $this->assign("rolelist",$rolelist);
	// 	//3. 获取当前用户的角色信息
	// 	$list = M("User_role")->where("uid=".$uid)->select();
	// 	dump($list);
	// 	//对获取的结果进行处理
 //        $rids=array();
 //        foreach($list as $v){
 //            $rids[]=$v['rid']; //将每个角色id放到rids数组中
 //        }
	// 	$this->assign("rids",$rids);
 //        //加载模板
 //        $this->display("rolelist");
	// }