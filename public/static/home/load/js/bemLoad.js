
function bemLoad(time,alpha){
	/*
	 * 必须加载的图片
	 * 必须加载的js库jquery
	 */
	/*
	 * time为加载条时间
	 * alpha为背景透明度
	 * var load = new bemLoad(200,0.75);创建加载类
	 * load.close();为关闭加载层
	 */
    var link="http://archie.hengdikeji.com/yajie/public/static/home/load";
    var html='';
    html +='<div id="BemLoad" style="z-index:999;position: absolute;width: 100%;top: 0;left: 0;height: 100%;background-color: rgba(0,0,0,'+alpha+');display: flex;justify-content: center;align-items: center;flex-direction: column;display: -webkit-flex;-webkit-align-items: center;-webkit-justify-content: center;-webkit-flex-direction: column;">';
	html +='<img style="width: 46px;height: 46px;" src="http://archie.hengdikeji.com/yajie/public/static/home/load/LoadImg/load0.png"/>';
    html +='<p style="text-align: center;margin:0 auto;font-size: 14px;color: #fff;">定位中...</p>'
    html +='</div>';
    $('body').append(html);
	var self = this;
	self.count = 1;
	self.time = setInterval(function(){
		$('#BemLoad img').attr('src',link+'/LoadImg/load'+(self.count++)+'.png');
		if(self.count == 9){
			self.count =0;
		}
	},time);
}
bemLoad.prototype.close=function(){
	var self =this;
	clearInterval(self.time)
	$('#BemLoad').remove();
}
