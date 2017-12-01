<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"F:\wamp\www\yajie/app/home\view\order\detail.html";i:1512119060;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1512116852;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
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
    
<title>订单详情</title>
<link rel="stylesheet" href="__HOME__/css/indexOrOrder.css" />
<link rel="stylesheet" href="__HOME__/css/order.css" />
<link rel="stylesheet" href="__HOME__/css/rDetails.css" />
<script type="text/javascript" src="__HOME__/js/photoClip/jquery-2.1.1.min.js" type="text/javascript"></script>
<style>
    #orderDetails .addr ul li:nth-child(2) {
        width: 92%;
        margin: 0 auto;
        color: #666666;
        padding: 0.2rem 0;
        background-size: auto 0.5rem; }
    .back_home{
        position: absolute;
        right: 0%;
        top: 0;
        height: 0.32rem;
        margin-left: 85%;
    }
    .btu{
        display: block;
        width: 93.33%;
        margin: 0 auto;
        height: 0.8rem;
        font-size: 0.3rem;
        background-color: #6d1a7a;
        border-radius: 4px;
        color: white;
    }
    #loke{
        font-size: 0.24rem;
        margin-left: 1rem;
        background-color: #6d1a7a;

    }
    #loke a{
        color: white;
        padding-right: 5px;
    }
</style>

</head>
<body id="vueMain">
<div class="delete"></div>

<div id="orderDetails">
    <div class="pHead">
        <a class="backP" href="<?php echo url('order/index'); ?>"><img src="__HOME__/img/back.png"/></a>
        <p>订单详情</p>
        <a class="back_home" href="<?php echo url('User/index'); ?>"><img src="__HOME__/img/home.png"/></a>
    </div>
    <div class="rOrderBox">
        <div class="code">
            <ul>
                <li>
                    <p>订单编号：<?php echo $data['id']; ?></p>
                </li>
                <li>
                    <p>订单状态：<?php echo $data['status']['name']; ?></p>
                </li>
            </ul>
        </div>
        <div class="myProduce">
            <div class="produceBox">
                <div class="floatl">
                    <img src="__PUBLIC__<?php echo $data['pro_id']['img']; ?>" />
                </div>
                <div class="floatl" style="margin-left: 5px;">
                    <p><?php echo $data['pro_id']['title']; ?> <?php echo $data['pro_id']['name']; ?></p>
                    <p><?php echo $data['pro_id']['sale_oulets']; ?></p>
                    <p>保修至：<?php echo $data['pro_id']['repair_date']; ?></p>
                </div>
                <div class="clearl"></div>
            </div>
        </div>

        <div class="deci">
            <ul>
                <li>
                    <p>故障描述</p>
                </li>
                <li>
                    <p><?php echo $data['msg']; ?></p>
                </li>
                <?php if($img != ''): ?>
                <li>
                    <div class="rOut">
                        <?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <div class="rImg floatl">
                            <img src="__PUBLIC__<?php echo $v; ?>" />
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                        <div class="clearl"></div>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="server">
            <div class="title" >
                <p>服务单信息</p>

            </div>
            <div style="clear: both"></div>
            <ul>
                <li>
                    <span>维修方式：</span>
                    <?php if($type == 1): ?>
                    <p class="p1" style="">快递至维修点
                        <?php if(($data['status']['id'] == 1 || $data['status']['id'] == 3) and ($data['type']['id']  == 1)): ?>
                        <span id="loke"><a href="<?php echo url('order/express'); ?>?id=<?php echo $data['id']; ?>&status=<?php echo $data['status']['id']; ?>">查看物流</a></span>
                        <?php endif; ?>
                    </p>
                    <?php else: ?>
                    <p class="p1" style="">上门服务  </p>
                    <?php endif; ?>

                </li>
                <li>
                    <span>联系人：</span>
                    <p class="p1"><?php echo $data['name']; ?></p>
                </li>
                <li>
                    <span>联系电话：</span>
                    <p class="p1"><?php echo $data['phone']; ?></p>
                </li>
                <li>
                    <span>地址：</span>
                    <p><?php echo $data['province']['name']; ?> <?php echo $data['city']['name']; ?> <?php echo $data['zone']['name']; ?> <?php echo $data['addra']; ?></p>
                </li>
            </ul>
        </div>
        <?php if($data['status']['id'] > 0): ?>
        <div class="server">
            <div class="title">
                <p>跟进门店</p>
            </div>
            <ul>
                <li>
                    <span>门店：</span>
                    <p class="p1"><?php echo $net['title']; ?></p>
                </li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="btnBox">
            <ul>
                <?php if($data['status']['id'] == 0): ?>
                <li>
                    <button id="exchange">审核不通过</button>
                </li>
                <li>
                    <button id="tong">审核通过</button>
                </li>
                <?php elseif($data['status']['id'] == 1): ?>
                <li>
                    <button onclick="changeS()">去维修</button>
                </li>
                <?php elseif($data['status']['id'] == 2): ?>
                <li>
                    <?php if($data['type']['id'] == 1): ?>
                    <button id="write">维修完成</button>
                    <?php else: ?>
                    <button onclick="wan()">维修完成</button>
                    <?php endif; ?>
                </li>
                <?php else: ?>
                <li></li>
                <?php endif; ?>
            </ul>
            <div class="floatr"></div>
        </div>
    </div>
</div>
<div id="wl">
    <div class="pHead">
        <a class=" backP"><img src="__HOME__/img/back.png"/></a>
        <p>填写物流</p>
    </div>
    <div class="ex">
        <ul>
            <li>
                <input type="search" id="u_logistics" value="" placeholder="请输入物流公司"/>
                <p>物流公司：</p>
            </li>
            <li>
                <input type="search" id="u_logistics_number" value="" placeholder="填写物流订单号"/>
                <p>物流单号：</p>
            </li>
        </ul>
    </div>
    <div class="st">
        <button onclick="addEXP()">提交</button>
    </div>
</div>
<div id="problem">
    <div class="pHead">
        <a class=" backP"><img src="__HOME__/img/back.png"/></a>
        <p>不通过原因</p>
    </div>
    <div class="problems">
        <textarea placeholder="请输入不通过原因" id="msg"></textarea>
    </div>
    <div class="st">
        <button class="btu" onclick="notong()">提交</button>
    </div>
</div>
<div id="tongNet">
    <div class="pHead">
        <a class=" backP"><img src="__HOME__/img/back.png"/></a>
        <p>跟进门店</p>
    </div>
    <div class="typeOut">
        <div class="type">
            <p>选择跟进门店</p>
            <span>
                <?php if($user_id != ''): ?><?php echo $net['title']; endif; ?>
            </span>
            <select id="user_id">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $user_id): ?>selected="selected"<?php endif; ?>><?php echo $vo['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <img src="__HOME__/img/moreOrder.png" />
        </div>
    </div>
    <div class="st">
        <button onclick="tong()">提交</button>
    </div>
    <script>
        $('.type select').change(function(){
            $(this).prev('span').html($(this).children('option:selected').html());
        });
    </script>
</div>

<input type="hidden" id="or_id" value="<?php echo $data['id']; ?>">
<div id="clipArea" style="display: none;">
    <button id="clipBtn">截取</button>
</div>
<div id="showAll" style="display: none;">
    <img src="" />
</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/photoClip/iscroll-zoom.js"></script>
<script type="text/javascript" src="__HOME__/js/photoClip/hammer.js"></script>
<script type="text/javascript" src="__HOME__/js/photoClip/jquery.photoClip.min.js"></script>
<script type="text/javascript" src="__HOME__/js/rDetails.js" ></script>

<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });

    function notong(){
        var audit = $('#msg').val();
        var or_id = $('#or_id').val();
            $.ajax({
                url:"<?php echo url('order/noTong'); ?>",
                type:"post",
                data:{"id":or_id,"audit":audit},
                success:function(res){
                    if(res.code == 1){
                        layer.msg(res.msg,{time:3000});
                        window.location.href=res.url;
                    }else{
                        layer.msg(res.msg,{time:3000});
                    }
                }
            });
    }

    function tong(){
        var user_id = $('#user_id').val();
        var or_id = $('#or_id').val();
        $.ajax({
            url:"<?php echo url('order/tong'); ?>",
            type:'post',
            data:{"id":or_id,"user_id":user_id},
            success:function(re){
                if(re.code == 1){
                    layer.msg(re.msg,{time:3000});
                    window.location.href=re.url;
                }else{
                    layer.msg(re.msg,{time:3000});
                }
            }
        });
    }

    function changeS(){
        var or_id = $('#or_id').val();
        $.ajax({
            url:"<?php echo url('order/changeStatus'); ?>",
            type:'post',
            data:{"id":or_id},
            success:function(re){
                if(re.code == 1){
                    layer.msg(re.msg,{time:3000});
                    window.location.href=re.url;
                }else{
                    layer.msg(re.msg,{time:3000});
                }
            }
        });
    }

    function wan(){
        var or_id = $('#or_id').val();
        $.ajax({
            url:"<?php echo url('order/changeSwan'); ?>",
            type:'post',
            data:{"id":or_id},
            success:function(re){
                if(re.code == 1){
                    layer.msg(re.msg,{time:3000});
                    window.location.href=re.url;
                }else{
                    layer.msg(re.msg,{time:3000});
                }
            }
        });
    }

    function addEXP(){
        var or_id = $('#or_id').val();
        var u_logistics = $('#u_logistics').val();
        var u_logistics_number = $('#u_logistics_number').val();
        $.ajax({
            url:"<?php echo url('order/wanC'); ?>",
            type:'post',
            data:{"id":or_id,"u_logistics":u_logistics,"u_logistics_number":u_logistics_number},
            success:function(re){
                if(re.code == 1){
                    layer.msg(re.msg,{time:3000});
                    window.location.href=re.url;
                }else{
                    layer.msg(re.msg,{time:3000});
                }
            }
        });
    }
</script>
