<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"F:\wamp\www\yajie/app/admin\view\networks\networkList.html";i:1511176555;s:49:"F:\wamp\www\yajie/app/admin\view\common\head.html";i:1510307286;s:49:"F:\wamp\www\yajie/app/admin\view\common\foot.html";i:1507509539;}*/ ?>
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
<style>
    .selt{
        float: left;
    }
</style>
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo lang('list'); ?></legend>
    </fieldset>
    <div class="demoTable">
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <div class="layui-inline">
            <input class="layui-input" name="key" id="key" placeholder="<?php echo lang('pleaseEnter'); ?>门店名">
        </div>
        <div class="layui-inline" style="margin-left: 10px;">
            <select name="province" onchange="loadRegion('province',2,'city','<?php echo url('getAddrs'); ?>')" id="province" lay-ignore style="height: 38px;padding-left: 5px;padding-right: 35px;border-color: #e6e6e6;">
                <option value="0" selected>省份/直辖市</option>
                <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['id']; ?>" ><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="layui-inline" style="margin-left: 10px;">
            <select name="city" onchange="loadRegion('city',3,'area','<?php echo url('getAddrs'); ?>')" id="city" lay-ignore style="height: 38px;padding-left: 5px;padding-right: 35px;border-color: #e6e6e6;">
                <option value="0">市/县</option>
            </select>
        </div>
        <div class="layui-inline" style="margin-left: 10px;">
            <select name="area" id="area" lay-ignore style="height: 38px;padding-left: 5px;padding-right: 35px;border-color: #e6e6e6;">
                <option value="0">镇/区</option>
            </select>
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('add'); ?>" class="layui-btn" style="float:right;margin-right: 15px;"><?php echo lang('add'); ?></a>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script type="text/html" id="order">
    <input name="{{d.id}}" data-id="{{d.id}}" class="list_order layui-input" value=" {{d.listorder}}" size="10"/>
</script>
<script type="text/html" id="title">
    <span style="{{d.title_style}}">{{d.title}}</span>
    {{# if(d.thumb){ }}<img src="__ADMIN__/images/image.gif" onmouseover="layer.tips('<img src=__PUBLIC__/{{d.thumb}}>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();">{{# } }}
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?id={{d.id}}" class="layui-btn layui-btn-mini">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
</script>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script>
    //省市区三级联动
    function loadRegion(sel,type_id,selName,url){
        jQuery("#"+selName+" option").each(function(){
            jQuery(this).remove();
        });
        jQuery("<option value=0>请选择</option>").appendTo(jQuery("#"+selName));
        if(jQuery("#"+sel).val()==0){
            return;
        }
        jQuery.getJSON(url,{pid:jQuery("#"+sel).val(),type:type_id},
                function(data){
                    if(data){
                        jQuery.each(data,function(idx,item){
                            jQuery("<option value="+item.id+">"+item.name+"</option>").appendTo(jQuery("#"+selName));
                        });
                    }else{
                        jQuery("<option value='0'>请选择</option>").appendTo(jQuery("#"+selName));
                    }
                }
        );
    }
    setTimeout(function(){
        loadRegion('province',2,'city','getAddrs');
    },200);
    setTimeout(function(){
        loadRegion('city',3,'area','getAddrs');
    },300);



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
                {field: 'nikename', title: '客户名', width: 200},
                {field: 'title', title: '门店名', width: 200},
                {field: 'province', title: '省', width: 80},
                {field: 'city', title: '市', width: 80},
                {field: 'area', title: '区', width: 80},
                {field: 'addr', title: '地址', width: 200},
                {field: 'tel', title: '门店电话', width: 200},
                {field: 'createtime', title: '<?php echo lang("add"); ?><?php echo lang("time"); ?>', width: 180},
                {field: 'listorder', align: 'center', title: '<?php echo lang("order"); ?>', width: 120, templet: '#order'},
                {width: 200, align: 'center', toolbar: '#action',title:'操作'}
            ]],
            limit: 10
        });
        //搜索
        $('#search').on('click', function () {
            var key = $('#key').val();
            var province = $('#province').val();
            var city = $('#city').val();
            var area = $('#area').val();
            tableIn.reload({
                where: {key: key,province:province,city:city,area:area}
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