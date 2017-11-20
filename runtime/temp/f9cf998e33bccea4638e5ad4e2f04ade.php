<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"F:\wamp\www\yajie/app/home\view\teach\teachHistory.html";i:1510908251;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>我的收藏</title>
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
			<div class="pHead">
				<a href="teachSearch.html" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>视频搜索</p>
			</div>
			<div class="search">
				<div class="sLeft floatl">
					<div class="sImg">
						<img src="__HOME__/img/searchBkg.png" />
					</div>
					<input id="search" type="search" placeholder="输入关键词" />
				</div>
				<div class="sRight floatr">
					<button id="submit">搜索</button>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="history">
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

<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/helpHistory.js" ></script>
<script>
    $(function(){
        $('#submit').on('click',function(){
            var key = $('#search').val();
            window.location.href ='<?php echo url("Teach/search"); ?>?key='+key;
        });
    });
    function removeHistory(){
        window.location.href="<?php echo url('Teach/clear'); ?>";
    }
</script>
