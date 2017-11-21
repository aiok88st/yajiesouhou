<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"F:\wamp\www\yajie/app/home\view\article\index.html";i:1511179151;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1511147190;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>首页</title>
<link rel="stylesheet" href="__HOME__/css/head.css" />
<link rel="stylesheet" href="__HOME__/css/publicSI.css" />
<link rel="stylesheet" href="__HOME__/css/index.css" />
<link rel="stylesheet" href="__HOME__/css/search.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

		<!--导航栏-->
		<div id = "home">
			<div id="head">
				<div class="hleft floatl" style="visibility: hidden;">
					<a href="###"></a>
				</div>
				<div class="hmiddle floatl">
					<img src="__HOME__/img/logo.png" />
				</div>
				<div class="hright floatl" style="visibility: hidden;">
					<a href="###"><img src="__HOME__/img/home.png"/></a>
					<div class="clearr"></div>
				</div>
				<div class="clearl"></div>
			</div>
			<div class="null"></div>
			<div class="search">
				<form action="<?php echo url('article/search'); ?>" method="get">
					<div class="sLeft floatl">
						<div class="sImg">
							<img src="__HOME__/img/searchBkg.png" />
						</div>
						<input type="search" name="key" id="key" placeholder="防盗开锁" value="" />
					</div>
					<div class="sRight floatr">
						<button>搜索</button>
					</div>
				</form>
				<div class="clearBoth"></div>
			</div>
			<div class="hotQuestion">
				<div class="qusetionBox">
					<div class="qTitle">
						<p>热门问题</p>
					</div>
					<div class="qList" id="searchResult">

                        <template v-for="(key,item) in searchResult">
						<a href="<?php echo url('article/detail'); ?>?id={{item.id}}" class="questionDetails">
							<div class="qdl floatl centerCenter">
								<img src="__PUBLIC__/{{item.thumb}}" />
							</div>
							<div class="qdr floatl">
								<ul>
									<li>
										<p>{{item.title}}</p>
									</li>
									<li>
										<p>{{item.f_title}}</p>
									</li>
									<li>
										<p>{{item.createtime}}</p>
									</li>
								</ul>
							</div>
							<div class="clearl"></div>
						</a>
                        </template>

					</div>
				</div>
			</div>
			<div class="bottomText">
				<p>ARCHIE 雅洁五金</p>
				<p>www.archie.com</p>
			</div>
		</div>
		<div class="bNull">
			
		</div>
		<div id="bottomNav">
			<ul>
				<li>
					<a href="<?php echo url('article/problemFirst'); ?>" class="centerCenter">
						<img src="__HOME__/img/all.png" />
						<p>全部问题</p>
					</a>
				</li>
				<li>
					<a href="<?php echo url('article/feedBack'); ?>" class="centerCenter">
						<img src="__HOME__/img/suggest.png" />
						<p>意见反馈</p>
					</a>
				</li>
				<li>
					<a href="tel:<?php echo $system['tel']; ?>" class="centerCenter">
						<img src="__HOME__/img/phoneIndex.png" />
						<p>联系我们</p>
					</a>
				</li>
				
			</ul>
			<div class="clearl"></div>
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
                    elem: '#searchResult'
                    ,done: function(page, next){
                        var lis = [];
                        AjaxL('<?php echo url("article/index"); ?>','GET',{"page":page},function(res){
                            list=res.list;
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

</script>

