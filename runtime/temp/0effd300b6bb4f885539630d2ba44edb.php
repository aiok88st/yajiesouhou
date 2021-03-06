<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"F:\wamp\www\yajie/app/home\view\user\person.html";i:1512116041;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1512116852;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
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
    
<title>会员中心</title>
<link rel="stylesheet" href="__HOME__/css/person.css" />
<link rel="stylesheet" href="__HOME__/css/rPerson.css" />

</head>
<body id="vueMain">
<div class="delete"></div>


		<div id="person">
			<div class="head">
				<div class="floatl headPic">
					<img src="<?php echo $open['open_face']; ?>" />
				</div>
				<div class="floatl infor">
					<ul>
						<li>
							<p><?php echo $user['nikename']; ?></p>
						</li>
						<li>
							<p>ID:<?php echo $user['username']; ?></p>
						</li>
					</ul>
				</div>
                <img src="__HOME__/img/moreOrder.png" />
			</div>
			<div class="twoChoice" style="border-bottom: 1px solid #e2e2e2;">
				<div class="floatl">
					<a href="<?php echo url('Collect/index'); ?>">
						<p><?php echo $collect_num; ?></p>
						<p>收藏夹</p>
					</a>
				</div>
				<div class="floatl">
					<a href="<?php echo url('Exam/index'); ?>">
						<p><?php echo $utest_num; ?></p>
						<p>我的测试</p>
						<span></span>
					</a>
				</div>
				<div class="clearl"></div>
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
                            <?php if($order['num1'] != ''): ?>
                            <span><?php echo $order['num1']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="orders floatl">
                        <a href="<?php echo url('Order/index'); ?>?status=2">
                            <img src="__HOME__/img/repair02.png" />
                            <p>维修中</p>
                            <?php if($order['num2'] != ''): ?>
                            <span><?php echo $order['num2']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="orders floatl">
                        <a href="<?php echo url('Order/index'); ?>?status=3">
                            <img src="__HOME__/img/repair03.png" />
                            <p>已完成</p>
                            <?php if($order['num3'] != ''): ?>
                            <span><?php echo $order['num3']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="clearl"></div>
                </div>
            </div>
			<div class="myOrder bottomChoice" style="display: none;">
				<div class="moreOrder">
					<p>&nbsp;</p>
					<a href="###" class="setting">个人设置</a>
				</div>
				<div class="moreOrder">
					<p>&nbsp;</p>
					<a href="###" class="about">关于</a>
				</div>
			</div>
		</div>
		<!--个人信息-->
		<div id="personInfor" style="display: none;">
			<div class="pHead">
				<a class=" backPerson"><img src="__HOME__/img/back.png"/></a>
				<p>个人信息</p>
			</div>
			<div class="message">
				<ul>
					<li>
						<div>							
							<div class="hBox">
								<img src="<?php echo $open['open_face']; ?>" />
							</div>
							<a href="###">头像</a>
						</div>
					</li>
					<li>
						<div>
							<p id="nikename"><?php echo $user['nikename']; ?></p>
							<a href="###" class="exchange" aid="1">姓名</a>
							<img src="__HOME__/img/moreOrder.png" />
						</div>
					</li>
					<li>
						<div>
							<p id="tel"><?php echo $user['tel']; ?></p>
							<a href="###" class="exchange" aid="2">电话</a>
							<img src="__HOME__/img/moreOrder.png" />
						</div>
					</li>
				</ul>
				<div class="accountBox">
					<div class="account">
						<p style="right: 0;"><?php echo $user['username']; ?></p>
						<a href="###" style="border-bottom: 1px solid #e2e2e2;">登录账户</a>
					</div>					
				</div>
				<!--<ul>-->
					<!--<li></li>-->
					<!--<li>-->
						<!--<div>-->
							<!--<p></p>-->
							<!--<a href="###" class="ep">修改密码</a>-->
							<!--<img src="__HOME__/img/moreOrder.png" />-->
						<!--</div>-->
					<!--</li>-->
				<!--</ul>-->
			</div>
			<div class="exit">
				<button class="logouts">退出登录</button>
			</div>
		</div>
		<!--关于-->
		<div id="about" >
			<div class="pHead">
				<a class=" backPerson1"><img src="__HOME__/img/back.png"/></a>
				<p>关于</p>
			</div>
			<div class="main">
				<ul>
					<li>
						<img src="__HOME__/img/logon.png" />
					</li>
					<li>
						<p>关于雅洁：</p>
						<p><?php echo $system['guangyu']; ?></p>
					</li>
					<li>
						<p>使用说明：</p>
						<div class="smBox">
							<div class="floatl">
								<img src="__HOME__/img/my.png" />
							</div>
							<div class="floatl">
								<img src="__HOME__/img/my.png" />
							</div>
							<div class="floatl">
								<img src="__HOME__/img/my.png" />
							</div>
							<div class="floatl">
								<img src="__HOME__/img/my.png" />
							</div>
							<div class="floatl">
								<img src="__HOME__/img/my.png" />
							</div>
							<div class="floatl">
								<img src="__HOME__/img/my.png" />
							</div>
							<div class="clearl"></div>
						</div>
					</li>
				</ul>
			</div>
		</div>
<!--修改信息-->
<div id="exchangePerson" class="exchangeBox" style="display: none;">
    <div class="pHead">
        <a  class="backP"><img src="__HOME__/img/back.png"/></a>
        <p>修改姓名</p>
    </div>
    <div class="exInput">
        <input type="search" id="searchValue"/>
    </div>
    <div class="exBtn">
        <button class="keep">保存</button>
    </div>
</div>
<!--修改密码-->
<div id="exchangePassword" class="exchangeBox">
    <div class="pHead">
        <a  class=" backPwd"><img src="__HOME__/img/back.png"/></a>
        <p>修改密码</p>
    </div>
    <div class="exInput exPassword" >
        <ul>
            <li>
                <p>旧密码</p>
                <input type="password" name="pwd" id="pwd1" placeholder="请输入旧密码" maxlength="20"/>
                <a href="###"><img src="__HOME__/img/closes.png"/></a>
            </li>
            <li>
                <p>新密码</p>
                <input type="password" name="pwd" id="pwd2" placeholder="请输入新密码" maxlength="20"/>
                <a href="###"><img src="__HOME__/img/closes.png"/></a>
            </li>
        </ul>
    </div>
    <div class="exInput exPassword1" style="display: none;">
        <ul>
            <li>
                <p>手机号</p>
                <input type="search" id="phone" placeholder="请输入您的手机号" maxlength="11"/>
                <a href="###"><img src="__HOME__/img/closes.png"/></a>
            </li>
            <li>
                <p>验证码</p>
                <input type="search" id="code" placeholder="请输入验证码" maxlength="20"/>
                <a href="###"><img src="__HOME__/img/closes.png"/></a>
                <button class="send">发送验证码</button>
            </li>
        </ul>
    </div>
    <div class="exInput exPassword2" style="display: none;">
        <ul>
            <li>
                <p>新密码</p>
                <input type="password" id="L_pass" name="password" placeholder="请输入新密码" maxlength="20"/>
                <a href="###"><img src="__HOME__/img/closes.png"/></a>
            </li>
            <li>
                <p>确认密码</p>
                <input type="password" id="L_repass" name="password_confirm" placeholder="请输入新密码" maxlength="20"/>
                <a href="###"><img src="__HOME__/img/closes.png"/></a>
            </li>
        </ul>
    </div>
    <div class="exBtn">
        <button class="confirm">确定</button>
        <button class="next" style="display: none;">下一步</button>
        <button class="confirm1" style="display: none;">确定</button>
    </div>
    <div class="showAndMethod">
        <p>显示密码</p>
        <a href="###" class="else" md='2'>其他方式</a>
        <a href="###" hide='true' class="showPassword" style="display: none;"><img src="__HOME__/img/yes.png"/></a>
        <a href="###" hide='true' class="showPassword1"><img src="__HOME__/img/yes.png"/></a>
    </div>
</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/person.js?v=1" ></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });

    $('.logouts').bind('click',function(){
        popw("温馨提示","确认要退出吗？",2,function(){
            window.location.href="<?php echo url('Login/logout'); ?>";
        })
    })
    //保存
    //修改个人信息
    var aid = 0;
    $('.exchange').bind('click',function(){
        $('.exInput input').val($(this).prev('p').text());
        $('#exchangePerson .pHead p').html("修改"+$(this).text());
        $('#exchangePerson').show().stop().animate({left:'0%'});
        aid  = $(this).attr('aid');
    });

    $('.keep').bind('click',function(){
        var type = aid;
        var content = $('#searchValue').val();
        popw("温馨提示","确认要修改吗？",2,function(){
            $.ajax({
                url:"<?php echo url('User/change'); ?>",
                type:"post",
                data:{"type":type,"content":content},
                success:function(res){
                    if(res.code == 1){
                        layer.msg(res.msg,{time:1000});
                        if(res.type == 1){
                            $('#nikename').text(res.list);
                        }else{
                            $('#tel').text(res.list);
                        }
                        $('#exchangePerson').stop().animate({left:'100%',},function(){
                            $(this).hide();
                        });
                    }else{
                        layer.msg(res.msg,{time:1000});
                    }
                }
            });
        });
    });

    $('.confirm').bind('click',function(){
        var oldpwd = $('#pwd1').val();
        var newpwd = $('#pwd2').val();
        popw("温馨提示","确认要修改吗？",2,function(){
            $.ajax({
                url:"<?php echo url('User/changePwd'); ?>",
                type:"post",
                data:{"oldpwd":oldpwd,"newpwd":newpwd},
                success:function(res){
                    if(res.code == 1){
                        layer.msg(res.msg,{time:1000});
                        $('#exchangePassword').stop().animate({left:'100%',},function(){
                            $(this).hide();
                        });
                    }else{
                        layer.msg(res.msg,{time:1000});
                    }
                }
            });
        });
    });
    $('.send').bind('click',function(){
        var phone = $("#phone").val();
        $.get("<?php echo url('Login/getCode'); ?>?phone="+phone,function(re){
            if(re.code == 1){
                layer.msg("短信发送成功");
            }else{
                layer.msg("短信发送失败");
            }
        });
    });
    $('.next').bind('click',function() {
        var code = $("#code").val();
        $.ajax({
            url:"<?php echo url('User/checkCode'); ?>",
            type:"post",
            data:{"code":code},
            success:function(res){
                if(res.code == 1){
                    layer.msg(res.msg,{time:1000});
                    $('.exPassword1').hide();
                    $('.exPassword2').show();
                    $('.next').hide();
                    $('.confirm1').show();
                    $('.showPassword1').show();
                    $('.showPassword').hide();
                    $('.showAndMethod p').show();
                }else{
                    layer.msg(res.msg,{time:1000});
                }
            }
        });
    });
    $('.confirm1').bind('click',function(){
        var password = $('#L_pass').val();
        var password_confirm = $('#L_repass').val();
        popw("温馨提示","确认要修改吗？",2,function(){
            $.ajax({
                url:"<?php echo url('User/changePwdTwo'); ?>",
                type:"post",
                data:{"password":password,"password_confirm":password_confirm},
                success:function(res){
                    if(res.code == 1){
                        layer.msg(res.msg,{time:1000,icon:1});
                        $('#exchangePassword').stop().animate({left:'100%',},function(){
                            $(this).hide();
                        });
                    }else{
                        layer.msg(res.msg,{time:1000});
                    }
                }
            });
        });
    });
</script>
