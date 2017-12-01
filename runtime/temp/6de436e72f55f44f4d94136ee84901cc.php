<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:48:"F:\wamp\www\yajie/app/user\view\index\index.html";i:1511234467;s:50:"F:\wamp\www\yajie/app/user\view\common\header.html";i:1511770125;s:48:"F:\wamp\www\yajie/app/user\view\common\left.html";i:1511862210;s:50:"F:\wamp\www\yajie/app/user\view\common\footer.html";i:1510571549;}*/ ?>
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
    <script type="text/javascript" src="__USER__/js/common.js"></script>
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

    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="./index.html">客户中心</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>

        <ul class="layui-nav right" lay-filter="">

          <li class="layui-nav-item">
            <a href="javascript:;"><?php echo session('uname'); ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a  href="<?php echo url('index/logout'); ?>">退出</a></dd>
            </dl>
          </li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>报修中心</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Repair/audit'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>待审核申请</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('Repair/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>报修申请管理</cite>
                        </a>
                    </li >
                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>培训中心</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?php echo url('Train/tvdList'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>培训资料</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('Collect/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>收藏夹</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="<?php echo url('Exam/index'); ?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>我的试卷</cite>
                        </a>
                    </li >
                </ul>
            </li>

            <li>
                <a _href="<?php echo url('user/Person/index'); ?>">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>个人中心</cite>
                </a>
            </li>

            <li>
                <a _href="<?php echo url('user/Network/index'); ?>">
                    <i class="iconfont">&#xe715;</i>
                    <cite>我的门店</cite>
                </a>
            </li>
            <li>
                <a _href="<?php echo url('user/Club/index'); ?>">
                    <i class="iconfont">&#xe726;</i>
                    <cite>我的会员</cite>
                </a>
            </li>

            <!--<?php if($pid == 0): ?>-->
                <!--<li>-->
                    <!--<a _href="<?php echo url('Distrit/index'); ?>">-->
                        <!--<i class="iconfont">&#xe726;</i>-->
                        <!--<cite>我的分销商</cite>-->
                    <!--</a>-->
                <!--</li>-->
            <!--<?php endif; ?>-->
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src="<?php echo url('main'); ?>" name="main" frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
<div class="footer">
    <div class="copyright">Copyright ©2017 雅洁五金</div>
</div>
<!-- 底部结束 -->
<script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>