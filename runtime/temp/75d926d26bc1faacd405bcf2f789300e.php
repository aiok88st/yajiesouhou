<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"F:\wamp\www\yajie/app/home\view\video\help.html";i:1510914164;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
<link rel="stylesheet" href="__HOME__/css/problemFirst.css" />
<link rel="stylesheet" href="__HOME__/css/help.css" />

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
					<p>自助维修教程</p>
				</div>
				<div class="hright floatl">
					<a href="index.html"><img src="__HOME__/img/home.png"/></a>
					<div class="clearr"></div>
				</div>
				<div class="clearl"></div>
			</div>
			<div class="null"></div>
			<div class="search">
				<a href="<?php echo url('Video/helpHistory'); ?>">输入产品型号</a>
			</div>
			<div class="videoContent">
				<div class="vType">
					<div class="vTypeIn">
						<ul>
                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $k = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
							<li>
								<a onclick="change('<?php echo $vo['id']; ?>')" href="javascript:;" <?php if($catid == $vo['id']): ?>class="aActive"<?php endif; ?>><?php echo $vo['catname']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<span></span>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="hotVideo">
					<img src="__HOME__/img/up.png" />
					<a href="###" isOpen='true'>热门教程</a>
					<div class="classifyBox">
						<ul id="childen">
                            <?php if(is_array($childen) || $childen instanceof \think\Collection || $childen instanceof \think\Paginator): $i = 0; $__LIST__ = $childen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
							<li class="classify">
								<a isOpen='true' href="<?php echo url('video/search'); ?>?catid=<?php echo $vv['id']; ?>"><?php echo $vv['catname']; ?></a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>	
				</div>
                <?php if(empty($video) || (($video instanceof \think\Collection || $video instanceof \think\Paginator ) && $video->isEmpty())): ?>
                <div class="noResult" style="">
                    <ul>
                        <li>
                            <img src="__HOME__/img/noResult.png" />
                        </li>
                        <li>
                            <p style="margin-bottom: 0;">该分类下暂无热门视频</p>
                        </li>
                    </ul>
                </div>
                <?php else: ?>
				<div class="videoOut" id="proListRow">
                    <?php if(is_array($video) || $video instanceof \think\Collection || $video instanceof \think\Paginator): $i = 0; $__LIST__ = $video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?>
					<div class="videoIn" onclick="getDetail('<?php echo $vc['id']; ?>')">
						<div class="videoShow" style="height: 3.56rem;overflow: hidden;">
							<img src="__PUBLIC__<?php echo $vc['thumb']; ?>" style="position:relative"/>
							<div class="videoBox">
								<a href='###'><img src="__HOME__/img/play.png"/></a>
							</div>
						</div>
						<div class="topTitle">
							<p><?php echo $vc['title']; ?></p>
						</div>
						<div class="bottomTitle">
							<p><?php echo $vc['f_title']; ?></p>
							<p><?php echo $vc['hits']; ?></p>
						</div>
					</div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

				</div>
				<?php endif; ?>
			</div>
			<div class="bottomText">
				<p>ARCHIE 雅洁五金</p>
				<p>www.archie.com</p>
			</div>
		</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript">
    function change(id){
        $.ajax({
            url:"<?php echo url('Video/cats'); ?>?catid="+id,
            type:"GET",
            dataType:"json",
            success:function(re){
                console.log(re);
                var ch = "";
                var html="";
                var list=re.video;
                var childens = re.childen;
                if(childens.length>=1){
                    for(item in childens){
                        ch +='<li class="classify">';
                        ch +='<a isOpen="true" href="<?php echo url("video/search"); ?>?catid='+childens[item].id+'">'+childens[item].catname+'</a>';
                        ch +='</li>';
                    }
                }
                $('#childen').html(ch);
                if(list.length>=1){
                    for(item in list){
                        html +='<div class="videoIn" onclick="getDetail('+list[item].id+')">';
                        html +='<div class="videoShow" style="height: 3.56rem;overflow: hidden;">';
                        html +='<img src="__PUBLIC__'+list[item].thumb+'" style="position:relative"/>';
                        html +='<div class="videoBox">';
                        html +='<a href="###"><img src="__HOME__/img/play.png"/></a>';
                        html +='</div> </div>';
                        html +='<div class="topTitle">';
                        html +='<p>'+list[item].title+'</p>';
                        html +='</div>';
                        html +='<div class="bottomTitle">';
                        html +='<p>'+list[item].f_title+'</p>';
                        html +='<p>'+list[item].hits+'</p>';
                        html +='</div></div>';
                    }
                }else{
                    html +='<div class="noResult" style=""><ul>';
                    html +='<li><img src="__HOME__/img/noResult.png" /></li>';
                    html +='<li><p style="margin-bottom: 0;">该分类下暂无热门视频</p></li>';
                    html +='</ul></div>';
                }
                $('#proListRow').html(html);
            }
        });
    }
	function getDetail(id){
		window.location.href="<?php echo url('Video/details'); ?>?id="+id;
	}
</script>
<script type="text/javascript" src="__HOME__/js/help.js" ></script>

