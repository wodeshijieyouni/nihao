<?php
namespace Admin\Controller;
use Admin\Controller;

//商品图片控制器
class GoodsImgController extends CommonController {
     public function index($id=2){
       $mod =M(CONTROLLER_NAME);
       $list=$mod->where("goods_id=".$id)->select();
       // dump($list);
       // // // dump($list["img_name"]);
       // exit;
       // dump($_GET['id']);
          $this->assign('id',$_GET['id']);
       $this->assign("list",$list);
       $this->display("index");


     }



   		public function add(){
          // $list=M("goods")->where("id=".$id)->find();
          // $this->assign("list",$list);

          $this->display();
      }
      public function insert(){
          $id=$_POST['goods_id'];
          // dump($id);
          $imgmodel=M("goods_img");
          $img=$imgmodel->where("goods_id=".$id)->select();
          $num=count($img);

          if($num>=4){
           $this->error(L('该商品图片已满'));
            exit();
          }
           $upload = new \Think\Upload();// 实例化上传类   
           // $upload->maxSize   =     3145728 ;// 设置附件上传大小  
           $upload->exts      =     array('gif', 'png', 'jpeg','jpg');// 设置附件上传类型
           $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
           $upload->saveName = array('uniqid','');
           $upload->rootPath = "./";
           $upload->autoSub = false;
           $info = $upload->upload();
          if(!$info) {
          // 上传错误提示错误信息    
          $this->error($upload->getError());
          }else{
          // 上传成功 获取上传文件信息
              foreach($info as $file){
                $path=$file['savepath'];
                $pic=$file['savename'];
                $this->imageZoom($pic,$path,$width=70,$height=70,$pre="s_");//详情页非封面图片尺寸
                $this->imageZoom($pic,$path,$width=100,$height=100,$pre="m_");//详情页非封面图片尺寸
                $this->imageZoom($pic,$path,$width=200,$height=200,$pre="l_");//详情页非封面图片尺寸
                $model = M('goods_img');
                $data['goods_id'] = $_POST['goods_id'];
                $data['img_name'] = $file['savename'];
                $data['picaddress'] = $file['savepath'];
                unset( $_POST[$model->getPk()]);
                $model->create($data);
                $aa=$model->add();

              }
               // dump($model->create());
                if($aa>0){
                  $this->success(L('新增成功'));
                  // echo 111;
                }else{
                  $this->error(L('新增失败').$model->getastSql());
                  // echo 22;
                }
          }
      }

     public function imageZoom($pic,$path,$width=50,$height=50,$pre){
      // dump($pre);
      // exit;
          $path = rtrim($path,"/")."/";
          //获取原图片信息
          $info = getImageSize($path.$pic);
          // dump($info[2]);
          // exit;
          $w = $info[0]; //宽度
          $h = $info[1]; //高度
          //根据原图片类型来创建图片资源画布
          switch($info[2]){
            case 1: //GIF
              $srcim = imagecreatefromgif($path.$pic);
              break;
            case 2: //JPG
              $srcim = imagecreatefromjpeg($path.$pic);
              break;
            case 3: //PNG
              $srcim = imagecreatefrompng($path.$pic);
              break;
            // case 4: //jpg
            //   $srcim = imagecreatefromjpg($path.$pic);
            // break;
            // default:
            //   die("未知图片格式！");
          }
          // dump($srcim);
          // exit;
          //计算图片缩放后的大小
          if($width/$w<$height/$h){
            $dw=$width;
            $dh=$h*($width/$w);
          }else{
            $dw=$w*($height/$h);
            $dh=$height;
          }
          $dstim = imagecreatetruecolor($dw,$dh);
          // $srcim=$src
          //执行缩放
          imagecopyresampled($dstim,$srcim,0,0,0,0,$dw,$dh,$w,$h);
          // dump($info[2]);
          // exit;
          //输出图片
          switch($info[2]){
            case 1: //GIF
              imagegif($dstim,$path.$pre.$pic);
              break;
            case 2: //JPG
              $img=imagejpeg($dstim,$path.$pre.$pic);
              break;
            case 3: //PNG
              imagepng($dstim,$path.$pre.$pic);
              break;
            // default:
            //   die("未知图片格式！");
          }
          // dump($img);
          // exit;
          //销毁资源
          imagedestroy($dstim);
          imagedestroy($srcim);
          
          return true;
        }
      public function edit() {
        $model = M(CONTROLLER_NAME);
        $id = $_REQUEST[$model->getPk()];
        $vo = $model->find($id);
        $this->assign('vo', $vo);
        $this->display('edit');
      }
      public function update(){
          $mod=M(CONTROLLER_NAME);
          $list1=$mod->where("id=".$_POST['id'])->find();
          $list2=$mod->where("goods_id=".$list1['goods_id']." and img_type=".$_POST['img_type'])->select();
          foreach($list2 as $v){
            $data['id']=$v['id'];
            $data['img_type']=0;
            $data['goods_id']=$v['goods_id'];
            $data['img_name']=$v['img_name'];
            $data['picaddress']=$v['picaddress'];
            $mod->save($data);
           
          }
          parent::update($_POST);
      }
      public function del() {
          $mod=M(CONTROLLER_NAME);
          $id=$_GET['id'];
          $list=$mod->find($id);
          $path=$list['picaddress'];
          $imgname=$list['img_name'];
          $data=$mod->where("id=".$_GET['id'])->delete();
          unlink($path.$imgname);
          unlink($path."s_".$imgname);
          unlink($path."m_".$imgname);
          unlink($path."l_".$imgname);
          echo $data;
          // $this->index();
      }
}