<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:53:"D:\wamp\wamp64\www\yajie/app/home\view\exam\exam.html";i:1510838277;s:57:"D:\wamp\wamp64\www\yajie/app/home\view\common\header.html";i:1510391119;s:57:"D:\wamp\wamp64\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" href="__HOME__/css/public.css?v=1" />
    <link rel="stylesheet" href="__HOME__/css/webShopList.css" />
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__HOME__/js/rem.js" ></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <script type="text/javascript">
        AjaxL=function(url,type,data,call){
            $.ajax({
                type:type,
                url:url,
                data:data,
                dataType:'JSON',
                success:function(res){
                    call(res);

                    if(res.url){
                        window.location.href=res.url;
                    }
                },
                error:function(XMLHttpRequest){
                    console.log(1111);
                }
            })
        }
    </script>
    <style>
        .layui-flow-more{
            padding-bottom: 10px;
        }
        .layui-flow-more a cite{
            color: #999999;
        }
    </style>
    
<title>我的测试</title>
<link rel="stylesheet" href="__HOME__/css/exam.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

		<div id="exam">
			<div class="pHead">
				<a href="person.html" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>开始测试</p>
			</div>
			<div class="problemBox">
				<div class="pTitle">
					<ul>
						<li>
							<p id="tile"><?php echo $test['title']; ?></p>
						</li>
						<li>
							<p id="f_tile"><?php echo $test['f_title']; ?></p>
						</li>
					</ul>					
				</div>
				<div class="problems">

                    <?php if(is_array($test['content']) || $test['content'] instanceof \think\Collection || $test['content'] instanceof \think\Paginator): $k = 0; $__LIST__ = $test['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
					<div class="problem dan movie_box" >
						<ul class="wjdc_list">
							<input type='hidden' class='scot' value='<?php echo $vo['score']; ?>'>
							<li>
								<p class="tm_btitlt">
									<?php echo $k; ?>.<i class="btwenzi"><?php echo $vo['title']; ?></i>
									<?php if($vo['type'] == 1): ?>
		                            <span class="tip_wz">【单选】</span><span>（<?php echo $vo['score']; ?>分）</span>
		                            <?php elseif($vo['type'] == 2): ?>
		                            <span class="tip_wz">【多选】</span><span>（<?php echo $vo['score']; ?>分）</span>
		                            <?php elseif($vo['type'] == 3): ?>
		                            <span class="tip_wz">【判断】</span><span>（<?php echo $vo['score']; ?>分）</span>
		                            <?php else: ?>
		                            <span class="tip_wz">【问答】</span><span>（<?php echo $vo['score']; ?>分）</span>
		                            <?php endif; ?>
								</p>
							</li>
							<div class="choice"> 
								<ul class="chput">
									<?php if(is_array($vo['input']) || $vo['input'] instanceof \think\Collection || $vo['input'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['input'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
									<li class="input">
										
										<?php if($vo['type'] == 1): ?>
										<label class="radio">
			                            <input name="a<?php echo $k; ?>0" type="radio" value="<?php echo $vv['val']; ?>" />
			                            <i></i>
			                            <?php elseif($vo['type'] == 2): ?>
			                            <label class="checkBox">
			                            <input name="a<?php echo $k; ?>0" type="checkbox" value="<?php echo $vv['val']; ?>" />
			                            <i></i>
			                            <?php elseif($vo['type'] == 3): ?>
			                            <label class="radio">
			                            <input name="a<?php echo $k; ?>0" type="radio" value="<?php echo $vv['val']; ?>" />
			                            <i></i>
			                            <?php else: ?>
			                            <label class="radio">
			                            <input name="a<?php echo $k; ?>0" type="radio" value="<?php echo $vv['val']; ?>">
			                            <i></i>
			                            <?php endif; ?>
					
										<span><?php echo $vv['val']; ?></span>
										</label>  
									</li>
									<?php endforeach; endif; else: echo "" ;endif; ?>
							
								</ul>	
							</div>  
						</ul>							
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>

				
				</div>		
			</div>
			<div class="st">
			<input TYPE="hidden" name="id" id="tsetid" value="<?php echo $test['id']; ?>">
				<button onclick="addj()">提交</button>
			</div>
		</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/public.js?v=1" ></script>
<script type="text/javascript">
	layui.use('layer', function(){
        var layer = layui.layer;
    });
    function addj(){
    	var titles = $('#tile').text();
        var f_title = $('#f_tile').text();
        var id = $('#tsetid').val();
        var content = getTest();
        popw("温馨提示","确认要提交吗？",2,function(){
        	layer.load(1);
            $.ajax({
                url:"<?php echo url('Exam/add'); ?>",
                type:"post",
                data:{"id":id,"title":titles,"content":content,"f_title":f_title},
                success:function(res){
                    layer.closeAll();
                    if (res.code > 0) {
                        layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                            location.href = res.url;
                        });
                    } else {
                        layer.msg(res.msg, {time: 1800, icon: 2});
                    }
                }
            });
        });
    }
</script>
