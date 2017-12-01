<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"F:\wamp\www\yajie/app/home\view\login\login.html";i:1512101450;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1511237551;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1511235824;}*/ ?>
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
    
<link rel="stylesheet" href="__HOME__/css/login.css" />
<style>
    #login{
        background-image: url(__HOME__/img/lback.png)!important;
    }
    #login ul li:nth-child(1) img{
        width: 80%;
    }
    #login ul li input{

        border: 0;
        color: #333333;
        background: url(__HOME__/img/user.png) no-repeat 0.4rem center;
        background-size:  auto 0.32rem;
        text-indent: 0.8rem;
        background-color: white;
    }
    #login ul li input::-moz-placeholder{
        color: rgba(51,51,51,0.2);
    }
    #login ul li input::-webkit-input-placeholder{
        color: rgba(51,51,51,0.2);
    }
    #login ul li input::-ms-input-placeholder{
        color: rgba(51,51,51,0.2);
    }
    #login ul li:nth-child(5) button{
        color: white;
        background-color: #481c76;
    }
</style>
<title>登录</title>


</head>
<body id="vueMain">
<div class="delete"></div>

		<div id="login">
			<ul>
				<li>
					<img src="__HOME__/img/LoginLogo.png"/>
				</li>
				<li>
					<input  type="text" name="username" id="username" placeholder="登录账号"/>
				</li>
				<li style="position: relative">
					<input  type="password" name="password" id="password" placeholder="登录密码"  style="background-image: url(__HOME__/img/pwd.png);"/>
                    <a href="javascript:;" onclick="changeSrc()"><img aid="1" id="eye" src="__HOME__/img/eyes.png" alt="" style="position: absolute;top: 0.25rem;right: 0.4rem;height: 0.3rem;"/></a>
				</li>
				<li>

				</li>
				<li>
					<button onclick="subit()">登录</button>
				</li>
			</ul>
		</div>




<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/rLogin.js" ></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });

    function subit(){
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            url:"<?php echo url('Login/check'); ?>",
            type:"post",
            data:{"username":username,"password":password},
            success:function(re){
                if(re.code===1){
                    layer.msg(re.msg,{time:1000});
                    location.href = re.url;
                }else{
                    layer.msg(re.msg,{time:1000});
                }
            }
        });
    }

    function changeSrc(){
        var aid = $("#eye").attr('aid');
        if(aid ==1){
            $("#eye").attr('src','__HOME__/img/eye.png');
            $("#eye").attr('aid',2);
            $("#password").attr('type','text');
        }else{
            $("#eye").attr('src','__HOME__/img/eyes.png');
            $("#eye").attr('aid',1);
            $("#password").attr('type','password');
        }

    }
</script>

