$(function(){
	$("#p").children().mouseover(function(){
		$(this).css("color","red");
	});
	$("#p").children().mouseout(function(){
		$(this).css("color","");
	});
	$(".input").focus(function(){
		$(this).css("background","yellow");
		$(this).next("p").html("");
	}).blur(function(){
		$(this).css("background","");
		var val=$(this).val();
		$(".input").next("p").html("");
		$(".reinput").next("p").html("");
		$(".username").next("p").html("");
		if(val==""){
			var info=$(this).attr("info");
			$(this).next("p").html("&nbsp;"+info+"不能为空").css("color","red");
		}
	});
	$(".code").focus(function(){
		$(this).css("background","yellow");
	}).blur(function(){
		$(this).css("background","");
	});
	$(".tel").focus(function(){
		$(this).css("background","yellow");
	}).blur(function(){
		$(this).css("background","");
		$(".input").next("p").html("");
		$(".reinput").next("p").html("");
		$(".username").next("p").html("");
	});
	$(".email").focus(function(){
		$(this).css("background","yellow");
	}).blur(function(){
		$(this).css("background","");
		$(".input").next("p").html("");
		$(".reinput").next("p").html("");
		$(".username").next("p").html("");
	});
	$(".reinput").focus(function(){
		$(this).css("background","yellow");
	}).blur(function(){
		$(this).css("background","");
		var val=$(this).val();
		$(".input").next("p").html("");
		$(".username").next("p").html("");
		if(val==""){
			var info=$(this).attr("info");
			$(this).next("p").html("&nbsp;"+info+"不能为空").css("color","red");
		}
	});
	$(".username").focus(function(){
		$(this).css("background","yellow");
	}).blur(function(){
		$(this).css("background","");
		var $val=$(this).val();
		$(".input").next("p").html("");
		$(".reinput").next("p").html("");
		$(".username").next("p").html("");
		if($val==""){
			var info=$(this).attr("info");
			$(this).next("p").html("&nbsp;"+info+"不能为空").css("color","red");
		}else{
			// alert($val);

			$.ajax({
				url:"registerinsert",
				type:"post",
				data:"user_name="+$val,
				dataType:"json",
				cache: false,
				success:function(data){
					if(data==1){
						$("#mima").html("账号已存在").css("color","red");
					}
					
				}
			});
		} 
	});

	$(".question").focus(function(){
		$(this).css("background","yellow");
		$(this).next("p").html("");
	}).blur(function(){
		$(this).css("background","");
		var $val=$(this).val();
		$(".input").next("p").html("");
		
		if($val==""){
			var info=$(this).attr("info");
			$(this).next("p").html("&nbsp;"+info+"不能为空").css("color","red");
		}else{
			// alert($val);

			$.ajax({
				url:"dousername",
				type:"post",
				data:"user_name="+$val,
				dataType:"json",
				cache: false,
				success:function(data){
					if(data>1){
						$(".quest").html("账号不存在").css("color","red");
					}
					
				}
			});
		} 
	});

});
