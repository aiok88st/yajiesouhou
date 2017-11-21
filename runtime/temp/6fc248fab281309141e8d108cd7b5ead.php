<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/repair/show.html";i:1511183041;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/head.html";i:1511141992;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/repair/form.html";i:1511182382;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/repair/desc.html";i:1511182845;s:61:"/Users/Web/archie/yajiesouhou/app/admin/view/common/foot.html";i:1511179449;s:63:"/Users/Web/archie/yajiesouhou/app/admin/view/repair/script.html";i:1511182735;}*/ ?>
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
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">基本信息</li>
            <li>操作日志</li>

        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
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
                        <td>状态</td>
                        <td>
                            <span style="color: red"><?php echo $data['status']['name']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>产品</td>
                        <td>
                            <?php echo $data['pro_id']['name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>申请类型</td>
                        <td>
                            <?php echo $data['type']['name']; if(($data['status']['id'] == 1) and ($data['type']['id']  == 1)): ?>
                            &nbsp;&nbsp;
                                <a _href="" class="layui-btn layui-btn-mini">查看物流</a>
                            <?php endif; ?>
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
                <?php if(in_array($data['status']['id'],[0,-1])): ?>
                <fieldset class="layui-elem-field layui-field-title">
    <legend>操作</legend>
</fieldset>

<form class="layui-form layui-form-pane">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">审核状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" lay-filter="radio" value="1" title="通过" checked>
            <input type="radio" name="status" lay-filter="radio" value="-1" title="不通过">
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
        <label class="layui-form-label">跟进门店</label>
        <div class="layui-input-inline">
            <input type="hidden" name="user_id" id="user_id" value="">
            <input type="text" name="shopname" id="shopname"
                   placeholder="未选择" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-input-inline">
            <div class="layui-btn layui-btn-primary" onclick="select_user()">
                <i class="layui-icon">&#xe61f;</i>
                点击选择
            </div>
        </div>


    </div>
    <div class="layui-form-item">
        <div class="layui-input-inline">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <?php if(in_array($data['status'],[0,-1])): ?>
            <a href="<?php echo url('repair/audit'); ?>"  class="layui-btn layui-btn-primary">返回</a>
            <?php else: ?>
            <a href="<?php echo url('repair/index'); ?>"  class="layui-btn layui-btn-primary">返回</a>
            <?php endif; ?>

        </div>
    </div>
</form>

                <?php else: ?>
                <fieldset class="layui-elem-field layui-field-title">
    <legend>跟进中的门店</legend>
</fieldset>
<table class="layui-table" style="width:700px;" lay-skin="nob">
    <colgroup>
        <col width="50">
        <col width="200">
        <col>
    </colgroup>
    <tbody>
        <tr>
            <td>门店</td>
            <td>
                <?php echo $data['user_id']['shopame']; ?>
            </td>
        </tr>
        <tr>
            <td>所属经销商</td>
            <td>
                <?php echo $data['user_id']['dis']['name']; ?>
            </td>
        </tr>

    </tbody>
</table>
                <?php endif; ?>
            </div>
            <div class="layui-tab-item">
                <table class="layui-table">
                    <colgroup>
                        <col width="400">
                        <col width="100">
                        <col width="100">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>操作内容</th>
                            <th>操作人</th>
                            <th>操作时间</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($log_list) || $log_list instanceof \think\Collection || $log_list instanceof \think\Paginator): $i = 0; $__LIST__ = $log_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <th><?php echo $v['content']; ?></th>
                            <th><?php echo $v['admin_id']; ?></th>
                            <th><?php echo $v['add_time']; ?></th>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>


<div id="tong" class="hide">
    <img src="images/tong.jpg">
</div>
<?php if(in_array($data['status']['id'],[0,-1])): ?>

<div id="select_user" class="hide" style="padding: 10px;background-color: #fff">

    <div class="demoTable">
        <div class="layui-inline">
            <input class="layui-input" name="name" id="name" placeholder="姓名">

        </div>
        <div class="layui-inline">
            <input class="layui-input" name="phone" id="phone" placeholder="电话">
        </div>
        <div class="layui-inline">
            <select name="province" id="province">
                <option value="">--选择省份--</option>
                <?php if(is_array($p) || $p instanceof \think\Collection || $p instanceof \think\Paginator): $i = 0; $__LIST__ = $p;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['id']; ?>" <?php if($v['id'] == $data['province']['id']): ?>selected<?php endif; ?> ><?php echo $v['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </select>
        </div>
        <div class="layui-inline">
            <select name="city" id="city">
                <option value="">--选择市--</option>
                <?php if(is_array($c) || $c instanceof \think\Collection || $c instanceof \think\Paginator): $i = 0; $__LIST__ = $c;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['id']; ?>" <?php if($v['id'] == $data['city']['id']): ?> selected <?php endif; ?> ><?php echo $v['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="layui-inline">
            <select name="area" id="areas">
                <option value="">--选择区/县--</option>
                <?php if(is_array($a) || $a instanceof \think\Collection || $a instanceof \think\Paginator): $i = 0; $__LIST__ = $a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['id']; ?>" <?php if($v['id'] == $data['zone']['id']): ?> selected <?php endif; ?> ><?php echo $v['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>

</div>
<script type="text/javascript">

    layui.use(['form','layer','table','element'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;
        var table = layui.table;
        //监听提交
        form.on('submit(formDemo)', function(data){

            var url="<?php echo url('repair/edit'); ?>";
            AjaxP(url,"POST",data.field,function(res){
                if(res.code==1){

                    layer.msg(res.msg,{icon:6,time:1000},function(){
                        window.location.reload();
                    });
                }else{
                    layer.msg(res.msg, {icon: 5 ,time:1000});
                }
            });
            return false;
        });

        form.on('radio(radio)', function(data){
            var v=data.value;
            if(v==-1){
                $('.audit').show();
                $('.user_id').hide();
                $('.user_id').find('input').attr('value','');
                $('#shopname').html('');
            }else{
                $('.audit').hide();
                $('.user_id').show();
                $('.audit').find('textarea').attr('value','');
            }
        });
        var province=$('#province').val();
        var city=$('#city').val();
        var areas=$('#areas').val();
        var tableIn = table.render({
            id: 'content',
            elem: '#list',
            url: '<?php echo url("repair/didList"); ?>',
            method: 'get',
            page: true,
            where:{
                province:province,
                city:city,
                area:areas
            },
            cols: [[
                {checkbox: true, fixed: true},
                {field: 'id', title: '<?php echo lang("id"); ?>', width: 80},
                {field: 'title', title: '门店名称', width: 200},
                {field: 'area', title: '地区', width: 200,templet:"#area"},
                {field: 'addr', title: '详细地址', width: 200},
                {field: 'did', title: '所属经销商', width: 100,templet:"#did"},
                {width: 100, align: 'center', toolbar: '#action',title:'操作'}
            ]],
            limit: 10
        });

        $('#province').change(function(){
            var url="<?php echo url('repair/get_region'); ?>";

            $.get(url,{pid:$(this).val()},function(res){
                var html ='';
                for(item in res){
                    html +='<option value="'+res[item].id+'">'+res[item].name+'</option>';
                }
                $('#city').html(html);
                areas_fun(res[0].id);
            })
        });
        $('#city').change(function(){
            areas_fun($(this).val());
        });
        $('#search').on('click', function () {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var province=$('#province').val();
            var city=$('#city').val();
            var areas=$('#areas').val();
            tableIn.reload({
                where: {
                    title: name,tel:phone,
                    province:province,
                    city:city,
                    area:areas
                }
            });
        });

    });
    function areas_fun(pid){
        var url="<?php echo url('repair/get_region'); ?>";

        $.get(url,{pid:pid},function(res){
            var html ='';
            for(item in res){
                html +='<option value="'+res[item].id+'">'+res[item].name+'</option>';
            }
            $('#areas').html(html);
        })
    }

    var open_user;
    function select_user(){
        open_user=layer.open({
            type: 1,
            title: '选择跟进的门店',
            area: '90%',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: $('#select_user') //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
        });
    }
    function user_click(id,name){
        $('#shopname').val(name);
        $('#user_id').attr('value',id);
        layer.closeAll();
    }
</script>
<script type="text/html" id="area">
    {{d.province.name}}-{{d.city.name}}-{{d.area.name}}
</script>
<script type="text/html" id="did">
    {{d.did.name}}
</script>
<script type="text/html" id="action">
    <a href="javascript:;" onclick="user_click('{{d.id}}','{{d.title}}')" class="layui-btn layui-btn-mini">选择</a>
</script>
<?php else: ?>
<script type="text/javascript">
    layui.use(['layer','element'], function(){
        $ = layui.jquery;
        var element = layui.element;
    })
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
</script>
<?php endif; ?>
