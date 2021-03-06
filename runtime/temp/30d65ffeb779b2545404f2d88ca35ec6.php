<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"F:\wamp\www\yajie/app/admin\view\index\index.html";i:1511226926;s:49:"F:\wamp\www\yajie/app/admin\view\common\head.html";i:1511769422;s:49:"F:\wamp\www\yajie/app/admin\view\common\foot.html";i:1511769530;}*/ ?>
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
<script>
    var ADMIN = '__ADMIN__';
    var navs = <?php echo $menus; ?>;

</script>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header header">
        <div class="layui-main">
            <div class="admin-login-box">
                <a class="logo" style="left: 0;" href="<?php echo url('admin/index/index'); ?>">
                    <span style="font-size: 22px;"><?php echo config('sys_name'); ?>后台</span>
                </a>
                <div class="admin-side-toggle fs1">
                    <span class="icon icon-menu"></span>
                </div>
                <div class="admin-side-full">
                    <span class="icon icon-enlarge"></span>
                </div>
            </div>

            <ul class="layui-nav admin-header-item" lay-filter="side-top-right">
                <li class="layui-nav-item" id="cache">
                    <a href="javascript:;"><?php echo lang('clearCache'); ?></a>
                </li>
<!--               -->
                <li class="layui-nav-item">
                    <i class="fa fa-clone" aria-hidden="true" data-icon="fa-clone"></i>

                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" class="admin-header-user">

                        <span><?php echo session('username'); ?></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="<?php echo url('index/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><?php echo lang('logout'); ?></a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav admin-header-item-mobile">
                <li class="layui-nav-item">
                    <a href="<?php echo url('home/index/index'); ?>" target="_blank"><?php echo lang('home'); ?></a>
                </li>
                <li class="layui-nav-item">
                    <a href="<?php echo url('index/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo lang('logout'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-side layui-bg-black" id="admin-side" style="background-color: #424A5D;">
        <div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
    </div>
    <div class="layui-body" style="bottom: 0;border-left: solid 2px #337AB7;" id="admin-body">
        <div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    <i class="icon icon-earth" aria-hidden="true"></i>
                    <cite>控制面板</cite>
                </li>
            </ul>
            <div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
                <div class="layui-tab-item layui-show">
                    <iframe src="<?php echo url('main'); ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer footer footer-demo" id="admin-footer">
        <div class="layui-main">

            <p>2017 &copy;
                <a href="###">雅洁售后系统后台</a>
            </p>
        </div>
    </div>
    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>
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

    <script src="__ADMIN__/js/index.js"></script>
    <script>
        localStorage.skin='';
        layui.use('layer',function(){
            var $ = layui.jquery, layer = layui.layer;
            $('#cache').click(function () {
                layer.confirm('确认要清除缓存？', {icon: 3}, function (data) {
                    $.post('<?php echo url("clear"); ?>', {}, function (data) {
                        layer.msg(data.info, {icon: 6}, function (index) {
                            layer.close(index);
                            window.location.href = data.url;
                        });
                    });
                });
            });
        })
    </script>
</div>
</body>
</html>