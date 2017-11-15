$(function(){
	//选择历史记录
	$('.historyContent ul li').on('click',function(e){
		$('#search').val($(this).find('p').text());
	});
});