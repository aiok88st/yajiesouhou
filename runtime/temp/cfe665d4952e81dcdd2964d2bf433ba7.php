<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:53:"F:\wamp\www\yajie/app/home\view\article\feedBack.html";i:1510226635;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
    <title>售后服务中心</title>
    <link rel="stylesheet" href="__HOME__/css/head.css" />
    <link rel="stylesheet" href="__HOME__/css/feedBack.css" />

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
					<p>意见反馈</p>
				</div>
				<div class="hright floatl">
					<a href="index.html"><img src="__HOME__/img/home.png"/></a>
					<div class="clearr"></div>
				</div>
				<div class="clearl"></div>
			</div>
			<div class="null"></div>
			<div class="problem">
				<div class="type">
					<p>请选择问题类型<span style="color: #f00;">*</span></p>
					<select name="catid" id="cat">
                        <?php echo $cate; ?>
					</select>
					<img src="__HOME__/img/right.png" />
				</div>
				<div class="message">
					<ul>
						<li>
							<p>姓名<span>*</span></p>
						</li>
						<li>
							<input type="text" id="username" placeholder="便于我们与您联系" />
						</li>
					</ul>
				</div>
				<div class="message">
					<ul>
						<li>
							<p>手机<span>*</span></p>
						</li>
						<li>
							<input type="text" id="phone" placeholder="便于我们与您联系" maxlength="11"/>
						</li>
					</ul>
				</div>
				<div class="message">
					<ul>
						<li>
							<p>问题描述<span>*</span></p>
						</li>
						<li>
							<textarea id="content" placeholder="请输入10字以上的问题以便我们提供更好的帮助"></textarea>
						</li>
					</ul>
				</div>
				<div class="imgUp">
					<div class="upBtn floatl upBtn0">
						<img src="__HOME__/img/add.png"/>
						<input type="file" id="file"/>
					</div>		
					<div class="clearl"></div>
				</div>
				<div class="submit">
					<a href="javascript:;" onclick="subt()">提交</a>
				</div>
			</div>
			<div class="bottomText">
				<p>ARCHIE 雅洁五金</p>
				<p>www.archie.com</p>
			</div>
		</div>
		<div id="clipArea" style="display: none;">
			<button id="clipBtn">截取</button>
		</div>
		<div id="showAll" style="display: none;">
			<img src="" />
		</div>
		<script type="text/javascript" src="__HOME__/js/public.js" ></script>
		<script type="text/javascript" src="__HOME__/js/feedBack.js" ></script>
		<script type="text/javascript" src="__HOME__/js/photoClip/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="__HOME__/js/photoClip/iscroll-zoom.js"></script>
		<script type="text/javascript" src="__HOME__/js/photoClip/hammer.js"></script>
		<script type="text/javascript" src="__HOME__/js/photoClip/jquery.photoClip.min.js"></script>
        <script type="text/javascript" src="__HOME__/load/js/imgLoad.js" ></script>
		<script>
		var imgN = 0;
		//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		$("#clipArea").photoClip({
			width: 200,
			height: 200,
			file: "#file",
			view: ".view",
			ok: "#clipBtn",
			loadStart: function() {
				$('#clipArea').show();
				//开启加载页面
                $(function(){
                    load = new bemLoad(200,0.75);
                });
			},
			loadComplete: function() {
				console.log("照片读取完成");
				//关闭加载页面
                load.close();
			},
			clipFinish: function(dataURL) {
				imgN++;
				$('#clipArea').hide();
				if(imgN==4)
				{
					$('.upBtn0').hide();
				}
				$('.upBtn0').before('<div class="upBtn allimg floatl"><img src="'+dataURL+'" /><a href="###"><img src="__HOME__/img/close.png"/></a><input type="hidden" name="images" value="'+dataURL+'"></div>');
				$('.upBtn').find('a').bind('click',function(){
					$(this).parent('.upBtn').remove();
					imgN--;
					if(imgN<4){
						$('.upBtn0').show();
					}
				});
				$('.allimg').on('click',function(){
					$('#showAll').stop().fadeIn(500);
					$('#showAll').find('img').attr('src',$(this).children('img').attr('src'));
				});
			}	
		});
		$('#showAll').bind('click',function(){
			$(this).stop().fadeOut(500);
		})
        layui.use('layer', function(){
            var layer = layui.layer;
        });
            function subt(){
                var catid = $('#cat').val();
                var username = $('#username').val();
                var phone = $('#phone').val();
                var content = $('#content').val();
                var img = [];
                $('[name="images"]').each(function(){
                    if($(this).val() != ''){
                        var imge = $(this).val();
                        img.push(imge.substr(22));
                    }
                });
                $.ajax({
                    url:'<?php echo url("article/add"); ?>',
                    type:'post',
                    data:{"catid":catid,"username":username,"phone":phone,"content":content,"img":img},
                    success:function(re){
                        if(re.code == 1){
                            layer.msg(re.msg);
                            location.reload();
                        }else{
                            layer.msg(re.msg);
                        }
                    }
                });
            }
		</script>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>


