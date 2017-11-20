$(function() {
	//设置没有相关结果
	setTimeout(function() {
		$('.noResult').height($(window).height() - $('.pHead').height()-$('.video').height());
	}, 200);
	//长度 和宽度
	var l = ['23%','65.5%'];
	var w = ['0.6rem','0.9rem'];
	var n = 0;
	$('.video button').on('click',function(){
		$(this).attr('disabled','disabled');
		$(this).addClass('tActive');
		$(this).siblings('button').removeClass('tActive');
		$(this).siblings('button').removeAttr('disabled');
		n++;
		n=n%2;
		$('.video span').stop().animate({left:l[n],width:w[n]},400);
	});
});
