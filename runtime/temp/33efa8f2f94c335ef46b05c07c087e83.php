<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"F:\wamp\www\yajie/app/client\view\client\index.html";i:1512116109;s:52:"F:\wamp\www\yajie/app/client\view\common\header.html";i:1512116575;s:52:"F:\wamp\www\yajie/app/client\view\common\footer.html";i:1511235824;}*/ ?>
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
    
<title>会员中心</title>
<link rel="stylesheet" href="__HOME__/css/person.css" />
<link rel="stylesheet" href="__HOME__/css/rPerson.css" />
<script type="text/javascript">
    var data = <?php echo $list; ?>;
</script>

</head>
<body id="vueMain">
<div class="delete"></div>

<div id="person">
    <div class="head">
        <div class="floatl headPic">
            <img src="<?php echo $client['open_face']; ?>" />
        </div>
        <div class="floatl infor">
            <ul>
                <li>
                    <p><?php echo $client['open_name']; ?></p>
                </li>
                <li>
                    <p><?php echo $client['phone']; ?></p>
                </li>
            </ul>
        </div>
        <img src="__HOME__/img/moreOrder.png" />

    </div>
    <div class="myOrder">
        <div class="moreOrder">
            <p>查看更多</p>
            <a href="<?php echo url('Order/index'); ?>" >保修进度</a>
        </div>
        <div class="orderBox">
            <div class="orders floatl">
                <a href="<?php echo url('Order/index'); ?>?status=1">
                    <img src="__HOME__/img/repair01.png" />
                    <p>待维修</p>
                    <?php if($orders['num1'] != ''): ?>
                    <span><?php echo $orders['num1']; ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="orders floatl">
                <a href="<?php echo url('Order/index'); ?>?status=2">
                    <img src="__HOME__/img/repair02.png" />
                    <p>维修中</p>
                    <?php if($orders['num2'] != ''): ?>
                    <span><?php echo $orders['num2']; ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="orders floatl">
                <a href="<?php echo url('Order/index'); ?>?status=3">
                    <img src="__HOME__/img/repair03.png" />
                    <p>已完成</p>
                    <?php if($orders['num3'] != ''): ?>
                    <span><?php echo $orders['num3']; ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="clearl"></div>
        </div>
    </div>
    <div class="myOrder bottomChoice">
        <div class="moreOrder">
            <p>&nbsp;</p>
            <a href="<?php echo url('Product/index'); ?>" class="setting" >我的产品</a>
        </div>
    </div>
    <div class="myOrder bottomChoice1">
        <div class="moreOrder">
            <p>&nbsp;</p>
            <a href="###" class="rHelp" >维修帮助</a>
        </div>
    </div>
</div>
<!--个人信息-->
<div id="personInfor" style="display: none;">
    <div class="pHead">
        <a class="backPerson"><img src="__HOME__/img/back.png"/></a>
        <p>个人信息</p>
    </div>
    <div class="message">
        <ul>
            <li>
                <div>
                    <div class="hBox">
                        <img src="<?php echo $client['open_face']; ?>" />
                    </div>
                    <a href="###">头像</a>
                </div>
            </li>
            <li>
                <div>
                    <p id="nikname"><?php echo $client['name']; ?></p>
                    <a href="###" class="exchangeN" aid="1">姓名</a>
                    <img src="__HOME__/img/moreOrder.png" />
                </div>
            </li>
            <li>
                <div>
                    <p id="ph"><?php echo $client['phone']; ?></p>
                    <a href="###" class="exchangeP" aid="2">手机</a>
                    <img src="__HOME__/img/moreOrder.png" />
                </div>
            </li>
        </ul>
        <ul style="margin-top: 0.2rem;">
            <li></li>
            <li>
                <div>
                    <p></p>
                    <a href="###" class="exchangeA">修改地址</a>
                    <img src="__HOME__/img/moreOrder.png" />
                </div>
            </li>
        </ul>
    </div>
</div>
<!--维修帮助-->
<div id="help">
    <div class="pHead">
        <a class="backP backRepair"><img src="__HOME__/img/back.png"/></a>
        <p>维修帮助</p>
    </div>
    <div class="helpContent">
        <div class="helpChoice">
            <ul>
                <li>
                    <a href="###"class="aChioce apply">申请维修</a>
                </li>
                <li>
                    <a href="###"  class="pay">收费标准</a>
                </li>
            </ul>
            <div class="clearl"></div>
        </div>
        <div class="helpMainCentent" >
            <div class="contentBox">
                <ul>
                    <li>
                        <p>1.绑定手机号码后自动同步产品。</p>
                    </li>
                    <li>
                        <div class="helpImgBox">
                            <div class="floatl">
                                <img class="showPic" src="__HOME__/img/help01.jpg" />
                            </div>
                            <div class="clearBoth"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="contentBox">
                <ul>
                    <li>
                        <p>2.点击进入“ 我的产品“，添加产品。</p>
                    </li>
                    <li>
                        <div class="helpImgBox">
                            <div class="floatl">
                                <img class="showPic" src="__HOME__/img/help02.jpg" />
                            </div>
                            <div class="floatr">
                                <img class="showPic" src="__HOME__/img/help03.jpg" />
                            </div>
                            <div class="clearBoth"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="contentBox">
                <ul>
                    <li>
                        <p>3.输入产品ID，即可添加产品，添加完成可继续添加。</p>
                    </li>
                    <li>
                        <div class="helpImgBox">
                            <div class="floatl">
                                <img class="showPic" src="__HOME__/img/help04.jpg" />
                            </div>
                            <div class="floatr">
                                <img class="showPic" src="__HOME__/img/help05.jpg" />
                            </div>
                            <div class="clearBoth"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="contentBox">
                <ul>
                    <li>
                        <p>4.点击 “ 一键维修“，填写相关资料，即可申请维修。</p>
                    </li>
                    <li>
                        <div class="helpImgBox">
                            <div class="floatl">
                                <img class="showPic" src="__HOME__/img/help06.jpg" />
                            </div>
                            <div class="floatr">
                                <img class="showPic" src="__HOME__/img/help07.jpg" />
                            </div>
                            <div class="clearBoth"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="money" style="display: none;">
                <?php echo $system['guangyu']; ?>
        </div>
    </div>
</div>
<!--修改姓名信息-->
<div id="exchangePerson" class="exchangeBox" style="display: none;">
    <div class="pHead">
        <a class=" backP"><img src="__HOME__/img/back.png"/></a>
        <p>修改姓名</p>
    </div>
    <div class="exInput">
        <input type="search" id="name"/>
    </div>
    <div class="exBtn">
        <button class="keepName">保存</button>
    </div>
</div>
<!--修改手机信息-->
<div id="exchangePhone" class="exchangeBox" style="display: none;">
    <div class="pHead">
        <a class=" backP"><img src="__HOME__/img/back.png"/></a>
        <p>修改手机</p>
    </div>
    <div class="exInput">
        <ul>
            <li>
                <input type="search" maxlength="11" id="tel"/>
            </li>
            <li>
                <input type="search" id="code" placeholder="请输入验证码"/>
                <button class="send">获取验证码</button>
            </li>
        </ul>
    </div>
    <div class="exBtn">
        <button class="keepPhone">保存</button>
    </div>
</div>
<!--修改地址信息-->
<div id="exchangeAddress" class="exchangeBox" style="display: none;">
    <div class="pHead">
        <a class=" backP"><img src="__HOME__/img/back.png"/></a>
        <p>修改地址</p>
    </div>
    <div class="exInput">
        <ul>
            <li>
                <p>选择地区</p>
                <input type="input" id="J_Address" placeholder="城区信息" value="<?php echo $client['province']['name']; ?> <?php echo $client['city']['name']; ?> <?php echo $client['area']['name']; ?>" />
            </li>
            <li>
                <p>详细地址</p>
                <textarea id="addr" placeholder="街道门牌信息"><?php echo $client['zone']; ?></textarea>
            </li>
        </ul>
    </div>
    <div class="exBtn">
        <button class="keepAddress">保存</button>
    </div>
</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/rPerson.js" ></script>
<script src="__HOME__/js/ydui.js?v=0"></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    function edit_info(url,data,call){
        popw("温馨提示","确认要修改吗？",2,function(){
            $.ajax({
                url:url,
                type:"post",
                data:data,
                success:function(res){
                    call(res);
                }
            });
        });
    }
    //修改姓名
    $('.keepName').bind('click',function(){
        var name = $('#name').val();
        edit_info("<?php echo url('client/edit_name'); ?>",{"name":name},function(res){
            if(res.code == 1){
                layer.msg(res.msg,{time:1000});
                $('#nikname').text(res.list);
                $('#exchangePerson').stop().animate({left:'100%',},function(){
                    $(this).hide();
                });
            }else{
                layer.msg(res.msg,{time:1000});
            }
        })
    });
    //短信验证吗
    $('.send').bind('click',function(){
        var phone = $("#tel").val();
        $.get("<?php echo url('Client/getCode'); ?>?phone="+phone,function(re){
            if(re.code == 1){
                layer.msg("短信发送成功");
            }else{
                layer.msg("短信发送失败");
            }
        });
    });
    //修改手机
    $('.keepPhone').bind('click',function(){
        var code = $('#code').val();
        var phone = $("#tel").val();
        edit_info("<?php echo url('client/edit_phone'); ?>",{"phone":phone,"code":code},function(res){
            if(res.code == 1){
                layer.msg(res.msg,{time:1000});
                $('#ph').text(res.list);
                $('#exchangePhone').stop().animate({left:'100%',},function(){
                    $(this).hide();
                });
            }else{
                layer.msg(res.msg,{time:1000});
            }
        })
    });

    //修改地址
    $('.keepAddress').bind('click',function(){
        var J_Address = $('#J_Address').val();
        var addr = $("#addr").val();
        edit_info("<?php echo url('client/editA'); ?>",{"J_Address":J_Address,"addr":addr},function(res){
            if(res.code == 1){
                layer.msg(res.msg,{time:1000});
                $('#exchangeAddress').stop().animate({left:'100%',},function(){
                    $(this).hide();
                });
            }else{
                layer.msg(res.msg,{time:1000});
            }
        })
    });

    ! function() {
        var citys = [];
        for(var i=0;i<data.length;i++){
            var k = data[i].name;
            var id = data[i].id;
            var c = [];
            for(var j=0;j<data[i].city.length;j++)
            {
                var cv = data[i].city[j].name;
                var a = [];
                var cid = data[i].city[j].id;
                var aid = [];
                for(var l=0;l<data[i].city[j].area.length;l++) {
                    var av = data[i].city[j].area[l].name;
                    var aaid = data[i].city[j].area[l].id;
                    a.push(av);
                    aid.push(aaid);
                }
                var cj = {
                    "a":a,
                    "id":cid,
                    "n":cv,
                    "aid":aid
                }
                c.push(cj);
            }
            var j = {
                "n":k,
                "id":id,
                "c":c
            }
            citys.push(j);
        }

        if(typeof define === "function") {
            define(citys)
        } else {
            window.YDUI_CITYS = citys
        }
    }();

    !function () {
        var $target = $('#J_Address');
        $target.citySelect();
        $target.on('click', function (event) {
            event.stopPropagation();
            $target.citySelect('open');
        });
        $target.on('done.ydui.cityselect', function (ret) {
            $(this).val(ret.provance+' ' + ret.city + ' ' + ret.area+' ');
        });
    }();

</script>
