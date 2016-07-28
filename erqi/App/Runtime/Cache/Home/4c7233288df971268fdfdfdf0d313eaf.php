<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>结算</title>
<link href="/erqi/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/erqi/Public/css/index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/erqi/Public/haom/css/common.css" type="text/css" media="all" />
<link rel="stylesheet" href="/erqi/Public/haom/css/settlement.css" type="text/css" media="all" />
<script type="text/javascript" src="/erqi/Public/haom/js/jquery.js"></script>
<script type="text/javascript" src="/erqi/Public/haom/js/slider.js"></script>
</head>

<body bgcolor="#e0d6df">
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


















  <div id="container">
    <div id="content">
      <div class="settlement-message">
        <h1 class="title">购买商品</h1>
        <div class="receive-container">
          <h2>收货人</h2>
          <div class="address-container">
            
            <div class="new-address">
          
              <div class="input-address" style="display:;">
                <form action="/erqi/index.php/Home/car/order" method="post">
                  <ul>
                    <li>
                      <dl>
                        <dt><span class="require">*</span>收货人：</dt>
                        <dd><input type="text" name="order_name" /></dd>
                      </dl>
                    </li>
                    <li>
                      <dl>
                        <dt><span class="require">*</span>手机号码：</dt>
                        <dd><input type="text" name="order_tel" /></dd>
                        
                      </dl>
                    </li>
                    <li>
                      <dl>
                        <dt><span class="require"></span>邮编：</dt>
                        <dd><input type="text" name="order_code" /></dd>
                      </dl>
                    </li>
                    <li>
                      <dl>
                        <dt><span class="require">*</span>地址：</dt>
                        <dd><textarea name="order_detail"></textarea></dd>
                      </dl>
                    </li>
                  </ul>
                  <input type="hidden" name="order_total" value="<?php echo ($total); ?>">
                 <input type="submit" id="tijiao" style="display:none;">
                </form>
              </div>
              <script>
			    $(".add-address").click(function(){
				  $(".input-address").toggle();
				});
          $("#zhifu").click(function(){
            // alert("aaa");
            
          });
          function funnn(){
            // alert("aaa");
            $("#tijiao").trigger('click');
          }
              </script>
            </div>
          </div>
        </div>
        <div class="confirm-form">
          <h2>确认订单信息</h2>
          <ul class="confirm-nav">
            <li class="name">商品</li>
            <li class="price">单价</li>
            <li class="count">数量</li>
            <li class="total">小计</li>
          </ul>
          <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vooo): $mod = ($i % 2 );++$i;?><ul class="confirm-content">
            <li class="name"><a href="../product/details.html"><img src="/erqi/Public/uploads/<?php echo ($vooo["cart_img"]); ?>" width="80" height="80" alt="蚕豆" /><span><?php echo ($vooo["cart_name"]); ?></span></a></li>
            <li class="price"><?php echo ($vooo["cart_price"]); ?></li>
            <li class="count"><?php echo ($vooo["cart_num"]); ?></li>
            <li class="total"><?php echo ($vooo["total"]); ?></li>
          </ul><?php endforeach; endif; else: echo "" ;endif; ?>
          <p class="form-price">
            <span>2件商品</span>
            <span>总计：￥<?php echo ($total); ?></span>
          </p>
          <div class="use-integral">
            <div class="use-inner">
            <p>
              <span><span class="checkbox"><input type="checkbox" /></span>使用芙佳积分<span class="use-count"><input type="text" value="150" /></span>个</span>
              <span class="discount">优惠：<span>￥1.50</span></span>
            </p>
            <p class="all-integral">(你有150个积分，可用积分150个)</p>
            </div>
          </div>
          <p class="need-pay">
            实付：<span>￥396.50</span>
          </p>
          <p class="cart-pay">
            <a href="cart.html" class="re-cart">返回购物车</a>
            <a href="javascript:void(0);" class="go-pay" id="zhifu" onclick="funnn()">去支付</a>
          </p>
        </div>
      </div>
      <div class="recommend">
      <h1 class="title">掌柜推荐</h1>
      <div class="rec-slider">
      <ul>
      <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span> </a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
        <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span> </a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
        <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span> </a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
        <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span> </a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
        <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span> </a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
        <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span> </a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
        <li>
          <p class="recom-img"><a href="../product/details.html"><img src="/erqi/Publichaom/img/ico-recommend01.jpg" alt="猕猴桃" width="163" height="153" /> <span></span></a> </p>
          <p class="recom-name"><a href="../product/details.html">猕猴桃（新品上市）</a></p>
          <p class="recom-price">￥5.60/斤</p>
        </li>
      </ul>
      </div>
      <p class="recommend-tab">
        <span class="recommend-prev">&lt;</span>
        <span class="recommend-next">&gt;</span>
      </p>
    </div>
    </div>
  </div>
  <div id="footer">
    <div class="footer-logo">
      芙佳
    </div>
    <dl class="company-info">
      <dt>公司信息</dt>
      <dd>TEL. 02-3446-8622</dd>
      <dd>Fax. 02-541-7487</dd>
      <dd>mail: www.fujia@163.com</dd>
    </dl>
  </div>
  <script type="text/javascript" src="/erqi/Public/homejs/jquery-1.7.1.min.js"></script>


</body>
</html>