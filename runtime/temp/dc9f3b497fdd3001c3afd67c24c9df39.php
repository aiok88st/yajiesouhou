<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"F:\wamp\www\yajie/app/home\view\exam\result.html";i:1510892311;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>测试结果</title>
<link rel="stylesheet" href="__HOME__/css/exam.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

		<div id="exam">
			<div class="pHead">
				<a href="<?php echo url('user/index'); ?>" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>我的测试</p>
			</div>
			<div class="problemOut">
				<div class="problemBox">
					<div class="score">
						<p><span><?php echo $test['score']; ?></span>分</p>
					</div>
					<div class="pTitle">
						<ul>
							<li>
								<p><?php echo $test['title']; ?></p>
							</li>
							<li>
								<p><?php echo $test['f_title']; ?></p>
							</li>
						</ul>					
					</div>
					<div class="problems">

                        <?php if(is_array($test['content']) || $test['content'] instanceof \think\Collection || $test['content'] instanceof \think\Paginator): $k = 0; $__LIST__ = $test['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <div class="problem dan movie_box" >
                            <ul class="wjdc_list">
                                <input type='hidden' class='scot' value='<?php echo $vo['score']; ?>'>
                                <li>
                                    <div class="pt">
                                        <p class='tm_btitlt rt <?php if($vo['answers'] == false): ?>errorS<?php endif; ?>'  />
                                            <?php echo $k; ?>.<span class="btwenzi"><?php echo $vo['title']; ?></span>
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
                                        <?php if($vo['answers'] == false): ?><img src="__HOME__/img/error.png"><?php endif; ?>
                                    </div>
                                </li>
                                <div class="choice">
                                    <ul class="chput">
                                        <?php if(is_array($vo['input']) || $vo['input'] instanceof \think\Collection || $vo['input'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['input'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                        <li class="input">
                                            <?php if($vo['type'] == 1): ?>
                                            <label class='radio <?php if($vo['answers'] == false): ?>errorS<?php endif; ?>' >
                                                <input name="a<?php echo $k; ?>0" type="radio" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>" />
                                                <i></i>
                                            <?php elseif($vo['type'] == 2): ?>
                                                <label class='checkBox <?php if($vo['answers'] == false): ?>errorS<?php endif; ?>' >
                                                    <input name="a<?php echo $k; ?>0" type="checkbox" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>" />
                                                    <i></i>
                                            <?php elseif($vo['type'] == 3): ?>
                                                <label class='radio <?php if($vo['answers'] == false): ?>errorS<?php endif; ?>' >
                                                    <input name="a<?php echo $k; ?>0" type="radio" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>" />
                                                    <i></i>
                                            <?php else: ?>
                                                <label class='radio <?php if($vo['answers'] == false): ?>errorS<?php endif; ?>' >
                                                     <input name="a<?php echo $k; ?>0" type="radio" <?php if($vv['answer'] == 1): ?>checked="checked"<?php endif; ?> value="<?php echo $vv['val']; ?>">
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
			</div>
		</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>


