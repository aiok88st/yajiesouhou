$(function(){
	//切换  维修 安装
	$('.vTypeIn ul li').bind('click',function(){
		$(this).find('a').addClass('aActive');
		$(this).siblings('li').find('a').removeClass('aActive');
		switch($(this).index()){
			case 0:
				$('.vTypeIn span').stop().animate({left:'0.28rem'},500);
				break;
			case 1:
				$('.vTypeIn span').stop().animate({left:'1.3rem'},500);
				break;			
		}
	});
	//热门视频
	$('.hotVideo>a').on('click',function(){
		if($(this).attr('isOpen')=='true'){
			$(this).attr('isOpen','false');
			$(this).next('div').stop().slideDown();
			$(this).prev('img').addClass('r90');
		}else{
			$(this).attr('isOpen','true');
			$(this).next('div').stop().slideUp();
			$(this).prev('img').removeClass('r90');
			$('.classify a').attr('isOpen','true');
			$('.classify a').find('img').removeClass('imgR');
			$('.classify a').next('ul').stop().slideUp();
		}
	})
	//下拉
	$('.classify a').on('click',function(){
		if($(this).attr('isOpen')=='true')
		{
			$(this).attr('isOpen','false');
			$(this).find('img').addClass('imgR');
			$(this).next('ul').stop().slideDown();
		}else{
			$(this).attr('isOpen','true');
			$(this).find('img').removeClass('imgR');
			$(this).next('ul').stop().slideUp();
		}
		
	});
});