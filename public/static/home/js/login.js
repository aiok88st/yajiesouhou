$(function(){
	//获取动态密码
	$('#getCode').on('click',function(){
		$(this).attr('disabled','disabled');
		var time = 60;
		$(this).html(time+'s重发');
		var timeSet = setInterval(function(){
			time--;
			if(time==-1)
			{
				clearInterval(timeSet);
				$('#getCode').html('重新发送');
				$('#getCode').removeAttr('disabled');
			}else{
				$('#getCode').html(time+'s重发');
			}
			
		},1000);
	});
	//同意雅洁协议
	$('.checkBox input[type=checkbox]').change(function(){
		if($(this).is(':checked'))
		{
			$(this).prev('img').css('opacity',1);
		}else{
			$(this).prev('img').css('opacity',0);
		}
	});
	//打开雅洁协议
	$('.agree').on('click',function(){
		$('#content').show().stop().animate({top:'0%',height:'100%'},500);
	});
	$('#content .closeAll').on('click',function(){
		$('#content').stop().animate({top:'50%',height:'0%'},500,function(){
			$(this).hide();
		});
	});
	$('#content .accept').on('click',function(){
		$('#content').stop().animate({top:'50%',height:'0%'},500,function(){
			$(this).hide();
		});
		$('.cb input').attr('checked','checked');
	});
});