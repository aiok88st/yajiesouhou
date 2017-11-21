<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"/Users/Web/archie/yajiesouhou/app/admin/view/repair/index.html";i:1511226822;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/head.html";i:1511141992;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/foot.html";i:1511179449;}*/ ?>
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
        <legend><?php echo lang('list'); ?></legend>
    </fieldset>
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <?php if(is_array($status_name) || $status_name instanceof \think\Collection || $status_name instanceof \think\Paginator): $i = 0; $__LIST__ = $status_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li  onclick="window.location.href='<?php echo url('repair/index',['status'=>$v['id']]); ?>'"
                    <?php if($v['id'] == $status): ?>class="layui-this"<?php endif; ?>>
                <?php echo $v['name']; ?>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>

    <div class="demoTable">
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>关键字">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="javascript:;" onclick="window.location.reload()" class="layui-btn">显示全部</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>


<script type="text/html" id="action">
    <a href="<?php echo url('repair/show'); ?>?id={{d.id}}" class="layui-btn layui-btn-mini show">查看详情</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
</script>
<script>
    layui.use(['table','element'], function() {
        var table = layui.table, $ = layui.jquery;
        var element = layui.element;
        var tableIn = table.render({
            id: 'content',
            elem: '#list',
            url: '<?php echo url("repair/getList"); ?>',
            method: 'get',
            page: true,
            where:{status:'<?php echo $status; ?>'},
            cols: [[
                {checkbox: true, fixed: true},
                {field: 'id', title: '<?php echo lang("id"); ?>', width: 80, fixed: true},
                {field: 'pro_id', title: '产品', width: 200,templet:"#pro_id"},
                {field: 'name', title: '姓名', width: 120},
                {field: 'phone', title: '电话', width: 200},
                {field: 'status', title: '状态', width: 100,templet:"#status"},
                {field: 'add_time', title: '申请时间', width: 180},
                {width: 160, align: 'center', toolbar: '#action',title:'操作'}
            ]],
            limit: 10
        });
        //搜索
        $('#search').on('click', function () {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var status = $('#status').val();

            tableIn.reload({
                where: {name: name,phone:phone,status:status}
            });
        });

        table.on('tool(list)', function(obj) {
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('您确定要删除该内容吗？', function(index){
                    var loading = layer.load(1, {shade: [0.1, '#fff']});
                    $.post("<?php echo url('repair/dele'); ?>",{ids:data.id},function(res){
                        layer.close(loading);
                        if(res.code===1){
                            var name = $('#name').val();
                            var phone = $('#phone').val();
                            layer.msg(data.msg, {time: 1000, icon: 1});
                            tableIn.reload({where:{
                                name:name,
                                phone:phone
                            }});
                        }else{
                            layer.msg('操作失败！',{time:1000,icon:2});
                        }
                    });
                    layer.close(index);
                });
            }
        });
        $('#delAll').click(function(){
            layer.confirm('确认要删除选中的内容吗？', {icon: 3}, function(index) {
                layer.close(index);
                var checkStatus = table.checkStatus('content'); //content即为参数id设定的值
                var ids = [];
                $(checkStatus.data).each(function (i, o) {
                    ids.push(o.id);
                });
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                $.post("<?php echo url('repair/dele'); ?>", {ids: ids}, function (data) {
                    layer.close(loading);
                    if (data.code === 1) {
                        var name = $('#name').val();
                        var phone = $('#phone').val();
                        layer.msg(data.msg, {time: 1000, icon: 1});
                        tableIn.reload({where:{
                            name:name,
                            phone:phone
                        }});
                    } else {
                        layer.msg(data.msg, {time: 1000, icon: 2});
                    }
                });
            });
        })


    });
</script>
<script type="text/html" id="pro_id">
    {{d.pro_id.name}}
</script>
<script type="text/html" id="status">
    {{d.status.name}}
</script>