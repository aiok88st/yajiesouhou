$(function(){
	//查看个人信息
	$('.setting').on('click',function(){
		$('#personInfor').show().stop().animate({left:'0%'});
	});
	//返回主页
	$('.backPerson').bind('click',function(){
		$('#personInfor').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	////退出登录
	//$('.exit button').bind('click',function(){
	//	window.location.href = 'login.html';
	//});
	//查看个人信息
	$('.about').on('click',function(){
		$('#about').show().stop().animate({left:'0%'});
	});
	//返回主页
	$('.backPerson1').bind('click',function(){
		$('#about').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	////修改个人信息
    //var aid = 0;
	//$('.exchange').bind('click',function(){
	//	$('.exInput input').val($(this).prev('p').text());
	//	$('#exchangePerson .pHead p').html("修改"+$(this).text());
	//	$('#exchangePerson').show().stop().animate({left:'0%'});
     //   var aid  = $(this).attr('aid');
	//});
	//返回个人信息
	$('.backP').bind('click',function(){
		$('#exchangePerson').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	//修改密码
	$('.ep').bind('click',function(){
		$('#exchangePassword').show().stop().animate({left:'0%'});
	});
	//返回个人信息
	$('.backPwd').bind('click',function(){
		$('#exchangePassword').stop().animate({left:'100%',},function(){
			$(this).hide();
		});
	});
	////保存
    //$('.keep').bind('click',function(){
    //	$('#exchangePerson').stop().animate({left:'100%',},function(){
    //		$(this).hide();
    //	});
    //});
	//显示密码
	$('.showPassword').bind('click',function(){
		if($(this).attr('hide')=='true')
		{
			$(this).attr('hide','false');
			$(this).css('background-color','#76007a');
			$(this).siblings('p').css('color','#76007a');
			$('.exPassword ul li input').attr('type','text');
		}else{
			$(this).attr('hide','true');
			$(this).css('background-color','#999999');
			$(this).siblings('p').css('color','#999999');
			$('.exPassword ul li input').attr('type','password');
		}
	});
	$('.showPassword1').bind('click',function(){
		if($(this).attr('hide')=='true')
		{
			$(this).attr('hide','false');
			$(this).css('background-color','#76007a');
			$(this).siblings('p').css('color','#76007a');
			$('.exPassword2 ul li input').attr('type','text');
		}else{
			$(this).attr('hide','true');
			$(this).css('background-color','#999999');
			$(this).siblings('p').css('color','#999999');
			$('.exPassword2 ul li input').attr('type','password');
		}
	});
	//显示清除按钮
	$('.exPassword ul li input').bind('input',function(){
		if($(this).val().length>0)
		{
			$(this).siblings('a').show();
		}else{
			$(this).siblings('a').hide();
		}
	});
	$('.exPassword2 ul li input').bind('input',function(){
		if($(this).val().length>0)
		{
			$(this).siblings('a').show();
		}else{
			$(this).siblings('a').hide();
		}
	});
	//清除内容
	$('.exPassword ul li a').bind('click',function(){
		$(this).siblings('input').val('');
		$(this).hide();
	});
	$('.exPassword2 ul li a').bind('click',function(){
		$(this).siblings('input').val('');
		$(this).hide();
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
	//其他方式
	$('.else').bind('click',function(){
		if($(this).attr('md')=='2'){
			$(this).attr('md','1');
			$('.exPassword1').show();
			$('.exPassword').hide();
			$('.next').show();
			$('.confirm').hide();
			$('.showPassword').hide();
			$('.showPassword1').hide();
			$('.showAndMethod p').hide();
		}else{
			$(this).attr('md','2');
			$('.exPassword2').hide();
			$('.exPassword1').hide();
			$('.exPassword').show();
			$('.next').hide();
			$('.confirm1').hide();
			$('.confirm').show();
			$('.showPassword').show();
			$('.showPassword1').hide();
			$('.showAndMethod p').show();
		}
	});
	//下一步
	//$('.next').bind('click',function(){
	//	$('.exPassword1').hide();
	//	$('.exPassword2').show();
	//	$('.next').hide();
	//	$('.confirm1').show();
	//	$('.showPassword1').show();
	//	$('.showPassword').hide();
	//	$('.showAndMethod p').show();
	//});
});