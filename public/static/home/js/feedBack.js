$(function(){
	$('.type select').change(function(){
		$(this).prev('p').html($(this).children('option:selected').text());
	});
});