<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"F:\wamp\www\yajie/app/user\view\person\edit.html";i:1510821573;s:50:"F:\wamp\www\yajie/app/user\view\common\header.html";i:1510569153;}*/ ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员中心</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__USER__/css/font.css">
    <link rel="stylesheet" href="__USER__/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <script type="text/javascript" src="__USER__/js/xadmin.js"></script>
    <style>
        .layui-table-view{
            margin-left: 30px;
        }
    </style>
</head>
<body>
<div class="x-body">
    <form class="layui-form" method="post">
        <div class="layui-form-item">
            <label for="L_nikename" class="layui-form-label">
                <span class="x-red">*</span>用户名
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_nikename" name="nikename" value="<?php echo $nikename; ?>" required="" lay-verify="nikename"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_tel" class="layui-form-label">
                <span class="x-red">*</span>电话
            </label>
            <div class="layui-input-inline">
                <input type="text" id="L_tel" name="tel" value="<?php echo $tel; ?>" required="" lay-verify="tel"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_pass" class="layui-form-label">
                <span class="x-red">*</span>密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
                       autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                6到15个字符
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
                <span class="x-red">*</span>确认密码
            </label>
            <div class="layui-input-inline">
                <input type="password" id="L_repass" name="password_confirm" required="" lay-verify="repass"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <input value="确认" class="layui-btn" lay-submit lay-filter="edit" type="submit">
        </div>
    </form>
</div>
<script>
    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
                ,layer = layui.layer;

        //自定义验证规则
        form.verify({
            nikename: function(value){
                if($('#L_nikename').val()==''){
                    return '用户名不能为空';
                }
            },
            tel: [/^1[34578]{1}[0-9]{9}$/, '手机号码格式不正确'],
            pass: [/(.+){6,15}$/, '密码必须6到15位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
        });

        //监听提交
        form.on('submit(edit)', function(data){
            console.log(data);
            //发异步，把数据提交给php
            loading =layer.load(1, {shade: [0.1,'#fff'] });//0.1透明度的白色背景
            // 获得frame索引
            var index = parent.layer.getFrameIndex(window.name);
            $.post('<?php echo url("user/Person/edit"); ?>',data.field,function(res){
                layer.close(loading);
                if(res.code == 1){
                    layer.msg(res.msg, {icon: 6},function () {
                        //关闭当前frame
                        parent.layer.close(index);
                        window.parent.location.reload();
                    });
                }else{
                    layer.msg(res.msg, {icon: 2, anim: 6, time: 1000});
                }
            });
            return false;
        });
    });
</script>
<script>var _hmt = _hmt || []; (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();</script>
