//没有添加产品
setTimeout(function() {
	$('.noResult').height($(window).height() - $('.pHead').height());
}, 100);
$(function(){
	//首次添加产品
	$('.add').bind('click',function(){
		$('.noResult').hide();
		$('.addProduce').show();
	});
	//删除
	touch.on('.pTouch', 'swipeleft', function(ev) {
		ev.stopPropagation();
		$(this).siblings('.delete').stop().animate({'right':'-1.0rem'},150);
        $(this).parent('.produceBox').animate({'margin-left':'-1.0rem'},400);
    });
    touch.on('.pTouch', 'swiperight', function(ev) {
		ev.stopPropagation();
		$(this).siblings('.delete').stop().animate({'right':'-2.0rem'},900);
        $(this).parent('.produceBox').animate({'margin-left':'0rem'},400);
    });    	
    //$('.delete').bind('click',function(){
    //	 $(this).parent('.produceBox').parent('.myProduce').remove();
    //})
    //添加新产品
    //$('.addNew').bind('click',function(){
    //	$('.produces').hide();
		//$('.addProduce').show();
    //});

    ////添加产品页面的添加按钮
    //$('.addId').bind('click',function(){
    //	$('.produces').show();
		//$('.addProduce').hide();
    //});
    $('.bp').bind('click',function(){
        $('#produce').stop().animate({'left':'100%'},500);
    });
	////选择类型
	//$('.type select').change(function(){
	//	$(this).prev('span').html($(this).children('option:selected').text());
	//});
	//$('.quick').bind('click',function(){
     //   alert(111);
	//	$('#quickRepair').stop().animate({'left':'0%'},500);
	//});
	$('#quickRepair .backPerson').bind('click',function(){
		$('#quickRepair').stop().animate({'left':'100%'},500);
	});
});