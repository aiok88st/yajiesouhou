$(function(){
	$('.choiceArea select').on('click',function(){
		$('.choiceArea select').next('img').removeClass('selected');
		$(this).next('img').addClass('selected');	
	});
	$('.choiceArea select').change(function(){
		$(this).prev('p').html($(this).children('option:selected').text());
	});
});
