<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"/Users/Web/archie/yajiesouhou/app/admin/view/uplome/detail.html";i:1511141992;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css?v=1" media="all" />
    <title>详细信息</title>
</head>
<body>
    <div style="margin-top: 10px;">
        <h1 style="text-align: center">详细信息</h1>
    </div>
    <table class="layui-table" style="margin:0 auto;margin-top:10px;width: 60%;">
        <tr>
            <th>姓名</th>
            <td><?php echo $list['username']; ?></td>
        </tr>
        <tr>
            <th>手机号码</th>
            <td><?php echo $list['phone']; ?></td>
        </tr>
        <tr>
            <th>问题类型</th>
            <td><?php echo $list['catname']; ?></td>
        </tr>
        <tr>
            <th>提交时间</th>
            <td><?php echo date("Y-m-d",$list['addtime']); ?></td>
        </tr>
        <tr>
            <th>问题内容</th>
            <td><?php echo $list['content']; ?></td>
        </tr>
        <tr>
            <td>图片</td>
            <td>
                <ul>
                    <?php if(is_array($img) || $img instanceof \think\Collection || $img instanceof \think\Paginator): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li style="float: left;margin-left: 10px"><img src="__PUBLIC__<?php echo $vo; ?>" alt="" /></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </td>
        </tr>
</table>
    <div class="layui-input-block" style="margin-top: 20px;width: 60%;text-align: center">
        <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
    </div>

</body>
</html>