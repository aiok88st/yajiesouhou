<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"F:\wamp\www\yajie/app/home\view\login\login.html";i:1510794954;s:50:"F:\wamp\www\yajie/app/home\view\common\header.html";i:1510391119;s:50:"F:\wamp\www\yajie/app/home\view\common\footer.html";i:1510391232;}*/ ?>
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
    
<title>登录</title>
<link rel="stylesheet" href="__HOME__/css/login.css" />

</head>
<body id="vueMain">
<div class="delete"></div>

		<div id="login">
			<ul>
				<li>
					<img src="__HOME__/img/LoginLogo.png"/>
				</li>
				<li>
					<input  type="text" id="phone" name="phone" placeholder="手机号码"/>
				</li>
				<li>
					<input  type="text" id="code" name="code" placeholder="动态密码" maxlength="8"/>
					<button id="getCode" onclick="getvcode()">获取动态密码</button>
				</li>
				<li>
					<div class="checkBox floatl">
						<img src="__HOME__/img/yes.png" />
						<input type="checkbox" checked="checked" name="yes"/>
					</div>
					<div class="floatl read">
						<a href="###">同意雅洁协议</a>
					</div>
					<div class="clearl"></div>
				</li>
				<li>
					<button onclick="subit()">登录</button>
				</li>
			</ul>
		</div>
		<div id="content">
			
		</div>



<script type="text/javascript" src="https://static.runoob.com/assets/vue/1.0.11/vue.min.js"></script>
<div class="delete"></div>
<script type="text/javascript">
    $('.delete').remove();
</script>
</body>
</html>

<script type="text/javascript" src="__HOME__/js/login.js" ></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });
	//获取验证码
	function getvcode(){
		var phone = $("#phone").val();
        $.get("<?php echo url('Login/getCode'); ?>?phone="+phone,function(re){
			if(re.code == 1){
				layer.msg("短信发送成功");
			}else{
				layer.msg("短信发送失败");
			}
		});
	}
    function subit(){
        var check=$('.checkBox').find('input');
        if(!check.is(":checked")){
            layer.msg('是否同意雅洁协议');
            return false;
        }
        var phone = $("#phone").val();
        var code = $("#code").val();
        $.ajax({
            url:"<?php echo url('Login/index'); ?>",
            type:"post",
            data:{"tel":phone,"code":code},
            success:function(re){
                if(re.code===1){
                    layer.msg(re.msg,{time:1000,icon:1});
                    location.href = re.url;
                }else{
                    layer.msg(re.msg,{time:1000,icon:2});
                }
            }
        });
    }
</script>

