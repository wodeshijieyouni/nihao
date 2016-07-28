<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商城首页</title>
<link href="/erqi/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/erqi/Public/css/index.css" rel="stylesheet" type="text/css" />
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


















        <p id="haha">
                                                            
                <div class="pros subpage">
                    <h2>全部商品分类</h2>
                    <ul class="prosul clearfix" id="proinfo" style="display:block">
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li>
                                <h3><?php echo ($data["category_name"]); ?></h3>
                                <?php if(is_array($mm[$data['id']])): $i = 0; $__LIST__ = $mm[$data['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><a href="/erqi/index.php/Home/list/index/category_name/<?php echo ($li["category_name"]); ?>/pid/<?php echo ($li["pid"]); ?>/id/<?php echo ($li["id"]); ?>"><?php echo ($li["category_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="prosmore hide">
                                    <?php if(is_array($mmm[$data['id']])): $i = 0; $__LIST__ = $mmm[$data['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lii): $mod = ($i % 2 );++$i;?><span><em><a href="/erqi/index.php/Home/list/index/category_name/<?php echo ($lii["category_name"]); ?>/pid/<?php echo ($lii["pid"]); ?>/id/<?php echo ($lii["id"]); ?>"><?php echo ($lii["category_name"]); ?></a></em></span><?php endforeach; endif; else: echo "" ;endif; ?>
                                    
                                    
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>   
                    </ul>
                </div>
            </div>
        </div>
    </div>

	<!------------banner---------------->
	<div id="banner">
        <div class="fullSlide">
            <div class="bd">
                <ul>
                    <li _src="url(/erqi/Public/images/banner.jpg)" style="background:#000 center 0 no-repeat;"><a href="https://shop116998991.taobao.com/"></a></li>
                    <li _src="url(/erqi/Public/images/2.jpg)" style="background:#DED5A1 center 0 no-repeat;"><a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w5003-11903850250.1.YOZUX7&id=521221929103&scene=taobao_shop"></a></li>
                    <li _src="url(/erqi/Public/images/5.jpg)" style="background:#FEFF19 center 0 no-repeat;"><a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-11895250131.3.YOZUX7&id=521741523734"></a></li>
                </ul>
            </div>
            <div class="hd"><ul></ul></div>
            <span class="prev"></span>
            <span class="next"></span>
        </div>
    </div>
	
    <!------------main---------------->
	<div class="main">
    	<!------热门推荐-------->
    	<div class="recommend">
        	<div class="title"><img src="/erqi/Public/images/rt.png" /><p>促销与热销</p></div>
        	<div class="clr20"></div>
            <div class="left">
            	<div class="img"><a href="#"><img src="/erqi/Public/images/501.gif" width="619" height="309" /></a></div>
                <?php if(is_array($chu)): $i = 0; $__LIST__ = $chu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$chuxiao): $mod = ($i % 2 );++$i;?><div class="img img_309"><p><strong><a href="#"><?php echo ($chuxiao["goods_name"]); ?></a></strong><span><?php echo ($chuxiao["promote_price"]); ?>元</span></p><a href="#"><img src="/erqi/Public/images/502.jpg" width="220" height="220"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="right">
            	<h2><span>TOP 5</span>热销商品</h2>
                <ul class="board-list">
                <?php if(is_array($xiaoliang)): $k = 0; $__LIST__ = $xiaoliang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xiao): $mod = ($k % 2 );++$k;?><li>
                    	<span class="item-num top3"><?php echo ($k); ?></span>
                        <span class="item-info">
                        	<span class="item-title"><a href="#"><?php echo ($xiao["goods_name"]); ?></a></span>
                            <span class="item-price"><?php echo ($xiao["shop_price"]); ?></span>
                        </span>
                        <span class="item-thumb"><a href="#"><img src="/erqi/Public/uploads/<?php echo ($xiao["goods_img"]); ?>" width="70" height="70" /></a></span>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                </ul>
            </div>
        </div>
        
        <!------热门推荐-------->
        
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="list-title">
            	<p><strong style="border-bottom:solid 2px #00c3d5;"><?php echo ($data["category_name"]); ?></strong></p><a href="/erqi/index.php/Home/list/index/pid/<?php echo ($data["pid"]); ?>/category_name/<?php echo ($data["category_name"]); ?>">More</a>
            </div>
       
            <div class="list-div">
            	<ul>
                    <?php if(is_array($nnn[$data['category_name']])): $i = 0; $__LIST__ = $nnn[$data['category_name']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sb): $mod = ($i % 2 );++$i;?><li>
                        <a href="#"><img src="/erqi/Public/uploads/<?php echo ($sb["goods_img"]); ?>" width="220" height="220" /></a>
                        <p><a href="#"><?php echo ($sb["goods_name"]); ?></a></p>
                        <pre>适用于小米平板, 所有手机适用于小米平板, 所有手机</pre>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
       
</p>	
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
                <p><a href="#">关于我们</a>  |  <a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w4004-11895250131.3.YOZUX7&id=521741523734">手机商城</a>  |  <a href="#">联系我们</a></p>
                <p>2013 © DEHUA.com,All Rights Reserver. cz科技 版权所有　　网站备案号：闽ICP备0000号-1</p>
            </div>
        </div>
    </div>


</body>
<script type="text/javascript" src="/erqi/Public/homejs/jquery-1.7.1.min.js"></script>

<!--------banner特效--------------->
<script type="text/javascript" src="/erqi/Public/homejs/index.js"></script>
<script type="text/javascript">


/*------------------------------banner特效-----------------------------------*/
	$(".fullSlide").hover(function(){
		$(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
	},
	function(){
		$(this).find(".prev,.next").fadeOut()
	});
	$(".fullSlide").slide({
		titCell: ".hd ul",
		mainCell: ".bd ul",
		effect: "fold",
		autoPlay: true,
		autoPage: true,
		trigger: "click",
		startFun: function(i) {
			var curLi = jQuery(".fullSlide .bd li").eq(i);
			if ( !! curLi.attr("_src")) {
				curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
			}
		}
});
</script>
</html>