$(function(){
	$('.back').on('click',function(){
		window.history.go(-1);
	});	
	
});


//通用弹窗
function popw(fp,sp,index,callBack,e){
	/*
	 * fp为提示标题
	 * sp为提示内容
	 * index的选择为1,2即弹窗选项为一个（确定）或者两个（确定与取消）
	 * callBack为两个按钮时传入的执行功能的函数
	 */
	/*
	 * 例子：
	 * popw("温馨提示","很高兴为您解决问题！",2,function(){
	 window.location.href='index.html';
	 });
	 */
	$('body').append('<div class="popWindow"><div class="popBox"><ul><li><p class="firstp">'+fp+'</p ></li><li><p class="secondp">'+sp+'</p ></li><li><div class="onlyOne" style="display: none;"><button class="confirm">确定</button></div><div class="onlyTwo"><span></span><div class="oLeft floatl"><button class="ok">确定</button></div><div class="oRight floatr"><button class="confirm" >取消</button></div><div class="clearBoth"></div></div></li></ul></div></div>');
	//关闭弹窗事件
	$('.confirm').on('click',function(){
		$('.popWindow').remove();
		if(index==1)
		{
			if (typeof(callBack) == 'function') {
				callBack();
			}
		}
	});
	if(index==2)
	{
		$('.onlyOne').hide();
		$('.onlyTwo').show();
		$('.ok').on('click',function(){
			$('.popWindow').remove();
			callBack();
		});
	}else{
		$('.onlyOne').show();
		$('.onlyTwo').hide();
	}

}


function getTest(){
    var data=[];
    $('.movie_box').each(function(){
        var box=$(this).children('.wjdc_list');
        var type=box.find('.tip_wz').text();
        var title=box.find('.btwenzi').text();
        var score=box.children('.scot').val();
        var input=box.children('.choice').children('.chput').children('.input');
        var a={};
        if(type=="【单选】"){
            var types=1;
        }else if(type=="【多选】"){
            var types=2;
        }else if(type=="【判断】"){
            var types=3;
        }else if(type=="【填空】"){
            var types=4;
        }
        a.type=types;
        a.title=title;
        a.score=score;
        a.input=[];
        input.each(function(){
            var f=$(this).find('input');
            var check={};
            if(type=="【单选】" || type=="【多选】" || type=="【判断】"){
                check.val= f.val();
                if(f.is(":checked")){
                    check.answer=1;
                }else{
                    check.answer=0;
                }
            }
            a.input.push(check);
        })
        data.push(a);
    });
    return data;
}
