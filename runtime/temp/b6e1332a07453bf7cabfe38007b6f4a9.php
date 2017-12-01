<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"F:\wamp\www\yajie/app/home\view\order\index.html";i:1512120845;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1512116852;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
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
            background-color: #f4f4f4 !important;
        }
    </style>
    
<title>我的服务单</title>
<link rel="stylesheet" href="__HOME__/css/indexOrOrder.css" />
<link rel="stylesheet" href="__HOME__/css/order.css" />
<link rel="stylesheet" href="__HOME__/css/rOrder.css" />
<style>
    .back_home{
        position: absolute;
        right: 0%;
        top: 0;
        height: 0.32rem;
        margin-left: 85%;
    }
    .customer .customerBox {
        width:93.33% !important;
        padding: 0 3.335%;
        margin-top: 0.2rem;
        background-color: white;
    }
</style>

</head>
<body id="vueMain">
<div class="delete"></div>

<div id="order">
    <div class="pHead">
        <a href="rPerson.html" class="back backP"><img src="__HOME__/img/back.png"/></a>
        <p>我的服务单</p>
        <a class="back_home" href="<?php echo url('User/index'); ?>"><img src="__HOME__/img/home.png"/></a>
    </div>
    <div class="choice">
        <ul>
            <?php if(is_array($status_name) || $status_name instanceof \think\Collection || $status_name instanceof \think\Paginator): $k = 0; $__LIST__ = $status_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
            <li>
                <a href="javascript:;" v-on:click="changeCatid('<?php echo $vo['id']; ?>')" <?php if($status == $vo['id']): ?> class="aActive"<?php endif; ?> tid="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
        <div class="clearl"></div>
    </div>
    <template v-if='searchResult.length>0'>
        <div class="customer">
            <template v-for="(key,item) in searchResult">
                <div class="customerBox">
                    <ul>
                        <li>
                            <a href="###">服务单号：{{item.id}}</a>
                            <p>{{item.status.name}}</p>
                        </li>
                        <li onclick="toDetail('{{item.id}}')">
                            <div class="floatl">
                                <img src="__PUBLIC__{{item.pro_id.img}}" />
                            </div>
                            <div class="floatl" style="width: 73%;margin-left: 5px;">
                                <p>{{item.pro_id.title}} {{item.pro_id.name}}</p>
                                <p>销售网点：{{item.pro_id.sale_oulets}}</p>
                                <p>保修至：{{item.pro_id.repair_date}}</p>
                            </div>
                            <div class="clearl"></div>
                        </li>
                        <li>
                            <p>{{item.add_time}}</p>
                            <a href="<?php echo url('Order/detail'); ?>?id={{item.id}}">查看详情</a>
                        </li>
                    </ul>
                </div>
            </template>
        </div>
    </template>
    <template v-else>
        <!--没有搜索结果-->
        <div class="noResult" style="display: none;">
            <ul>
                <li>
                    <img src="__HOME__/img/noResult.png" />
                </li>
                <li>
                    <p style="margin-bottom: 0;">您还没有服务单！</p>
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

<script type="text/javascript" src="__HOME__/js/rOrder.js" ></script>
<script type="text/javascript">

    $(function(){
        //选择类型
        $('.choice ul li').on('click',function(){
            $(this).find('a').addClass('aActive');
            $(this).siblings('li').find('a').removeClass('aActive');
        });
        //设置没有相关结果
        setTimeout(function(){
            $('.noResult').height($(window).height()-$('.pHead').height()-$('.choice').height());
        },200);
    });

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
                    elem: '#order'
                    ,done: function(page, next){
                        var lis = [];
                        AjaxL('<?php echo url("order/index"); ?>','GET',{"page":page,"status":"<?php echo $status; ?>"},function(res){
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
            changeCatid:function(status){
                var $this=this;
                $this.searchResult=[];
                layui.use('flow', function(){
                    var flow = layui.flow;
                    flow.load({
                        elem: '#order'
                        ,done: function(page, next){
                            var lis = [];
                            AjaxL('<?php echo url("order/getList"); ?>','GET',{"page":page,"status":status},function(res){
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
        },

    });
    function toDetail(id){
        window.location.href="<?php echo url('Order/detail'); ?>?id="+id;
    }

</script>
