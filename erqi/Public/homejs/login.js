$(function(){
	$(".input").focus(function(){
		$(this).css("background","yellow");
		$(this).next("p").html("");
	}).blur(function(){
		$(this).css("background","");
		var val=$(this).val();
		if(val==""){
			var info=$(this).attr("info");
			$("<p>&nbsp;"+info+"不能为空</p>").insertAfter($(this)).css("color","red");
		}
	});
	$(".code").focus(function(){
		$(this).css("background","yellow");
	}).blur(function(){
		$(this).css("background","");
	});
});