<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"F:\wamp\www\yajie/app/home\view\teach\details.html";i:1512098159;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1511237551;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
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

    <script type="text/javascript" src="__HOME__/js/public.js?v=1" ></script>

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
    
<title>培训视频</title>
<link rel="stylesheet" href="__HOME__/css/details.css" />
<script src="https://cdn.bootcss.com/clipboard.js/1.7.1/clipboard.min.js"></script>
<style>
    .back_home{
        position: absolute;
        right: 0%;
        top: 0;
        height: 0.32rem;
        margin-left: 85%;
    }
</style>

</head>
<body id="vueMain">
<div class="delete"></div>


		<!--导航栏-->
		<div id = "home">
			<div class="pHead">
				<a class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>视频详情</p>
				<a class="back_home" href="<?php echo url('User/index'); ?>"><img src="__HOME__/img/home.png"/></a>
			</div>
			<div class="main">
				<div class="videoBox">
					<ul>
						<li>
							<iframe frameborder="0" src="<?php echo $data['link']; ?>" allowfullscreen></iframe>
						</li>
						<li>
							<p><?php echo $data['title']; ?></p>
						</li>
						<li>
							<p><?php echo date("Y-m-d",$data['createtime']); ?></p>
							<p><?php echo $data['hits']; ?></p>
                            <input type="hidden" name="id" id="aid" value="<?php echo $data['id']; ?>">
							<a class="collect" href="###" <?php if($data['click'] == false): ?> collect='true'<?php else: ?> collect='false'<?php endif; ?>>
								<span>已收藏</span>
                                <?php if($data['click'] == false): ?>
								<img src="__HOME__/img/hasCollect.png">
                                <?php else: ?>
                                <img src="__HOME__/img/noCollect.png">
                                <?php endif; ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="content">
                    <?php echo $data['content']; ?>
				</div>
			</div>
			<div style="height: 0.8rem;"></div>
			<div class="twoChoice">
				<a href="###" class="download">下载本期培训文件</a>
				<a href="<?php echo url('Exam/test'); ?>?id=<?php echo $data['tid']; ?>">开始答题</a>
				<div class="clearl"></div>
			</div>
		</div>
		<div class="popWindow popWindow1" style="display: none;">
			<div class="popBox">
				<ul>
					<li>
						<p class="firstp">下载地址</p>
					</li>
					<li>
						<p class="secondp">百度云：<?php echo $data['weblink']; ?></p>
						<p>提取码：<?php echo $data['webnum']; ?></p>
					</li>
					<li>
						<div class="onlyOne" style="display: none;"><button class="confirm">确定</button></div>
						<div class="onlyTwo"><span></span>
							<div class="oLeft floatl"><button class="close">关闭</button></div>
							<div class="oRight floatr"><button class="copy" data-clipboard-text="<?php echo $data['weblink']; ?>">复制网址</button></div>
							<script>
								new Clipboard('.copy');
							</script>
							<div class="clearBoth"></div>
						</div>
					</li>
				</ul>
			</div>
		</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/details.js?v=1" ></script>

