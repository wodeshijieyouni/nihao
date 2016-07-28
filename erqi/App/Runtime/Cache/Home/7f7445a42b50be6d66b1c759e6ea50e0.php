<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品列表</title>
<link href="/erqi/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/erqi/Public/css/pro-detailed.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
<script>DD_belatedPNG.fix('*')</script>
<![endif]-->
<!--/*技术支持，小庄602842076     验证：商城技术支持*/
/*技术支持，小庄602842076    验证：商城技术支持*/
/*技术支持，小庄602842076    验证：商城技术支持*/
/*技术支持，小庄602842076    验证：商城技术支持*/
/*技术支持，小庄602842076    验证：商城技术支持*/
/*https://shop116998991.taobao.com/*/
/*https://shop116998991.taobao.com/*/
/*https://shop116998991.taobao.com/*/-->
<style type="text/css">
    #did{
        width:250px;
        height:250px;
        border:1px solid red;
        position:absolute;
        display:none;
        overflow:hidden;
    }
</style>
<script type="text/javascript" src="/erqi/Public/homejs/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/erqi/Public/homejs/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/erqi/Public/homejs/Public.js"></script>

<script type="text/javascript"> 


    $(function(){
        /*-----------------优势页面点击子导航-----------------*/
        var subNav_active = $(".active");
        var subNav_scroll = function(target){
            subNav_active.removeClass("active");
            target.parent().addClass("active");
            subNav_active = target.parent();
        };
        $(".pro-detailed-left-title a").click(function(){
            subNav_scroll($(this));
            if($(this).parent().attr("id")!="join"){
                var target = $(this).attr("href");
                var targetScroll = $(target).offset().top-90;
                $("html,body").animate({scrollTop:targetScroll},300);
                return false;
                }
        });
    
        /*----------------滚动页面跳转时定位---------------*/
        $(window).scroll(function(){
            var $this = $(this);
            var targetTop = $(this).scrollTop();
            var height = $(window).height();
            
            //document.title=targetTop;
            //控制导航悬浮
            if(targetTop>860){
                $(".pro-detailed-left-title").addClass("detailed-title-top");
            }
            else{
                $(".pro-detailed-left-title").removeClass("detailed-title-top");
            }
    
            //$("#goodsParam").offset().top
            
            if(targetTop > $("#goodsDesc").offset().top-100 && targetTop < $("#goodsParam").offset().top-100){
                $(".pro-detailed-left-title").find("li").removeClass("active");
                $(".pro-detailed-left-title").find("li").eq(0).addClass("active");
            }else if(targetTop > $("#goodsParam").offset().top-100 && targetTop < $("#goodsComment").offset().top-100){
                $(".pro-detailed-left-title").find("li").removeClass("active");
                $(".pro-detailed-left-title").find("li").eq(1).addClass("active");
            }else if(targetTop > $("#goodsComment").offset().top-100 && targetTop < $("#goodsFaq").offset().top-100){
                $(".pro-detailed-left-title").find("li").removeClass("active");
                $(".pro-detailed-left-title").find("li").eq(2).addClass("active");
            }else if(targetTop > $("#goodsFaq").offset().top-100 && targetTop < $("#serQue").offset().top-100){
                $(".pro-detailed-left-title").find("li").removeClass("active");
                $(".pro-detailed-left-title").find("li").eq(3).addClass("active");
            }else if(targetTop > $("#serQue").offset().top-100){
                $(".pro-detailed-left-title").find("li").removeClass("active");
                $(".pro-detailed-left-title").find("li").eq(4).addClass("active");
            }
        });

        //*--------------主图特效-----------*//  
        $(".img_hd").width($(".img_hd").find("li").size()*($(".img_hd").find("li").width()+12));
        $(".img_hd ul").width($(".img_hd").find("li").size()*($(".img_hd").find("li").width()+12));

        
        //加
       $('.add_btn').click(function(){
                var onum=Number($('.input-count').val())+1;
                $('.input-count').attr('value',onum);
        })
       //减
       $('.min_btn').click(function(){
                var onum=Number($('.input-count').val())-1;
                if(onum>=1){
                    $('.input-count').attr('value',onum);
                }
        });
        
    }); 

    <!---------选项卡----------------------->
    function nTabs(thisObj,Num){
    if(thisObj.className == "active")return;
    var tabObj = thisObj.parentNode.id;
    var tabList = document.getElementById(tabObj).getElementsByTagName("li");
    for(i=0; i <tabList.length; i++)
    {
      if (i == Num)
      {
       thisObj.className = "active"; 
          document.getElementById(tabObj+"_Content"+i).style.display = "block";
      }else{
       tabList[i].className = "normal"; 
       document.getElementById(tabObj+"_Content"+i).style.display = "none";
      }
    } 
    }
</script>
</head>

<body>
    <!------------top---------------->
    
    <!------------header---------------->
    
                    <!--------购物车暂无产品--------------->
                    <div class="cart-not hidden">购物车中还没有商品，赶紧选购吧！</div>
                </div>
            </div>
        </div>
    </div>
    
    <!------------header-wrap---------------->
    <!------------top---------------->
    <div class="top">
        <div class="top-c">
            <div class="top-left">
                <a href="javascript:;" class="collect" id="pp">收藏</a>
                <a href="javascript:;" class="wechat">微信</a>
            </div>
            <div class="top-right">
            <?php if(empty($_SESSION['user'])): ?><p><a href="/erqi/index.php/Home/public/login">请登录</a> | <a href="/erqi/index.php/Home/public/register">免费注册</a></p>
                <?php else: ?>

                <p>嗨，<?php echo ($_SESSION['user']['user_name']); ?>欢迎来到XXX商城 | <a href="/erqi/index.php/Home/public/logout">退出</a> </p><?php endif; ?>
            </div>
        </div>
    </div>

    <!------------header---------------->
    <div class="header">
        <div class="logo"><a href="index.html"><img src="/erqi/Public/images/logo.png" width="190" /></a></div>

        <div class="header-right">
            <div class="search-section">
                <div class="keyword"><input name="keyword" id="search"  type="text"  value="请输入关键字" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}"/></div>
                <div class="btn" onclick="search()"></div>
            </div>
            
            <div class="cart-section">
                <p>购物车(<span id="shu"></span>)</p>
                <div class="hidden-cart">
                    <p>购物车(<b id="nnn"></b>)</p>
                </div>
                <div class="hidden-cart-c">
                    <ul id="shop">
                    
                    </ul>
                    <div class="cart-btn">
                       
                            <p >共计 <b id="ji"></b>件商品<span>合计：<strong><b id="zj"></b>元</strong></span></p>
                        
                        <input type="button" value="去结算" onclick="fun()" />
                    </div>
                    <!--------购物车暂无产品--------------->
                    <div class="cart-not hidden">购物车中还没有商品，赶紧选购吧！</div>
                </div>
            </div>
        </div>
    </div>
    
    <!------------header-wrap---------------->
    <script type="text/javascript">
        function fun(){
            var total=$("#zj").html();
            window.location = "/erqi/index.php/Home/Car/dingdan/total/"+total;
        }
        function funn(a){
            $.ajax({

                url:"/erqi/index.php/Home/car/del",
                type:"get",
                data:{"id":a},
                async:true,
                dataType:"json",
                success:function(){
                     $("#shop").empty();
                }
            });
        }
        function search(){
            // alert($("#haha"));

             window.location = "/erqi/index.php/Home/list/search/keyword/"+$("#search").val();
        }
    </script>
    <div class="header-wrap">
        <div class="navwrap">
            <div id="nav">
                <div class="navbar clearfix">
                    <a class="current" href="/erqi/index.php/Home/index/showw" id="touu">首页</a>
                    <!-- <?php if(is_array($abc)): $i = 0; $__LIST__ = $abc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$asdf): $mod = ($i % 2 );++$i;?><a href="/erqi/index.php/Home/list/index/category_name/<?php echo ($asdf["category_name"]); ?>/pid/<?php echo ($asdf["pid"]); ?>/id/<?php echo ($asdf["id"]); ?>"><?php echo ($asdf["category_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?> -->
                  
                    <a href="#">品牌一览<em class="sale"></em></a>
                </div>
                <script type="text/javascript" src="/erqi/Public/homejs/jquery-1.7.1.min.js"></script>


<script type="text/javascript" src="/erqi/Public/homejs/index.js"></script>
<script type="text/javascript">
$(function(){
     
    
    $(".cart-section").hover(function(){
    $.ajax({
        url:"/erqi/index.php/Home/car/shop",
        type:"get",
        async:true,
        dataType:"json",
        success:function(data){
    $.each(data,function(p1, p2){
    if(p1=='count'){return true;}
    if(p1=='total'){return true;}
    $('#shop').append("<li id='"+p2.id+"'><a href='#'><img src='/erqi/Public/uploads/"+p2.cart_img+"' width='60' height='60' /></a><p><a href='#'>"+p2.cart_name+"</a></p><pre>"+p2.cart_price+"元 x "+p2.cart_num+"</pre><ins onclick='funn("+p2.id+")'>x</ins></li>")
    });
    $('#ji').html(data.count);
    $('#zj').html(data.total);
    $("#nnn").html(data.count);
        }
    });  
        $(".hidden-cart").css("display","block");
        $(".hidden-cart-c").css("display","block");
    },function(){
        $(".hidden-cart").css("display","none");
        $(".hidden-cart-c").css("display","none");
        $("#shop").empty();
        });

    $.ajax({
        url:"/erqi/index.php/Home/car/tou",
        type:"get",
        async:true,
        dataType:"json",
        success:function(data){
            // alert(1);
            $.each(data,function(p1,p2){
                // alert(p2.pid);
                if(p1=='count'){return true;}
                $("#touu").after("<a href='/erqi/index.php/Home/list/index/category_name/"+p2.category_name+"/pid/"+p2.pid+"/id/"+p2.id+"'>"+p2.category_name+"</a>");
            })
            $("#shu").html(data.count);
        }
    });

    
  
    

})
</script>


















                                                            
                <div class="pros subpage">
                    <h2>全部商品分类</h2>
                   
                </div>
            </div>
        </div>
    </div>


    <!------------main---------------->
    <div class="main">
        <div class="current-position"><h2><span>商品详情 >></span></h2></div>
        <div class="goods-detail-info">
            <div class="left">
                <div id="play">
                    <ul class="img_ul">
                        <li style="display:block;"><a class="img_a"><img id="mid" src="" width="430px" height="430px"></a></li>
                        <li><a class="img_a"><img id="mid" src="/erqi/Public/images/big-pro2.jpg" width="430px" height="430px"></a></li>
                        <li><a class="img_a"><img id="mid" src="/erqi/Public/images/big-pro3.jpg" width="430px" height="430px"></a></li>
                    </ul>
<!--                    <a href="javascript:void(0)" class="prev_a change_a" title="上一张"><span></span></a>
                    <a href="javascript:void(0)" class="next_a change_a" title="下一张"><span style="display:block;"></span></a>-->
                </div>
                <div id="did"><img src=""></div>
                
                <div class="img_hd">
                    <ul class="clearfix">
                            <!-- <li ><a class="img_a" ><div class="pro-small-pic" style="background:url(/erqi/Public/uploads/s_<?php echo ($list1["img_name"]); ?>)" info="/erqi/Public/uploads/<?php echo ($list1["img_name"]); ?>"></div></a></li> -->
                        <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li ><a class="img_a" ><div class="pro-small-pic" style="background:url(/erqi/Public/uploads/s_<?php echo ($vo2["img_name"]); ?>)" info="/erqi/Public/uploads/<?php echo ($vo2["img_name"]); ?>"></div></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </div>
            </div>
            <div class="right">
                <h1><?php echo ($kkk["goods_desc"]); ?></h1>
                <div class="styles">
                    <h2>颜色：</h2>
                    
                    
                    
                    <ul class="style-simg">
                        <li><div class="style-title">红</div><i></i></li>
                        <li><div class="style-title">白</div><i></i></li>
                        <li><div class="style-title">藏青</div><i></i></li>
                        <li><div class="style-title">黑</div><i></i></li>
                        <li><div class="style-title">蓝</div><i></i></li>
                    </ul>
                    <h2>尺寸：</h2>
                    <ul class="style-simg">
                        <li><div class="style-title">S</div><i></i></li>
                        <li><div class="style-title">M</div><i></i></li>
                        <li><div class="style-title">L</div><i></i></li>
                        <li><div class="style-title">XL</div><i></i></li>
                        <li><div class="style-title">XXL</div><i></i></li>
                        
                    </ul>
                    
                    
                    <h2>数量：</h2>
                    <div class="tb-amount-widget">
                    <form action="/erqi/index.php/Home/car/add/goodsid/<?php echo ($_GET['goods_id']); ?>" method="post" id="for">
                        <input type="text"  value="1" class="input-count" name="num" />
                        <div class="tb-amount-btn">
                            <a href="javascript:;" class="add_btn"></a>
                            <a href="javascript:;" class="min_btn"></a>
                        </div> 
                        <input type="submit" style="display:none;">
                    </form>
                        <span>件 库存<?php echo ($kkk["goods_stock"]); ?></span>
                    </div>
                </div>
                <div class="pro-detai-cart">
                    <a href="javascript:void(0)" class="cart"><p class="gwc" onclick="fun()">加入购物车</p></a>
                </div>
            </div>
      </div>
      <script type="text/javascript">
          function fun(){
            $("input[type=submit]").trigger('click');
          }
      </script>
      <!-- <script type="text/javascript">
          function add(goods_id){
            var info= $("#num").val();
            // alert(info);
            $.ajax({
                url:"/erqi/index.php/Home/Car/add",
                type:"get",
                data:{"num":info,"goods_id":goods_id},
                dataType:"json",
                success:function(data){


                }

            })
          }
      </script> -->
      <div class="pro-detailed">
      
          <div class="pro-detailed-left">
            <ul class="pro-detailed-left-title">
                <li class="active"><a href="#goodsDesc">商品图片浏览</a></li>
                
            </ul>
            <div class="pro-detailed-left-c">
                <!--------详细信息---------->
                <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><div id="goodsDesc">
                        <img src="/erqi/Public/uploads/<?php echo ($vo3["img_name"]); ?>" />
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--------规格参数---------->
                <div id="goodsParam">
                    <div class="title">规格参数</div>
                    <ul>
                        <li><p><span>品牌 ： </span>MIUI/小米</p></li>
                        <li><p><span>型号 ： </span>国产</p></li>
                        <li><p><span>尺寸 ： </span>20厘米-29厘米</p></li>
                        <li><p><span>编号 ： </span></p></li>
                        <li><p><span>颜色分类 ： </span>红色</p></li>
                        <li><p style="white-space:normal;"><span>适用对象 ： </span>仅适配偏震式屏幕</p></li>
                    </ul>
                </div>
                <!--------评价晒单---------->
                <div id="goodsComment">
                    <div class="title"><strong>用户评价</strong><p><span  class="active">(<?php echo ($numcom); ?>)条评价</span></p></div>
                   
                    <div class="goodsComment-c">
                        <ul>
                            <?php if(is_array($show)): $i = 0; $__LIST__ = $show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i;?><li>
                                <div class="tou-x"><img src="/erqi/Public/uploads/<?php echo ($show["img_name"]); ?>" width="78" height="78" /><p><?php echo ($show["user_name"]); ?></p></div>
                                <div class="pl-c">
                                    <div class="pl-c-1"><p style="color:pink;">好评</p><span><?php echo ($show["comment_time"]); ?></span></div>
                                    <div class="pl-c-2"><p><?php echo ($show["comment_content"]); ?></p></div>
                                    <div class="pl-c-3">
                                        <strong>来自卖家 | <a href="#">回复 (2)</a></strong>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    
                    <div class="goodsComment-more">
                        <?php if($numcom == 0): ?><span>暂无评价</span>
                        <?php else: ?>
                            <a href="/erqi/index.php/Home/Detail/comment/id/<?php echo ($_GET['id']); ?>">查看全部评价 ></a><?php endif; ?>
                    </div>
                </div>
                
                <!--------售后服务---------->
                <div id="serQue">
                    <div class="nTab3">
                        <!-- 标题开始 -->
                        <div class="TabTitle">
                          <ul id="myTab0">                     
                            <li class="active" onclick="nTabs(this,0);">常见问题</li>
                            <li class="normal" onclick="nTabs(this,1);">售后服务</li>
                          </ul>
                        </div>
                        <!-- 内容开始 -->
                        <div class="TabContent">
                                <!--常见问题-->
                              <div id="myTab0_Content0" class="intro">
                                    <h2>如何挑选商品？</h2>
                                    <p>点击页面上方“加入购物车”按钮或页面下拉时顶部导航上的“加入购物车”按钮将商品加入购物车，再点击页面右上角的“购物车”前往购物车页面进行结算。</p>
                                    
                                    <h2>收藏商品功能</h2>
                                    <p>点击“收藏按钮”后，按钮中的白心亮起,背景由黑色变为黄色代表收藏成功，再次点击取消收藏。您可在“个人中心”中的我的收藏查看所有收藏商品。</p>
                                    
                                    <h2>维修网点销售配件吗？</h2>
                                    <p>所有授权维修网点具备维修手机标配里配件的功能，部分指定授权维修网点可销售标配及部分官网配件，具体销售的产品及价格请以修网点信息为准。</p>
                                    
                                    <h2>退换货办理流程</h2>
                                    <p>您可拨打小米客服中心400-100-5678与客服人员沟通，或登录小米网“我的订单” ->“订单详情”下方点击“申请售后服务”并填写相应信息，小米看到您的申请，会安排工作人员与您进行退换货质量确认并办理相关事宜.</p>
                              </div>
                              <!--售后服务-->
                              <div id="myTab0_Content1" class="intro" style="display:none;">
                                    <p>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</p>
                                    <p> 2.退换凭证：用户提供相关订单号。</p>
                                    <p>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</p>
                                    <p>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</p>
                                    <p>1.自签收之日起，如商品及包装保持小米出售时原状且配件齐全，七天退货，十五天换货。</p>
                                    <p> 2.退换凭证：用户提供相关订单号。</p>
                                    <p>3.非质量问题的退换，需要产品包装完好、不影响二次销售，且需用户承担退换运费；非质量问题退换次数仅限一次。</p>
                                    <p>4.因质量问题办理退换服务，在邮寄商品时，用户须将快递发票一并寄回，此过程中产生的相关运费凭快递发票最高可报销15元/单。质量问题的退换，用户在线咨询，上传凭证，经确认后寄回检测，然后进入相关流程。</p>
                              </div>
                        </div>
                   </div>
                </div>
            </div>
          </div>
          
          
          <div class="pro-detailed-right">
            <div class="pro-detailed-right-title"><h3>最近浏览</h3></div>
            <div class="pro-detailed-right-c">
                <ul class="browse-list">
                    <li><a href="#"><img src="/erqi/Public/images/g01.jpg" width="80" height="80" /></a></li>
                    <li><a href="#"><img src="/erqi/Public/images/01.jpg" width="80" height="80" /></a></li>
                    <li><a href="#"><img src="/erqi/Public/images/00.jpg" width="80" height="80" /></a></li>
                    <li><a href="#"><img src="/erqi/Public/images/4li.jpg" width="80" height="80" /></a></li>
                </ul>
                <h3>买过的人还买了</h3>
                <ul class="buy-list">
                    <li><a href="#"><img src="/erqi/Public/images/g01.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/erqi/Public/images/01.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/erqi/Public/images/00.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/erqi/Public/images/big-pro2.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                    <li><a href="#"><img src="/erqi/Public/images/4li.jpg" width="80" height="80" /></a><p><strong><a href="#">小米120cm USB数据线</a></strong><i>15元</i></p></li>
                </ul>
            </div>
          </div>
      </div>
    </div>
    
     <!------底部-------->
    <div class="footer">
        <div class="footer-c">
            <dl>
                <dt>购买指南</dt>
                <dd><a href="#">第一次购物体验</a></dd>
                <dd><a href="#">品质保证原则</a></dd>
                <dd><a href="#">会员申请条件</a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="#">网银在线支付</a></dd>
                <dd><a href="#">支付宝支付</a></dd>
                <dd><a href="#">银联在线支付</a></dd>
            </dl>
            <dl>
                <dt>配送方式</dt>
                <dd><a href="#">配送方式</a></dd>
            </dl>
            <dl>
                <dt>售后服务</dt>
                <dd><a href="#">联系客服</a></dd>
                <dd><a href="#">订单查询</a></dd>
                <dd><a href="#">退换货流程及原则</a></dd>
            </dl>
            
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
                <p>周一至周日 8:00-18:00<br />（仅收市话费）</p>
                <input type="button" value="在线客户" />
            </div>
            <div class="clr20"></div>
            <div class="footer-b">
                <p><a href="#">关于我们</a>  |  <a href="#">手机商城</a>  |  <a href="#">联系我们</a></p>
                <p>2013 © DEHUA.com,All Rights Reserver. cz科技 版权所有　　网站备案号：闽ICP备0000号-1</p>
            </div>
        </div>
    </div>




</body>
<script type="text/javascript">
    // function add(id){
    //     var $
    // }
    $(function(){
        $("#mid").attr("src",$(".clearfix li:first-child a div").attr("info"));
        $("#did img").attr("src",$(".clearfix li:first-child a div").attr("info"));
        $(".pro-small-pic").mouseover(function(){
            $("#mid").attr("src",$(this).attr("info"));
            $("#did img").attr("src",$(this).attr("info"));
            $(this).css("border","3px solid pink");
        });
         $(".pro-small-pic").mouseout(function(){
            $(this).css("border","");
         });
    });
    var mid=document.getElementById("mid");
    var did=document.getElementById("did");
    var play=document.getElementById("play");
    mid.onmouseover=function(){
        var x = play.offsetLeft+mid.offsetWidth+mid.offsetLeft+"px";
        var y = play.offsetTop+"px";
        did.style.left = x;
        did.style.top = y;
        did.style.display = "block";
    }
    mid.onmouseout=function(){
        did.style.display="none";
    }
    mid.onmousemove=function(ent){
        var event=ent || window.event;
        did.scrollTop=(event.clientY-play.offsetTop)*5-450;
        did.scrollLeft=(event.clientX-(mid.offsetLeft+play.offsetLeft))*5-300;
    }

       

   
</script>
</html>