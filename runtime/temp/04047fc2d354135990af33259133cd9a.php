<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"F:\wamp\www\yajie/app/user\view\login\index.html";i:1511750787;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>雅洁客户登录 </title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__USER__/css/font.css">
	<link rel="stylesheet" href="__USER__/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="__USER__/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="__USER__/js/xadmin.js"></script>
    <style type="text/css">
    .login{
        position: absolute;
        top: 50%;
        right: 200px;
        width: 360px;
        margin-top: -240px;
    }
    *{
    	padding: 0;
    	margin: 0;
    }
    html{
    	width: 100%;
    	height: auto;
    }

    </style>

</head>
<body>
    <div style="height: 70px;margin: 10px 0px 10px 50px;">
        <img src="__ADMIN__/images/logo.jpg" alt="" style="height: 40px;padding-top: 15px;" />
    </div>

    <div class="backBox" style="position: relative;">
        <img src="__ADMIN__/images/bgimg.jpg" alt="" style="height: 100%;margin: 0 auto;display: block;" />
        <div class="login">
	        <div class="message">雅洁客户登录</div>
	        <div id="darkbannerwrap"></div>
	        <form method="post" class="layui-form" >
	            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
	            <hr class="hr15">
	            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
	            <hr class="hr15">
	            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
	            <hr class="hr20" >
	        </form>
	    </div>
    </div>
    
    <div style="height: 70px;text-align: center;line-height: 70px;">
        <p>Copyright ©2017 雅洁五金</p>
    </div>

    <script>
        layui.use('form',function(){
            var form = layui.form,$ = layui.jquery;
            //监听提交
            form.on('submit(login)', function(data){
                console.log(data.field);
                loading =layer.load(1, {shade: [0.1,'#fff'] });//0.1透明度的白色背景
                $.post('<?php echo url("Login/check"); ?>',data.field,function(res){
                    layer.close(loading);
                    if(res.code == 1){
                        layer.msg(res.msg, {icon: 1, time: 1000}, function(){
                            location.href = res.url;
                        });
                    }else{

                        layer.msg(res.msg, {icon: 2, anim: 6, time: 1000});

                    }
                });
                return false;
            });
        });       
        $(function(){
			$('.backBox').height($(window).height()-160);
        });

    </script>


    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>