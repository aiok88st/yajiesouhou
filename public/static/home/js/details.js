$(function(){
    var link = 'http://archie.hengdikeji.com/yajie';
    //var link = 'http://127.0.0.1/yajie';
    var url = link+'/index.php/home/teach/';
    var imgLink = link+'/public/static/home/';
	//收藏
	$('.collect').on('click',function(){
        var id = $('#aid').val();
		if($(this).attr('collect')=='false')
		{
            $(this).attr('collect','true');
            $(this).find('img').attr('src',imgLink+'img/hasCollect.png');
            $(this).find('span').css({"top":"0.24rem","opacity":'1.0'});
            $(this).find('span').stop().show().animate({top:'-0.2rem',opacity:'0'},500,function(){
                $(this).hide().css({"top":"0.24rem","opacity":'1.0'});
            });
            $.ajax({
                url:url+'click',
                type:'post',
                data:{"id":id,"type":1},
                success:function(res){
                    if(res.code==1){

                    }

                }
            });

		}else{
            $(this).attr('collect','false');
            $(this).find('img').attr('src',imgLink+'img/noCollect.png');
            $.ajax({
                url:url+'click',
                type:'post',
                data:{"id":id,"type":2},
                success:function(res){
                    if(res.code){

                    }
                }
            });

		}	
	});
	//下载
	$('.download').on('click',function(){
		$('.popWindow1').show();
	});
	//关闭
	$('.close').on('click',function(){
		$('.popWindow1').hide();
	});
	//复制
	var copy = new Clipboard('.copy');
	$('.copy').bind('click',function(){
		$('.popWindow1').hide();
		popw("温馨提示","复制网站成功！",1);
	});
});