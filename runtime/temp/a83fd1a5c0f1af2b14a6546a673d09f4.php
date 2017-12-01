<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"F:\wamp\www\yajie/app/client\view\order\detail.html";i:1512117854;s:52:"F:\wamp\www\yajie/app/client\view\common\header.html";i:1512116575;s:52:"F:\wamp\www\yajie/app/client\view\common\footer.html";i:1511235824;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__HOME__/css/ydui.css?rev=@@hash"/>
    <link rel="stylesheet" href="__HOME__/css/demo.css"/>
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="__HOME__/css/public.css"/>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="__HOME__/js/ydui.flexible.js"></script>
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
    
<title>服务单详情</title>
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
</style>

</head>
<body id="vueMain">
<div class="delete"></div>

<div id="orderDetails">
    <div class="pHead">
        <a class="backP" href="<?php echo url('order/index'); ?>"><img src="__HOME__/img/back.png"/></a>
        <p>服务单详情</p>
        <a class="back_home" href="<?php echo url('client/index'); ?>"><img src="__HOME__/img/home.png"/></a>
    </div>
    <div class="rOrderBox">
        <div class="code">
            <ul>
                <li>
                    <p>服务单编号：<?php echo $data['id']; ?></p>
                </li>
                <li>
                    <p>服务单状态：<?php echo $data['status']['name']; ?></p>
                </li>
            </ul>
        </div>
        <div class="myProduce">
            <div class="produceBox">
                <div class="floatl">
                    <img src="__PUBLIC__<?php echo $data['pro_id']['img']; ?>" />
                </div>
                <div class="floatl" style="margin-left: 5px">
                    <p><?php echo $data['pro_id']['title']; ?> <?php echo $data['pro_id']['name']; ?></p>
                    <p><?php echo $data['pro_id']['sale_oulets']; ?></p>
                    <p>保修至：<?php echo $data['pro_id']['repair_date']; ?></p>
                </div>
                <div class="clearl"></div>
            </div>
        </div>
        <?php if($data['status']['id'] == -1): ?>
        <div class="address addr">
            <ul>
                <li>
                    <p>商家已拒绝申请，原因如下：</p>
                </li>
                <ul>
                    <li>
                        <p><?php echo $data['audit']; ?></p>
                    </li>
                </ul>
            </ul>
        </div>
        <?php elseif($data['status']['id'] == 0): ?>
        <div class="address addr">
            <ul>
                <li>
                    <p>正在审核中，请耐心等待</p>
                </li>
            </ul>
        </div>
        <?php else: ?>
        <div class="address">
            <ul>
                <li>
                    <?php if($type == 1): ?>
                    <p>商家已同意申请，请尽早退货</p>
                    <?php if($data['c_logistics'] == ''): ?>
                    <button id="write">填写物流</button>
                    <?php endif; else: ?>
                    <p>商家已同意申请，会尽快派人上门维修</p>
                    <?php endif; ?>
                </li>

                <li>
                    <div class="person">
                        <p class="p1">收货人：<?php echo $net['title']; ?></p>
                        <span><?php echo $net['tel']; ?></span>
                    </div>
                    <div class="citys">
                        <p><?php echo $p['name']; ?><?php echo $c['name']; ?><?php echo $a['name']; ?><?php echo $net['addr']; ?></p>
                    </div>
                </li>
            </ul>
        </div>
        <?php endif; ?>
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
            <div class="title">
                <p>服务单信息</p>
            </div>
            <ul>
                <li>
                    <span>维修方式：</span>
                    <?php if($type == 1): ?>
                    <p class="p1">快递至维修点  </p>
                    <?php else: ?>
                    <p class="p1">上门服务  </p>
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
        <div class="btnBox">
            <ul>
                <?php if($data['status']['id'] == -1): ?>
                <li>
                    <button id="exchange">修改描述</button>
                </li>
                <?php endif; ?>
                <li>
                    <button onclick="del('<?php echo $data['id']; ?>')">取消服务单</button>
                </li>
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
    <div class="myProduce">
        <div class="produceBox">
            <div class="floatl">
                <img src="__PUBLIC__<?php echo $data['pro_id']['img']; ?>" />
            </div>
            <div class="floatl" style="margin-left: 5px">
                <p><?php echo $data['pro_id']['title']; ?> <?php echo $data['pro_id']['name']; ?></p>
                <p><?php echo $data['pro_id']['sale_oulets']; ?></p>
                <p>保修至：<?php echo $data['pro_id']['repair_date']; ?></p>
            </div>
            <div class="clearl"></div>
        </div>
    </div>
    <div class="ex">
        <ul>
            <li>
                <input type="search" id="c_logistics" value="<?php echo $data['c_logistics']; ?>" placeholder="请输入物流公司"/>
                <p>物流公司：</p>
            </li>
            <li>
                <input type="search" id="c_logistics_number" value="<?php echo $data['c_logistics_number']; ?>" placeholder="填写物流服务单号"/>
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
        <p>修改问题描述</p>
    </div>
    <div class="problems">
        <textarea placeholder="请输入问题描述" id="msg"><?php echo $data['msg']; ?></textarea>
    </div>
    <div class="imgOut">
        <div class="imgUp">
            <div class="upBtn floatl upBtn0">
                <img src="__HOME__/img/add.png" />
                <input type="file" id="file" />
            </div>
            <div class="clearl"></div>
        </div>
    </div>
    <div class="st">
        <button onclick="edit()">提交</button>
    </div>
</div>
<input type="hidden" id="token" value="<?php echo $token; ?>">
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
        },
        loadComplete: function() {
            console.log("照片读取完成");
            //关闭加载页面
        },
        clipFinish: function(dataURL) {
            imgN++;
            $('#clipArea').hide();
            if(imgN==4)
            {
                $('.upBtn0').hide();
            }
            $('.upBtn0').before('<div class="upBtn allimg floatl"><img src="'+dataURL+'" /><a href="###"><img src="__HOME__/img/pClose.png"/></a><input type="hidden" name="images" value="'+dataURL+'"></div>');
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

    function del(id){
        var token=$('#token').val();
        console.log(token);
        popw("温馨提示","确认要取消吗？",2,function(){
            $.ajax({
                url:"<?php echo url('order/del'); ?>",
                type:"post",
                data:{
                    "__token__":token,
                    "id":id
                },
                success:function(res){
                    if(res.code == 1){
                        layer.msg(res.msg,{time:3000});
                        window.location.href=res.url;
                    }else{
                        layer.msg(res.msg,{time:3000});
                    }
                }
            });
        });
    }

    function edit(){
        var msg = $('#msg').val();
        var token = $('#token').val();
        var or_id = $('#or_id').val();
        var img = [];
        $('[name="images"]').each(function(){
            if($(this).val() != ''){
                var imge = $(this).val();
                img.push(imge.substr(22));
            }
        });
        $.ajax({
            url:"<?php echo url('order/edits'); ?>",
            type:'post',
            data:{"msg":msg,"__token__":token,"id":or_id,"images":img},
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
        var token = $('#token').val();
        var or_id = $('#or_id').val();
        var c_logistics = $('#c_logistics').val();
        var c_logistics_number = $('#c_logistics_number').val();
        $.ajax({
            url:"<?php echo url('order/addexp'); ?>",
            type:'post',
            data:{"__token__":token,"id":or_id,"c_logistics":c_logistics,"c_logistics_number":c_logistics_number},
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
