<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"F:\wamp\www\yajie/app/admin\view\system\system.html";i:1511162608;s:49:"F:\wamp\www\yajie/app/admin\view\common\head.html";i:1510307286;s:49:"F:\wamp\www\yajie/app/admin\view\common\foot.html";i:1507509539;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css?v=1" media="all">
    <link rel="stylesheet" href="__STATIC__/common/css/font.css" media="all">
</head>
<body class="skin-0">
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo lang('systemSet'); ?></legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <input type="hidden" name="id" value="<?php echo $sys_id; ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">联系电话</label>
            <div class="layui-input-4">
                <input type="text" name="tel" value="<?php echo $system['tel']; ?>" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>联系电话" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">关于雅洁</label>
            <div class="layui-input-block">
                <textarea id="ued" name="guangyu" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>关于雅洁" style="height: 500px;"><?php echo $system['guangyu']; ?></textarea>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">雅洁协议</label>
            <div class="layui-input-block">
                <textarea id="des" name="agree" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>协议"  style="height: 500px;"><?php echo $system['agree']; ?></textarea>
            </div>
        </div>


        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="sys"><?php echo lang('submit'); ?></button>
                <button type="reset" class="layui-btn layui-btn-primary"><?php echo lang('reset'); ?></button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script type="text/javascript" charset="utf-8" src="__STATIC__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('ued');
    var ue = UE.getEditor('des');
</script>
<script>
    layui.use(['form', 'layer','upload','layedit'], function () {
    var form = layui.form,upload = layui.upload,layedit = layui.layedit,laydate = layui.laydate,$ = layui.jquery;
        //缩略图上传
        upload.render({
            elem: '#thumbBtn'
            ,url: '<?php echo url("UpFiles/upload"); ?>'
            ,accept: 'images' //普通文件
            ,exts: 'jpg|png|gif' //只允许上传压缩文件
            ,done: function(res){
                $('#cltThumb').attr('src', "__PUBLIC__"+res.url);
                $('#thumb').val(res.url);
                $('#thumb_s').attr('value',res.thumb_s);
            }
        });
        //多图片上传
        var imagesSrc;
        upload.render({
            elem: '#test2'
            ,url: '<?php echo url("UpFiles/upImages"); ?>'
            ,multiple: true
            ,done: function(res){
                $('#demo2 .layui-row').append('<div class="layui-col-md3"><div class="dtbox"><img src="__PUBLIC__'+ res.src +'" class="layui-upload-img"><input type="hidden" class="imgVal" value="'+ res.src +'"> <i class="delimg layui-icon">&#x1006;</i></div></div>');
                imagesSrc +=res.src+';';
            }
        });
        //提交监听
        form.on('submit(sys)', function (data) {
            loading =layer.load(1, {shade: [0.1,'#fff']});
            $.post("<?php echo url('system/system'); ?>",data.field,function(res){
                layer.close(loading);
                if(res.code > 0){
                    layer.msg(res.msg,{icon: 1, time: 1000},function(){
                        location.reload();
                    });
                }else{
                    layer.msg(res.msg,{icon: 2, time: 1000});
                }
            });
        })
    });


</script>
</body>
</html>