$(function(){
    var link = 'http://archie.hengdikeji.com/yajie';
    var url = link+'/index.php/home/article/';
    var imgLink = link+'/public/static/home/';
	//已解决
	$('.gbLeft button').on('click',function(){
		//点赞数
		var n = parseInt($(this).find('span').text());
		var id = $('#aid').val();
		if($(this).attr('hasClick')=='true')
		{
			//点赞
			$(this).attr('hasClick','false');
			$(this).css('color','#6d1a7a');
			$(this).css('background-image','url('+imgLink+'img/goodh.png)');
			n++;
			$(this).find('span').text(n);
			$(this).find('p').show();
			$(this).find('p').animate({top:'-20px',opacity: 0},500,function(){
				$(this).css('display','none');
				$(this).css('opacity',1.0);
				$(this).css('top',0);
			});
			$('.gbRight button').attr('disabled','disabled');
            $.ajax({
                url:url+'click',
                type:'post',
                data:{"id":id,"type":1},
                success:function(res){
                    if(res.code == 1){
                        popw("温馨提示","很高兴为您解决问题！",1);
                        $('.clicknum_'+id).text(res.clicknum);
                    }else{
                        $('.clicknum_'+id).text(res.clicknum);
                    }
                }
            });

		}else {
            //取消点赞
            $(this).attr('hasClick', 'true');
            $(this).css('color', '#666666');
            $(this).css('background-image', 'url('+imgLink+'img/goodv.png)');
            n--;
            $(this).find('span').text(n);
            $('.gbRight button').removeAttr('disabled');
            $.ajax({
                url: url,
                type: 'post',
                data: {"id": id, "type": 2},
                success: function (res) {
                    if (res.code == 1) {
                        $('.clicknum_' + id).text(res.clicknum);
                    } else {
                        $('.clicknum_' + id).text(res.clicknum);
                    }
                }
            });
        }
	});
	//未解决
	$('.gbRight button').on('click',function(){
		if($(this).attr('hasClick')=='true')
		{
			//点赞
			$(this).attr('hasClick','false');
			$(this).css('color','#6d1a7a');
			$(this).css('background-image','url('+imgLink+'img/badh.png)');
			$('.gbLeft button').attr('disabled','disabled');
			popw("非常抱歉","您可以点击确定直接向我们反馈！",2,function(){
				window.location.href=url+'feedBack';
			});
		}else{
			//取消点赞
			$(this).attr('hasClick','true');
			$(this).css('color','#666666');
			$(this).css('background-image','url('+imgLink+'img/badv.png)');
			$('.gbLeft button').removeAttr('disabled');
		}
		
	});
})