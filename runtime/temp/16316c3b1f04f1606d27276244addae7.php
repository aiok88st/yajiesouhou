<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:45:"F:\wamp\www\yajie/app/admin\view\tvd\add.html";i:1510909836;s:49:"F:\wamp\www\yajie/app/admin\view\common\head.html";i:1510307286;s:49:"F:\wamp\www\yajie/app/admin\view\common\foot.html";i:1507509539;}*/ ?>
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
<link rel="stylesheet" href="__STATIC__/plugins/spectrum/spectrum.css">
<script>
    var ADMIN = '__ADMIN__';
    var UPURL = "<?php echo url('UpFiles/upImages'); ?>";
    var PUBLIC = "__PUBLIC__";
    var imgClassName,fileClassName;
</script>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script src="__STATIC__/common/js/jquery.2.1.1.min.js"></script>
<script>
    var edittext=new Array();
</script>

<script src="__STATIC__/ueditor/ueditor.config.js" type="text/javascript"></script>
<script src="__STATIC__/ueditor/ueditor.all.min.js" type="text/javascript"></script>
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <form class="layui-form" method="post" target="rfFrame">
        <?php if($info['id'] != ''): ?><input TYPE="hidden" name="id" value="<?php echo $info['id']; ?>"><?php endif; ?>
        <div class="layui-form-item">
            <label class="layui-form-label">试题</label>
            <div class="layui-input-4">
                <select name="tid" lay-verify="required">
                    <?php if($info['id'] != ''): if(is_array($test) || $test instanceof \think\Collection || $test instanceof \think\Paginator): $i = 0; $__LIST__ = $test;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>" <?php if($info['tid'] == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['title']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; else: ?>
                    <option value="">请选择</option>
                    <?php if(is_array($test) || $test instanceof \think\Collection || $test instanceof \think\Paginator): $i = 0; $__LIST__ = $test;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分类</label>
            <div class="layui-input-4">
                <select name="catid" lay-verify="required">
                    <?php if($info['id'] != ''): ?>
                        <?php echo $catids; else: ?>
                        <option value="">请选择</option>
                        <?php echo $catids; endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">期数</label>
            <div class="layui-input-4">
                <input type="text" name="date_num" <?php if($info['id'] != ''): ?>value="<?php echo $info['date_num']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入期数" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-4">
                <input type="text" name="title" <?php if($info['id'] != ''): ?>value="<?php echo $info['title']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">副标题</label>
            <div class="layui-input-4">
                <input type="text" name="f_title" <?php if($info['id'] != ''): ?>value="<?php echo $info['f_title']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入副标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">关键词</label>
            <div class="layui-input-4">
                <input type="text" name="keywords" <?php if($info['id'] != ''): ?>value="<?php echo $info['keywords']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入关键词" class="layui-input">
            </div>
            <label class="layui-form-label" style="width: 150px;color: #9C9C9C;">多个关键词用空格隔开</label>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">缩略图</label>
            <input type="hidden" name="thumb" id="thumb" <?php if($info['id'] != ''): ?>value="<?php echo $info['thumb']; ?>"<?php endif; ?>>
            <input id="thumb_s" type="hidden" name="thumb_s" <?php if($info['id'] != ''): ?>value="<?php echo $info['thumb_s']; ?>"<?php endif; ?>>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-primary" id="thumbBtn"><i class="icon icon-upload3"></i>点击上传</button>
                    <label style="color: #9C9C9C;font-size: 12px;">请上传74X74规格图片</label>
                    <div class="layui-upload-list">
                        <?php if($info['id'] != ''): ?>
                        <img class="layui-upload-img" id="cltThumb" src="__PUBLIC__<?php echo $info['thumb']; ?>">
                        <?php else: ?>
                        <img class="layui-upload-img" id="cltThumb">
                        <?php endif; ?>
                        <p id="demoText"></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">视频图片</label>
            <input type="hidden" name="images" id="images" <?php if($info['id'] != ''): ?>value="<?php echo $info['images']; ?>"<?php endif; ?>>
            <div class="layui-input-block">
                <div class="layui-upload">
                    <button type="button" class="layui-btn layui-btn-primary" id="imagesBtn"><i class="icon icon-upload3"></i>点击上传</button>
                    <label style="color: #9C9C9C;font-size: 12px;">请上传320X178规格图片</label>
                    <div class="layui-upload-list">
                        <?php if($info['id'] != ''): ?>
                        <img class="layui-upload-img" id="cltimages" src="__PUBLIC__<?php echo $info['images']; ?>">
                        <?php else: ?>
                        <img class="layui-upload-img" id="cltimages">
                        <?php endif; ?>
                        <p id="images_demoText"></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">视频链接</label>
            <div class="layui-input-4">
                <input type="text" name="link" <?php if($info['id'] != ''): ?>value="<?php echo $info['link']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入视频链接" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网盘链接</label>
            <div class="layui-input-4">
                <input type="text" name="weblink" <?php if($info['id'] != ''): ?>value="<?php echo $info['weblink']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入网盘链接" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网盘提取码</label>
            <div class="layui-input-4">
                <input type="text" name="webnum" <?php if($info['id'] != ''): ?>value="<?php echo $info['webnum']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入网盘提取码" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容简介</label>
            <div class="layui-input-block">
                <textarea name="content"  placeholder="请输入内容" class="layui-textarea" style="width: 665px"><?php if($info['id'] != ''): ?><?php echo $info['content']; endif; ?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">浏览量</label>
            <div class="layui-input-4">
                <input type="text" name="hits" <?php if($info['id'] != ''): ?>value="<?php echo $info['hits']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入浏览量" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" style="margin-top: 30px">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
            </div>
        </div>
    </form>
</div>
<script src='__STATIC__/plugins/spectrum/spectrum.js'></script>
<script src='__ADMIN__/js/edit.js'></script>
</head>
<script>
    var thumb,pic,file;
    <?php if(ACTION_NAME=='add'): ?>
    var url= "<?php echo url('insert'); ?>";
    <?php else: ?>
    var url= "<?php echo url('update'); ?>";
    <?php endif; ?>


    layui.use(['form','upload','layedit','laydate'], function () {
        var form = layui.form,upload = layui.upload,layedit = layui.layedit,laydate = layui.laydate;
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
        upload.render({
            elem: '#imagesBtn'
            ,url: '<?php echo url("UpFiles/upload"); ?>'
            ,accept: 'images' //普通文件
            ,exts: 'jpg|png|gif' //只允许上传压缩文件
            ,done: function(res){
                $('#cltimages').attr('src', "__PUBLIC__"+res.url);
                $('#images').val(res.url);
            }
        });
        //日期
        laydate.render({
            elem: '#addtime', //指定元素
            type:'datetime',
            format:'yyyy-MM-dd HH:mm:ss'
        });
        form.on('submit(submit)', function (data) {
            if(edittext){
                for (key in edittext){
                    data.field[key] = $(window.frames["LAY_layedit_"+edittext[key]].document).find('body').html();
                }
            }
            var thumb_s=$('#thumb_s').val();
            data.field.thumb_s = thumb_s;
            $.post(url, data.field, function (res) {
                if (res.code > 0) {
                    layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                        location.href = res.url;
                    });
                } else {
                    layer.msg(res.msg, {time: 1800, icon: 2});
                }
            });
        });
        $('.layui-row').on('click','.delimg',function(){
            var thisimg = $(this);
            layer.confirm('你确定要删除该图片吗？', function(index){
                thisimg.parents('.layui-col-md3').remove();
                layer.close(index);
            })
        })
    });

</script>