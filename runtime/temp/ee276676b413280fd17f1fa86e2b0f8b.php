<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"F:\wamp\www\yajie/app/admin\view\uplome\index.html";i:1511312976;s:49:"F:\wamp\www\yajie/app/admin\view\common\head.html";i:1511769422;s:49:"F:\wamp\www\yajie/app/admin\view\common\foot.html";i:1511769530;}*/ ?>
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
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="skin-0">
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>意见反馈<?php echo lang('list'); ?></legend>
    </fieldset>
    <div class="demoTable">
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>姓名/电话">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('index',['catid'=>input('catid')]); ?>" class="layui-btn">显示全部</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<div id="pop" class="hide" style="display: none">
    <img src=""/>
</div>
<script type="text/javascript">
    $('img').bind('click',function(){
        var src=$(this).attr('src');
        $('#pop').find('img').attr('src',src);
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '600px',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: $('#pop')
        });
    })
</script>

<script type="text/html" id="title">
    <span style="{{d.title_style}}">{{d.title}}</span>
    {{# if(d.thumb){ }}<img src="__ADMIN__/images/image.gif" onmouseover="layer.tips('<img src=__PUBLIC__/{{d.thumb}}>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();">{{# } }}
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('detail'); ?>?id={{d.id}}" class="layui-btn layui-btn-mini">查看详情</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
</script>
<script>
    layui.use('table', function() {
        var table = layui.table, $ = layui.jquery;
        var tableIn = table.render({
            id: 'content',
            elem: '#list',
            url: '<?php echo url("index"); ?>',
            method: 'post',
            page: true,
            cols: [[
                {checkbox: true, fixed: true},
                {field: 'id', title: '<?php echo lang("id"); ?>', width: 80, fixed: true},
                {field: 'username', title: '姓名', width: 200},
                {field: 'phone', title: '手机号码', width: 200},
                {field: 'catname', title: '问题类型', width: 200},
                {field: 'model', title: '产品型号', width: 200},
                {field: 'addtime', title: '<?php echo lang("add"); ?><?php echo lang("time"); ?>', width: 180},
                {width: 160, align: 'center', toolbar: '#action',title:'操作'}
            ]],
            limit: 10
        });
        //搜索
        $('#search').on('click', function () {
            var key = $('#key').val();
            if ($.trim(key) === '') {
                layer.msg('<?php echo lang("pleaseEnter"); ?>关键字！', {icon: 0});
                return;
            }
            tableIn.reload({
                where: {key: key}
            });
        });

        table.on('tool(list)', function(obj) {
            var data = obj.data;
            if(obj.event === 'del'){
                layer.confirm('您确定要删除该内容吗？', function(index){
                    var loading = layer.load(1, {shade: [0.1, '#fff']});
                    $.post("<?php echo url('listDel'); ?>",{id:data.id},function(res){
                        layer.close(loading);
                        if(res.code===1){
                            layer.msg(res.msg,{time:1000,icon:1});
                            tableIn.reload({where:{catid:'<?php echo input("catid"); ?>'}});
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
                $.post("<?php echo url('delAll'); ?>", {ids: ids,catid:'<?php echo input("catid"); ?>'}, function (data) {
                    layer.close(loading);
                    if (data.code === 1) {
                        layer.msg(data.msg, {time: 1000, icon: 1});
                        tableIn.reload({where:{catid:'<?php echo input("catid"); ?>'}});
                    } else {
                        layer.msg(data.msg, {time: 1000, icon: 2});
                    }
                });
            });
        })
    });
</script>