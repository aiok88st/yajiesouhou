<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:50:"D:\WWW\yajiesouhou/app/user\view\person\index.html";i:1510717191;s:51:"D:\WWW\yajiesouhou/app/user\view\common\header.html";i:1510727949;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员中心</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="__USER__/css/font.css">
    <link rel="stylesheet" href="__USER__/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>
    <script type="text/javascript" src="__USER__/js/xadmin.js"></script>
    <style>
        .layui-table-view{
            margin-left: 30px;
        }
		.layui-nav .layui-this:after, .layui-nav-bar, .layui-nav-tree .layui-nav-itemed:after{
			background-color: white;
		}      
    </style>
</head>
<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">个人中心</a>
        <a href="">个人信息</a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <table class="layui-table" lay-skin="line" style="border: none;">
        <tbody>
            <tr>
                <td style="width: 100px">
                    <img src="__STATIC__/common/images/personHead.png" alt=""/>
                </td>
                <td colspan="3">
                    <ul>
                        <li style="font-size: 18px;line-height: 40px;">用户名：<?php echo $user['nikename']; ?> </li>
                        <li style="line-height: 40px;">账号：<?php echo $user['username']; ?> </li>
                        <li>
                            <button style="height: 25px;line-height: 25px;width: 65px;padding: 0;" class="layui-btn" onclick="x_admin_show('修改密码','<?php echo url('edit'); ?>',600,300)">修改密码</button>
                        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="layui-table" lay-skin="line" lay-size="lg" style="border: none;">
        <tbody>
            <tr>
                <td style="width: 300px">店面名称</td>
                <td style="width: 300px">联系电话</td>
                <td>店面地址</td>
                <td></td>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['tel']; ?></td>
                <td><?php echo $vo['province']; ?><?php echo $vo['city']; ?><?php echo $vo['area']; ?><?php echo $vo['addr']; ?></td>
                <td>
                    <button style="height: 25px;line-height: 25px;width: 65px;padding: 0;" class="layui-btn" onclick="x_admin_show('编辑','<?php echo url('editTitle'); ?>?id=<?php echo $vo['id']; ?>&title=<?php echo $vo['title']; ?>&tel=<?php echo $vo['tel']; ?>',600,300)">编辑</button>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>








