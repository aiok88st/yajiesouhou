<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"/Users/Web/archie/yajiesouhou/app/admin/view/article/index.html";i:1511141992;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/head.html";i:1511141992;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/foot.html";i:1511141992;}*/ ?>
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
    <div class="demoTable">
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>关键字">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('index',['catid'=>input('catid')]); ?>" class="layui-btn">显示全部</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <div class="layui-inline" style="margin-left: 10px;">
            <label>分类：</label>
            <select name="catid" id="catList" lay-filter="catList" lay-verify="required" style="height: 38px;padding-left: 5px;padding-right: 100px;">
                <option value='0'>- - 全部 - -</option>
                <?php echo $catList; ?>
            </select>
        </div>
        <a href="<?php echo url('add',array('catid'=>input('catid'))); ?>" class="layui-btn" style="float:right;margin-right: 15px;"><?php echo lang('add'); ?></a>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<!--<script type="text/html" id="order">-->
    <!--<input name="{{d.id}}" data-id="{{d.id}}" class="list_order layui-input" value=" {{d.listorder}}" size="10"/>-->
<!--</script>-->
<script type="text/html" id="title">
    <span style="{{d.title_style}}">{{d.title}}</span>
    {{# if(d.thumb){ }}<img src="__ADMIN__/images/image.gif" onmouseover="layer.tips('<img src=__PUBLIC__/{{d.thumb}}>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();">{{# } }}
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?id={{d.id}}&catid={{d.catid}}" class="layui-btn layui-btn-mini">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    {{# if(d.status==2){ }}
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="addHot">取消热门问题</a>
    {{# }else{  }}
    <a class="layui-btn layui-btn-mini" lay-event="addHot">加入热门问题</a>
    {{# } }}
</script>
<script>
    layui.use('table', function() {
        var table = layui.table, $ = layui.jquery;
        var tableIn = table.render({
            id: 'content',
            elem: '#list',
            url: '<?php echo url("index"); ?>',
            where:{catid:'<?php echo input("catid"); ?>'},
            method: 'post',
            page: true,
            cols: [[
                {checkbox: true, fixed: true},
                {field: 'id', title: '<?php echo lang("id"); ?>', width: 80, fixed: true},
                {field: 'title', title: '<?php echo lang("title"); ?>', width: 400, templet: '#title'},
                {field: 'keywords',  title: '关键词', width: 200},
                {field: 'hits',  title: '浏览量', width: 120},
                {field: 'createtime', title: '<?php echo lang("add"); ?><?php echo lang("time"); ?>', width: 180},
//                {field: 'listorder', align: 'center', title: '<?php echo lang("order"); ?>', width: 120, templet: '#order'},
                {width: 250, align: 'center', toolbar: '#action',title:'操作'}
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
                where: {key: key,catid:'<?php echo input("catid"); ?>'}
            });
        });
        //切换分类
        $("#catList").on('change',function(){
            var catid = $("#catList").val();
             tableIn.reload({
                where: {catid:catid}
            });
        });
        
    
        $('body').on('blur','.list_order',function() {
            var id = $(this).attr('data-id');
            var listorder = $(this).val();
            var loading = layer.load(1, {shade: [0.1, '#fff']});
            $.post('<?php echo url("listorder"); ?>',{id:id,listorder:listorder,catid:'<?php echo input("catid"); ?>'},function(res){
                layer.close(loading);
                if(res.code === 1){
                    layer.msg(res.msg, {time: 1000, icon: 1}, function () {
                        location.href = res.url;
                    });
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
            })
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
            }else if(obj.event === 'addHot'){
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                $.post('<?php echo url("article/addHots"); ?>', {'id': data.id}, function (res) {
                    layer.close(loading);
                    if (res.code===1) {
                        if (res.status === 1) {
                            obj.update({
                                action: '<a class="layui-btn layui-btn-mini" lay-event="addHot">加入热门问题</a>'
                            });
                            location.reload();
                        } else {
                            obj.update({
                                action: '<a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="addHot">取消热门问题</a>'
                            });
                            location.reload();
                        }
                    }else if(res.code == 0){
                        layer.msg(res.msg, {time: 1000, icon: 2});
                    }  else {
                        layer.msg('操作失败！', {time: 1000, icon: 2});
                        return false;
                    }
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