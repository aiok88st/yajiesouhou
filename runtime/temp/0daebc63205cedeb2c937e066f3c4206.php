<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"F:\wamp\www\yajie/app/home\view\exam\mytest.html";i:1510913790;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
<link rel="stylesheet" href="__HOME__/css/mytest.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

		<div id="order">
			<div class="pHead">
				<a href="<?php echo url('user/index'); ?>" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>我的测试</p>
			</div>

            <template v-if='searchResult.length>0'>
			<div class="testBox">
                <template v-for="(key,item) in searchResult">
				<div class="test" onclick="toResult('{{item.id}}')">
					<ul>
						<li>
							<p>{{item.title}}</p>
							<span>{{item.score}}</span>
							<span>分</span>
						</li>
						<li>
							<p>{{item.f_title}}</p>
							<p>时间：{{item.addtime}}</p>
						</li>
					</ul>
				</div>
                </template>
			</div>
            </template>
            <template v-else>
			<!--没有搜索结果-->
			<div class="noResult">
				<ul>
					<li>
						<img src="__HOME__/img/noResult.png" />
					</li>
					<li>
						<p style="margin-bottom: 0;">您没有完成测试的试题</p>
					</li>
					<li>
						<a href="<?php echo url('Teach/index'); ?>" >马上测试</a>
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

<script type="text/javascript">
    var data={
        searchResult:[]
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
                    elem: '#order'
                    ,done: function(page, next){
                        var lis = [];
                        AjaxL('<?php echo url("Exam/index"); ?>','GET',{"page":page},function(res){
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
    });
    function toResult(id){
        window.location.href="<?php echo url('Exam/detail'); ?>?id="+id;
    }
</script>
