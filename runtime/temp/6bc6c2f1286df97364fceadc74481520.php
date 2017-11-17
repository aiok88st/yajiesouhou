<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:50:"F:\wamp\www\yajie/app/user\view\train\tvdList.html";i:1510570094;s:50:"F:\wamp\www\yajie/app/user\view\common\header.html";i:1510569153;}*/ ?>
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
    </style>
</head>
<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">培训管理</a>
        <a href="">培训资料</a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
            <input type="text" name="key"  placeholder="请输入关键字" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <table class="layui-table" lay-skin="line" style="border: none;">

        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td width="100px">
                <div style="overflow: hidden;width: 200px;height: 100px">
                    <img src="__PUBLIC__<?php echo $vo['thumb']; ?>" style="width: 100%;height: 100%;"/>
                </div>
            </td>
            <td>
                <ul>
                    <li><?php echo $vo['title']; ?></li>
                    <li><?php echo $vo['f_title']; ?></li>
                    <li><?php echo date("Y-m-d",$vo['createtime']); ?></li>
                </ul>
            </td>
            <td>
                <a href="<?php echo url('Train/detail'); ?>?id=<?php echo $vo['id']; ?>"><button class="layui-btn" data-type="reload">查看详情</button></a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="page">
        <?php echo $page; ?>
    </div>
</div>


