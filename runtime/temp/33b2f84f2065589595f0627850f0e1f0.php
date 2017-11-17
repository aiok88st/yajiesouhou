<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"F:\wamp\www\yajie/app/user\view\exam\index.html";i:1510742470;s:50:"F:\wamp\www\yajie/app/user\view\common\header.html";i:1510569153;}*/ ?>
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
        <a href="">我的试卷</a>
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
    <table class="layui-table">
        <thead>
        <tr>
            <th>标题</th>
            <th>发布时间</th>
            <th>得分</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['title']; ?></td>
            <td><?php echo date("Y-m-d",$vo['createtime']); ?></td>
            <td><?php echo $vo['score']; ?></td>
            <td>
                <?php if($vo['score'] == '您还没有答题'): ?>
                <button class="layui-btn" data-type="reload" onclick="jin('<?php echo $vo['id']; ?>')">点击进入考试</button>
                <?php else: if($vo['status'] == 1): ?>
                    <button class="layui-btn" data-type="reload" onclick="getDetail('<?php echo $vo['id']; ?>')">点击查看试卷</button>
                    <?php else: ?>
                    <button class="layui-btn" data-type="reload" onclick="jin('<?php echo $vo['id']; ?>')">重新考试</button>
                    <?php endif; endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="page">
        <?php echo $page; ?>
    </div>
</div>
<script type="text/javascript">
    function jin(id){
        window.location.href="<?php echo url('Exam/test'); ?>?id="+id;
    }
    function getDetail(id){
        window.location.href="<?php echo url('Exam/getDetail'); ?>?id="+id;
    }
</script>







