<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<link href="/erqi/Public/css/base.css" rel="stylesheet" type="text/css" />
<link href="/erqi/Public/css/user.css" rel="stylesheet" type="text/css" />
<script src="/erqi/Public/homejs/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/erqi/Public/homejs/login.js" type="text/javascript"></script>
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
</head>

<body>
    <!------------top---------------->
        <div class="top">
            <div class="top-c">
                <div class="top-left">
                    <a href="javascript:;" class="collect">收藏</a>
                    <a href="javascript:;" class="wechat">微信</a>
                </div>
                <div class="top-right">
                    <p><a href="/erqi/index.php/Home/Index/indexs">商城首页</a>
                    <?php if($_SESSION['user']== null): ?><p><a href="/erqi/index.php/Home/Public/login">请登录</a></p>
                    <?php else: ?>
                        <p style="color:blue;">嗨，<span style="color:red;"><?php echo ($_SESSION['user']['user_name']); ?></span>&nbsp;欢迎来到老子的商城</p><?php endif; ?>
                    <!-- <p><?php echo ($_SESSION['user']['user_name']); ?></p> -->
                    <p> | <a href="/erqi/index.php/Home/Public/register">免费注册</a></p>
                  
                </div>
            </div>
        </div>

    <!------------header---------------->
    <div class="header">
        <div class="logo"><a href="index.html"><img src="/erqi/Public/images/logo.png" width="190" /></a></div>
    </div>
    <div class="clr2"></div>
	<div class="main">
    	<div class="login-left">
        	<div class="title"><h2>会员登录<span>LOGIN</span></h2></div>
            <form action="/erqi/index.php/Home/Public/dologin" method="post">
            <div class="form-group">
            	<div class="input-k">
                	<span>帐号：</span><input type="text" name="user_name" info="账号" class="input"/><p></p>
                </div>
                <div class="input-k">
                	<span>密码：</span><input type="password" name="user_pass" info="密码" class="input"/><p ></p>
                </div>
               <!--  <div class="input-k">
                    <span>验证码:</span>&nbsp;
                        <input  name="code" type="text" class="code"/>
                        <span><img src="/erqi/index.php/Home/Public/verify" width="75" height="30" onclick="this.src='/erqi/index.php/Home/Public/verify?id='+Math.random();" /></span>
                </div> -->
                <div class="input-k">
                	<span></span><input type='checkbox' name='checkbox' value=1 class="checkbox"><span class="jzzt">记住登录状态&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/erqi/index.php/Home/Public/question">忘记密码？</a></span>
                </div>
                <div class="input-k">
                	<span></span><!-- <button type="button" onclick="javascript:window.location.href='/erqi/index.php/Home/Public/dologin'">立即登录</button> -->
                    <input type="submit" value="立即登录" size="10" style="color:pink; background:blue;">
                </div>
            </div>

            </form>
            <div class="input-k" style="color:red;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($errorinfo); ?></div>
            <div class="fast-login">
            	<p>使用合作网站帐号登录：</p>
                <div class="fast-logo">
                	<a href="#"><img src="/erqi/Public/images/fast-qq.jpg" /><span>QQ</span></a>
                    <a href="#"><img src="/erqi/Public/images/fast-xl.jpg" /><span>新浪微博</span></a>
                    <a href="#"><img src="/erqi/Public/images/fast-d.jpg" /><span>豆瓣</span></a>
                    <a href="#"><img src="/erqi/Public/images/fast-zfb.jpg" /><span>支付宝</span></a>
                    <a href="#"><img src="/erqi/Public/images/fast-rr.jpg" /><span>人人网</span></a>
                </div>
            </div>
        </div>
        
        <div class="login-right">
        	<p>还不是我们的会员？</p>
            <a href="/erqi/index.php/Home/Public/register">十秒快速注册</a>
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
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/Public.js"></script>


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
})

</script>
</html>