<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\wamp\wamp64\www\yajie/app/home\view\collect\collect.html";i:1510829444;s:57:"D:\wamp\wamp64\www\yajie/app/home\view\common\header.html";i:1510391119;s:57:"D:\wamp\wamp64\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
<link rel="stylesheet" href="__HOME__/css/publicSI.css" />
<link rel="stylesheet" href="__HOME__/css/collect.css" />

</head>
<body id="vueMain">
<div class="delete"></div>


		<div id="home">
			<div class="pHead">
				<a href="person.html" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>我的收藏</p>
			</div>
			<div class="video">
                <?php if(is_array($catids) || $catids instanceof \think\Collection || $catids instanceof \think\Paginator): $k = 0; $__LIST__ = $catids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
				<button href="###" v-on:click="changeCatid('<?php echo $vo['id']; ?>')" <?php if($k == 1): ?>class="tActive" disabled="disabled"<?php endif; ?>><?php echo $vo['catname']; ?></button>
                <?php endforeach; endif; else: echo "" ;endif; ?>
				<span></span>
				<div class="clearl"></div>
			</div>

            <template v-if='searchResult.length>0'>

			<div class="hotQuestion">
				<div class="qusetionBox">
					<div class="qList">
                        <template v-for="(key,item) in searchResult">
						<a href="###" class="questionDetails">
							<div class="qdl floatl centerCenter">
                                <img src="__PUBLIC__{{item.thumb}}" />
							</div>
							<div class="qdr floatl">
								<ul>
									<li>
										<p>{{item.title}}</p>
									</li>
									<li>
										<p>{{item.date_num}}</p>
										<p>时间：{{item.createtime}}</p>
									</li>
								</ul>
							</div>
							<div class="clearl"></div>
						</a>
                        </template>

					</div>
				</div>
			</div>
            </template>
            <template v-else>
			<!--没有搜索结果-->
			<div class="noResult" >
				<ul>
					<li>
						<img src="__HOME__/img/noVideo.png" />
					</li>
					<li>
						<p style="margin-bottom: 0;">您没有收藏的视频</p>
					</li>
					<li>
						<a href="###" >查看视频</a>
					</li>
				</ul>			
			</div>
            </template>
		</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/collect.js" ></script>
<script type="text/javascript">
    var data={
        searchResult:[],
    };

    var all = new Vue({
        el:'#vueMain',
        data:data,
        created:function(){
            var $this=this;
            $this.searchResult=[];
            layui.use('flow', function(){
                var flow = layui.flow;
                flow.load({
                    elem: '#home'
                    ,done: function(page, next){
                        var lis = [];
                        $this.AjaxL('<?php echo url("Collect/index"); ?>','GET',{"page":page,"catid":27},function(res){
                            list=res.list;
                            if(list.length<=0){
                                $('.layui-flow-more').hide();
                                $('.noResult').show();
                            }else{
                                $('.layui-flow-more').show();
                                $('.noResult').hide();
                            }
                            for (x in list){
                                $this.searchResult.push(list[x]);
                            }
                            next('', page <= res.last_page);
                        });
                    }
                });
            });
        },
        methods: {
            AjaxL: function (url, type, data, call) {
                var $this = this;
                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    dataType: 'JSON',
                    success: function (res) {
                        call(res);
                        if (res.url) {
                            window.location.href = res.url;
                        }
                    },
                    error: function (XMLHttpRequest) {
                        console.log(1111);
                    }
                })
            },
            changeCatid:function(catid){
                var $this=this;
                $this.searchResult=[];
                layui.use('flow', function(){
                    var flow = layui.flow;
                    flow.load({
                        elem: '#home'
                        ,done: function(page, next){
                            var lis = [];
                            $this.AjaxL('<?php echo url("Collect/index"); ?>','GET',{"page":page,"catid":catid},function(res){
                                list=res.list;
                                if(list.length<=0){
                                    $('.layui-flow-more').hide();
                                    $('.noResult').show();
                                }else{
                                    $('.layui-flow-more').show();
                                    $('.noResult').hide();
                                }
                                for (x in list){
                                    $this.searchResult.push(list[x]);
                                }
                                next('', page <= res.last_page);
                            });
                        }
                    });
                });
            }
        }
    });
</script>
