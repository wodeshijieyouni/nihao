<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品列表</title>
<link href="/erqi/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/erqi/Public/css/pro-list.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/erqi/Public/homejs/DD_belatedPNG.js"></script>
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
</head>

<body>
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
    	<div class="current-position"><h2><a href="/erqi/index.php/Home/index/showw">首页</a> > <a href="#"><?php echo ($category_name); ?></a></h2></div>
        <div class="big-class"><h1><?php echo ($category_name); ?></h1></div>
        <div class="small-class">
        <?php if($in == 1): ?><p>分类： 
                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dat): $mod = ($i % 2 );++$i;?><a href="/erqi/index.php/Home/list/index/category_name/<?php echo ($dat["category_name"]); ?>/pid/<?php echo ($dat["pid"]); ?>/id/<?php echo ($dat["id"]); ?>"><?php echo ($dat["category_name"]); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?>

            </p><?php endif; ?>
        <?php if($in == 0): ?><p>分类：  
                <?php if(is_array($tag)): $k = 0; $__LIST__ = $tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['pareid'] == 0): if($k != 1): ?><br><?php endif; echo ($vo['tagname']); ?>:<?php else: ?>
                    <a href="/erqi/index.php/Home/list/index/category_name/%E6%9C%8D%E8%A3%85/pid/0/id/33/hahaha/<?php echo ($vo["id"]); ?>"><?php echo ($vo['tagname']); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>

            </p><?php endif; ?>
        </div>
        <div class="box-hd">
            <div class="filter-lists">
                <ul>
                    <li class="current"><a href="#" rel="nofollow">推荐</a>|</li>
                    <li ><a href="#" rel="nofollow">最新</a>|</li>
                    <li ><a href="#" rel="nofollow">价格从高到低</a>|</li>
                    <li ><a href="#" rel="nofollow">价格从低到高</a>|</li>
                    <li ><a href="#" rel="nofollow">关注度</a></li>
                </ul>
            </div>
            
            <div class="more">
                <a href="javascript:;"><i class="icon-check"></i><p>仅显示特惠商品</p></a>
                <a href="javascript:;"><i class="icon-check"></i><p>仅显示有货商品</p></a>
            </div>
        </div>
        
        <div class="products-list" id="products-list">
        	<ul>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><li>
                    	<div class="img" style="background:url(/erqi/Public/uploads/<?php echo ($voo["goods_img"]); ?>) no-repeat center center"><a href="products-detailed.html"></a></div>
                        <div class="w">
                        	<div class="left"><p><a href="/erqi/index.php/Home/Detail/index/goods_id/<?php echo ($voo["id"]); ?>"><?php echo ($voo["goods_name"]); ?> <?php echo ($voo["goods_desc"]); ?></a></p><span><?php echo ($voo["shop_price"]); ?></span></div>
                            <div class="right"><i class="star5"></i><p>22264人评价</p></div>
                        </div>
                        <div class="btn">
                        	<a href="products-detailed.html" class="btn1">立即购买</a>
                            <a href="products-detailed.html" class="btn2">加入购物车</a>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?> 
            </ul>
            <div class="clr10"></div>
            <div class="fy">
            	<div class="fy-c">
                	<a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <span>...</span>
                    <a href="#">94</a>
                    <a href="#">></a>
                    <span>共94页</span>
                    <span>到第</span>
                    <input type="text" value="1" />
                    <span>页</span>
                    <a href="#">确定</a>
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
<script type="text/javascript" src="/erqi/Public/homejs/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/erqi/Public/homejs/Public.js"></script>


<script type="text/javascript">
$(function(){
	/*------------------------------排列互选框-----------------------------------*/	
	$(".box-hd .more a").click(function(){
		if($(this).find("i").attr("class")=="icon-check"){
			$(this).find("i").attr("class","icon-check-active");
		}
		else{
			$(this).find("i").attr("class","icon-check");
		}
	})
	
	$("#products-list").find("li").hover(function(){
		$(this).addClass("active");
	},function(){
		$(this).removeClass("active");
	})
})

</script>
</html>