$(function(){
	//查看个人信息
	$('.head').on('click',function(){
		$('#personInfor').show().stop().animate({left:'0%'});
	});
	//返回主页
	$('.backPerson').bind('click',function(){
		$('#personInfor').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	//查看关于
	$('.about').on('click',function(){
		$('#about').show().stop().animate({left:'0%'});
	});
	//返回主页
	$('.backPerson1').bind('click',function(){
		$('#about').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	//修改姓名信息
	$('.exchangeN').bind('click',function(){
		$('#exchangePerson .exInput input').val($(this).prev('p').text());
		$('#exchangePerson').show().stop().animate({left:'0%'});
	});
	//返回个人信息
	$('.backP').bind('click',function(){
		$('#exchangePerson').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
		$('#exchangePhone').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
		$('#exchangeAddress').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	//保存姓名
	//$('.keepName').bind('click',function(){
	//	$('#exchangePerson').stop().animate({left:'100%',},function(){
	//		$(this).hide();
	//	});
	//});
	//修改手机信息
	$('.exchangeP').bind('click',function(){
		$('#exchangePhone .exInput ul li:nth-child(1) input').val($(this).prev('p').text());
		$('#exchangePhone').show().stop().animate({left:'0%'});
	});
	//保存手机信息
	//$('.keepPhone').bind('click',function(){
	//	$('#exchangePhone').stop().animate({left:'100%',},function(){
	//		$(this).hide();
	//	});
	//});
	//修改地址信息
	$('.exchangeA').bind('click',function(){
		$('#exchangeAddress').show().stop().animate({left:'0%'});
	});
	//保存地址信息
	$('.keepAddress').bind('click',function(){
		$('#exchangeAddress').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	//发送验证码
	$('.send').bind('click',function(){
		$(this).attr('disabled','disabled');
		$('.send').css('color','#a9a9a9');
		var count = 60;
		$(this).text(count+'s后重新发送');
		var time = setInterval(function(){
			count--;
			if(count==-1)
			{
				$('.send').text('发送验证码');
				clearInterval(time);
				$('.send').removeAttr('disabled');
				$('.send').css('color','#76007a');
			}else{
				$('.send').text(count+'s后重新发送');	
			}
		},1000);
	});
});