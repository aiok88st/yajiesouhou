<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"F:\wamp\www\yajie/app/client\view\product\index.html";i:1512118055;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>我的产品</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="__HOME__/css/public.css"/>
    <link rel="stylesheet" href="__HOME__/css/rProduce.css" />
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__HOME__/js/rem.js" ></script>
    <script src="https://cdn.bootcss.com/touchjs/0.2.14/touch.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <!--<script type="text/javascript" src="__HOME__/js/public.js?v=1" ></script>-->
    <style>
        .floatl{
            margin-left: 5px;
        }
        #produce .repairOne a{
            width: 1.9rem;
        }
        .layui-flow-more a cite{
            color: #999999;
            background-color: #f4f4f4 !important;
        }
        .back_home{
            position: absolute;
            right: 0%;
            top: 0;
            height: 0.32rem;
            margin-left: 85%;
        }
    </style>
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
                }
            })
        }
    </script>
</head>
<body id="vueMain">
<div class="detl"></div>
<div id="produce">
    <div class="pHead">
        <a href="<?php echo url('client/index'); ?>" class="bp"><img src="__HOME__/img/back.png"/></a>
        <p>我的产品</p>
        <a class="back_home" href="<?php echo url('client/index'); ?>"><img src="__HOME__/img/home.png"/></a>
    </div>

    <template v-if='searchResult.length>0'>
        <div class="produces">

            <template v-for="(key,item) in searchResult">
                <div class="myProduce">
                    <div class="produceBox">
                        <div class="floatl">
                            <template v-if='item.model.img'>
                                <img src="__PUBLIC__/{{item.model.img}}" />
                            </template>
                            <template v-else>
                                <img src="__HOME__/img/thing.jpg" />
                            </template>
                        </div>
                        <div class="floatl">
                            <p>{{item.model.name}} {{item.model_vip_code}}</p>
                            <p>{{item.sale_oulets}}</p>
                            <p>保修至：{{item.repair_date}}</p>
                        </div>
                        <div class="delete centerCenter" onclick="del('{{item.id}}')">
                            <p>删</p>
                            <p>除</p>
                        </div>
                        <div class="clearl"></div>
                        <div class="pTouch"></div>
                    </div>
                    <div class="repairOne">
                        <template v-if='item.status == 0'>
                            <a href="<?php echo url('product/repair'); ?>?id={{item.id}}">一键维修</a>
                        </template>
                        <template v-if='item.status == 1'>
                            <a href="javascript:;">已申请维修</a>
                        </template>
                        <template v-if='item.status == -1'>
                            <a href="javascript:;">不在维修范围内</a>
                        </template>
                    </div>
                </div>
            </template>
            <div class="myOrder bottomChoice">
                <div class="moreOrder">
                    <p>&nbsp;</p>
                    <a href="javascript:;" class="addNew" onclick="adds()">添加产品</a>
                </div>
            </div>
        </div>
    </template>
    <template v-else>
        <div class="noResult">
            <ul>
                <li>
                    <img src="__HOME__/img/noProduce.png" />
                </li>
                <li>
                    <p>您还没有相关产品</p>
                </li>
                <li>
                    <a href="###" class="add">添加产品</a>
                </li>
            </ul>
        </div>
    </template>
    <div class="addProduce" style="display: none;">
        <ul>
            <li>
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <input type="search" id="code" placeholder="请输入产品ID"/>
                <p>产品ID</p>
            </li>
            <li>
                <button class="addId" onclick="addProduct()">添加</button>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<script type="text/javascript" src="__HOME__/js/rProduce.js" ></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.detl').remove();
</script>
</body>
</html>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
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
                    elem: '#produce'
                    ,done: function(page, next){
                        var lis = [];
                        AjaxL('<?php echo url("product/index"); ?>','GET',{"page":page},function(res){
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

    function del(id){
        var token=$('[name="token"]').val();
        popw("温馨提示","确认要删除吗？",2,function(){
            $.ajax({
                url:"<?php echo url('product/del'); ?>",
                type:"post",
                data:{
                    "__token__":token,
                    "id":id
                },
                success:function(res){
                    if(res.code == 1){
                        layer.msg(res.msg,{time:1000});
                        location.reload();
                    }else{
                        layer.msg(res.msg,{time:1000});
                    }
                }
            });
        });
    }
    function adds(){
        $('.produces').hide();
        $('.addProduce').show();
    }

    function addProduct(){
        var url="<?php echo url('Product/add'); ?>";
        var token=$('[name="token"]').val();
        var code=$('#code').val();
        $.ajax({
            type:'POST',
            url:url,
            data:{
                "__token__":token,
                "code":code
            },
            dataType:'JSON',
            success:function(res){
                $('[name="token"]').attr('value',res.token);
                layer.msg(res.msg);
                if(res.code==1){
                    $('.produces').show();
                    $('.addProduce').hide();
                }
            },
            error:function(xml,XMLHttpRequest, textStatus, errorThrown){
                alert('网络链接错误');
                if(xml.status==501){
                    get_token();
                }

            }
        })
    }
    function get_token(){
        var url="<?php echo url('faters/get_token'); ?>";
        $.ajax({
            type:'GET',
            url:url,
            dataType:'JSON',
            success:function(res){
                $('[name="token"]').attr('value',res.token);
            },
            error:function(xml,XMLHttpRequest, textStatus, errorThrown){
                alert('网络链接错误');

            }
        })
    }

</script>
</body>
</html>
