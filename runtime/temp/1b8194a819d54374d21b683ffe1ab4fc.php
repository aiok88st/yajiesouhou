<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"F:\wamp\www\yajie/app/home\view\teach\teachSearch.html";i:1510910758;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>培训视频</title>
<link rel="stylesheet" href="__HOME__/css/head.css" />
<link rel="stylesheet" href="__HOME__/css/publicSI.css" />
<link rel="stylesheet" href="__HOME__/css/help.css" />
<style>
    .videoIn {
        margin-bottom: 0rem;
        margin-top: 0.2rem;
    }
    .videoIn .bottomTitle p:nth-child(1){
        color: #641d90;
        width: 50%;
    }
    .videoIn .bottomTitle p:nth-child(3){
        position: absolute;
        top: 0;
        right: 25%;
        background: url(__HOME__/img/time.png) no-repeat left center;
        background-size: auto 0.24rem;
        text-indent: 0.34rem;
        padding: 0;
    }
    .videoIn .bottomTitle p:nth-child(2){
        background-image: url(__HOME__/img/eyes.png);
        background-size: auto 0.23rem;
    }
    /*一级*/
    .clist{
        width: 100%;
        height: 0.8rem;
        background-color: white;
        overflow: hidden;
        border-top: 1px solid #e5e5e5;
    }
    .clist ul li{
        float: left;
        font-size: 0.28rem;
        line-height: 0.8rem;
        text-align: center;
        position: relative;
    }
    .clist ul li span{
        position: absolute;
        background-color: #6e0a95;
        width: 0.56rem;
        height: 3px;
        bottom:0 ;
        left: 50%;
        margin-left: -0.28rem;
        display: none;
    }
    .clist ul .at{
        color: #6e0a95;
    }
    .clist ul .at span{
        display: block;
    }
    .clistIn{
        overflow-x: scroll;
    }
</style>
<script>
    $(function(){
        $('.clistIn ul li').on('click',function(){
            $(this).addClass('at');
            $(this).siblings('li').removeClass('at');
        });
    });
    $(function(){
        //一级标题数目
        var clist = <?php echo $count_num; ?>;
        switch(clist){
            case 1:
                $(".clist ul li").width($(window).width());
                break;
            case 2:
                $(".clist ul li").width($(window).width()/2);
                break;
            default:
                $(".clistIn ul").width($(window).width()/3*clist);
                $(".clist ul li").width($(window).width()/3);
                break;
        }
    });
</script>

</head>
<body id="vueMain">
<div class="delete"></div>


		<!--导航栏-->
		<div id = "home">
			<div class="pHead">
				<a href="<?php echo url('user/index'); ?>" class="back backP"><img src="__HOME__/img/back.png"/></a>
				<p>培训视频</p>
			</div>
			<div class="search">
				<a href="<?php echo url('teach/teachHistory'); ?>">输入关键词</a>
			</div>
			<div class="clist">
				<div class="clistIn">
					<ul>
                        <?php if(is_array($catids) || $catids instanceof \think\Collection || $catids instanceof \think\Paginator): $k = 0; $__LIST__ = $catids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;
                        $data = explode('-',$vo);
                         ?>
                        <li v-on:click="changeCatid('<?php echo $data[1]; ?>')" <?php if($k == 1): ?>class="at" <?php endif; ?> ><?php echo $data[0]; ?><span></span></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>	
					<div class="clearl"></div>
				</div>
			</div>
            <template v-if='searchResult.length>0'>
			<div class="videoOut">
                <template v-for="(key,item) in searchResult">
				<div class="videoIn" onclick="getDetail('{{item.id}}')">
					<div class="videoShow">
						<img src="__PUBLIC__{{item.images}}" />
							<div class="videoBox">
								<a href='###'><img src="__HOME__/img/play.png"/></a>
						</div>
					</div>
					<div class="topTitle">
						<p>{{item.title}}</p>
					</div>
					<div class="bottomTitle">
						<p>{{item.f_title}}</p>
						<p>{{item.hits}}</p>
						<p>{{item.createtime}}</p>
					</div>
				</div>
                </template>
			</div>
            </template>
            <template v-else>
			<div class="noResult">
				<ul>
					<li>
						<img src="__HOME__/img/noResult.png" />
					</li>
					<li>
						<p style="margin-bottom: 0;">没有找到相关结果，换个词试试吧</p>
					</li>
				</ul>
			</div>
            </template>
			<!--<div class="bottomText">-->
				<!--<p>ARCHIE 雅洁五金</p>-->
				<!--<p>www.archie.com</p>-->
			<!--</div>-->
		</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/teacherSearch.js" ></script>
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
                        $this.AjaxL('<?php echo url("Teach/index"); ?>','GET',{"page":page,"catid":27},function(res){
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
                            $this.AjaxL('<?php echo url("Teach/index"); ?>','GET',{"page":page,"catid":catid},function(res){
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
    function getDetail(id){
        window.location.href="<?php echo url('Teach/details'); ?>?id="+id;
    }
</script>
