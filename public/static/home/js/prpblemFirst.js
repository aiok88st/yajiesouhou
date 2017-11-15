$(function(){
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