<?php

namespace Home\Controller;

use Think\Controller;

	class DetailController extends Controller{
	   public function index($goods_id){
	   		$imgmodel=M("goods_img");
	   		// $goods_id=$_GET['id'];
	   		// $goods_id=73;
	   		$list1=$imgmodel->where("goods_id=".$goods_id." and img_type=1")->find();
	   		$list2=$imgmodel->where("goods_id=".$goods_id." and img_type=0")->select();
	   		$list3=$imgmodel->where("goods_id=".$goods_id)->select();
	   		$this->assign("list1",$list1);
	   		$this->assign("list2",$list2);
	   		$this->assign("list3",$list3);
	   		$commodel=M("comment");
	   		$com=$commodel->where("goods_id=".$goods_id)->select();
	   		$numcom=count($com);
	   		$kkk=M('goods')->where('id='.$goods_id)->find();
	   		$this->assign('kkk',$kkk);
	   		$this->assign("numcom",$numcom);

	   		$user_comment=M();
	   		$show=$user_comment->query("select c.comment_time,c.comment_content,c.comment_classify,u.user_name,u.user_avatar 
	   			from store_user u,store_comment c where c.goods_id=".$goods_id." and u.id=c.user_id order by c.id limit 4");
	   		$list=$user_comment->query("select t.tagname from store_goods_tag g,store_tag t where g.goodsid=67 and t.id=g.tagid");
	   		// dump($list);
	   		// exit;
	   		$this->assign("show",$show);
	   		$this->display("index");
	   }
	   public function comment(){
	   		$user_comment=M();
	   		$goods_id=2;
	   		$aaa=$user_comment->query("select c.comment_time,c.comment_content,c.comment_classify,u.user_name,u.user_avatar 
	   			from store_user u,store_comment c where c.goods_id=".$goods_id." and u.id=c.user_id");
	   		$count=count($aaa);
	   		$Page       = new \Think\Page($count,4);
	   		$firstRow=$Page->firstRow;
	   		$listRow=$Page->listRows;
	   		
	   		$list=$user_comment->query("select c.comment_time,c.comment_content,c.comment_classify,u.user_name,u.user_avatar 
	   			from store_user u,store_comment c where c.goods_id=".$goods_id." and u.id=c.user_id order by c.id limit "
	   			.$firstRow.",".$listRow);
	   		$show       = $Page->show();// 
	   		$this->assign("list",$list);
	   		$this->assign("page",$show);
	   		$this->display("comment");
	   }
	}
