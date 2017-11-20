<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/repair/show.html";i:1511166747;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/head.html";i:1511141992;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/foot.html";i:1511141992;}*/ ?>
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
        <legend>申请<?php echo lang('show'); ?></legend>
    </fieldset>
    <table class="layui-table" style="width:700px;" lay-skin="nob">
        <colgroup>
            <col width="50">
            <col width="200">
            <col>
        </colgroup>
        <tbody>
            <tr>
                <td>产品</td>
                <td>
                    <?php echo $data['pro_id']['name']; ?>
                </td>
            </tr>
            <tr>
                <td>申请类型</td>
                <td>
                    <?php echo $data['type']; ?>
                </td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><?php echo $data['phone']; ?></td>
            </tr>
            <tr>
                <td>地区</td>
                <td>
                    <?php echo $data['province']['name']; ?>-<?php echo $data['city']['name']; ?>-<?php echo $data['zone']['name']; ?>
                </td>
            </tr>
            <tr>
                <td>详细地址</td>
                <td>
                    <?php echo $data['addra']; ?>
                </td>
            </tr>
            <tr>
                <td>问题描述</td>
                <td>
                    <?php echo $data['msg']; ?>
                </td>
            </tr>
            <?php if($data['images']): ?>
            <tr>
                <td>图片描述</td>
                <td>
                    <?php if(is_array($data['images']) || $data['images'] instanceof \think\Collection || $data['images'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <img src="<?php echo $v; ?>" width="100" alt="" onclick="show_img('<?php echo $v; ?>')">
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </td>
            </tr>
            <?php endif; ?>

        </tbody>
    </table>
    <fieldset class="layui-elem-field layui-field-title">
        <legend>操作</legend>
    </fieldset>

    <form class="layui-form layui-form-pane" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">审核状态</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" lay-filter="radio" value="1" title="通过" checked>
                <input type="radio" name="sex" lay-filter="radio" value="-1" title="不通过">
            </div>
        </div>
        <div class="layui-form-item hide audit layui-form-text">
            <label class="layui-form-label">不通过原因</label>
            <div class="layui-input-block">
                <textarea name="audit" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux">200字以内</div>
        </div>
        <div class="layui-form-item user_id">
            <label class="layui-form-label">跟进经销商</label>
            <div class="layui-input-inline">
                <input type="hidden" name="user_id" value="">
                &nbsp;&nbsp;
                <div class="layui-btn layui-btn-primary" onclick="select_user()">
                    <i class="layui-icon">&#xe61f;</i>
                    点击选择
                </div>
            </div>

        </div>
        <div class="layui-form-item">
            <div class="layui-input-inline">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>



<div id="tong" class="hide">
    <img src="images/tong.jpg">
</div>
<div id="select_user" class="hide">
    dsadasd
</div>
<script type="text/javascript">

    layui.use(['form','layer'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });

        form.on('radio(radio)', function(data){
            var v=data.value;
            if(v==-1){
                $('.audit').show();
                $('.user_id').hide();
                $('.user_id').find('input').attr('value','');
            }else{
                $('.audit').hide();
                $('.user_id').show();
                $('.audit').find('textarea').attr('value','');
            }
        });
    });
    function show_img(img) {
        $('#ton').children('img').attr('src',img);
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '516px',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: $('#tong')
        });
    }
    function select_user(){
        layer.open({
            type: 1,
            title: '选择跟进经销商',
            area: '516px',
            shadeClose: true,
            content: $('#select_user') //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
        });
    }
</script>