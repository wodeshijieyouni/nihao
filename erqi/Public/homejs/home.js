$(function(){
	$("p").children().mouseover(function(){
		$(this).css("color","red");
	});
	$("p").children().mouseout(function(){
		$(this).css("color","");
	});
	
});