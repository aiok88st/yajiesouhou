<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"F:\wamp\www\yajie/app/home\view\video\helpHistory.html";i:1510377286;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>视频中心</title>
<link rel="stylesheet" href="__HOME__/css/head.css" />
<link rel="stylesheet" href="__HOME__/css/publicSI.css" />
<link rel="stylesheet" href="__HOME__/css/search.css" />
<link rel="stylesheet" href="__HOME__/css/help.css" />
<link rel="stylesheet" href="__HOME__/css/helpHistory.css" />

</head>
<body id="vueMain">
<div class="delete"></div>


		<!--导航栏-->
		<div id = "home">
			<div id="head">
				<div class="hleft floatl">
					<a class="back" href="###"></a>
				</div>
				<div class="hmiddle floatl">
					<img src="__HOME__/img/logo.png" />
				</div>
				<div class="hright floatl">
					<a href="index.html"><img src="__HOME__/img/home.png"/></a>
					<div class="clearr"></div>
				</div>
				<div class="clearl"></div>
			</div>
			<div class="null"></div>

			<div class="search">
                <form action="<?php echo url('video/search'); ?>" method="get">
                    <div class="sLeft floatl">
                        <div class="sImg">
                            <img src="__HOME__/img/searchBkg.png" />
                        </div>
                        <input id="search" name="key" type="search" placeholder="输入产品型号" />
                    </div>
                    <div class="sRight floatr">
                        <button id="submit">搜索</button>
                    </div>
                </form>
				<div class="clearBoth"></div>
			</div>

			<div class="history">
                <?php if(!(empty($history) || (($history instanceof \think\Collection || $history instanceof \think\Paginator ) && $history->isEmpty()))): ?>
                <div class="historyBox">
                    <div class="historySearch">
                        <p>历史搜索</p>
                    </div>
                    <div class="historyContent">
                        <ul>
                            <?php if(is_array($history) || $history instanceof \think\Collection || $history instanceof \think\Paginator): $i = 0; $__LIST__ = $history;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <p href="###"><?php echo $vo; ?></p>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="clearHistory">
                        <button onclick="removeHistory()">清空历史搜索</button>
                    </div>
                </div>
                <?php endif; ?>

				</div>
			<!--<div class="bottomText">
				<p>ARCHIE 雅洁五金</p>
				<p>www.archie.com</p>
			</div>-->
		</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript">
    function removeHistory(){
        window.location.href="<?php echo url('Video/clear'); ?>";
    }
</script>
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/helpHistory.js" ></script>

